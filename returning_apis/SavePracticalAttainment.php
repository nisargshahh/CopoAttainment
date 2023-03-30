<?php
    session_start();
    if (isset($_SESSION['uname'])) {
        include('../assets/copo_config.php');
        $batch_id = $_REQUEST['batch_id'];

        $practical_marks = 0;
        $mini_project_marks = 0;
        $target_value = 0;
        $lower_range = 0;
        $upper_range = 0;
        $number_exps = 0;
        $mini_project = 0;
        $lo_mapped = Array();
        $lo_array = Array();
        $marks_array = Array();

        $query3 = "SELECT * FROM practical_marks";
        $result3 = $conn-> query($query3);
        while($row3 = $result3-> fetch_array()) {
            $practical_marks = $row3[1];
        }

        $query = "SELECT * FROM marks WHERE batch_id=$batch_id AND type=2";
        $result = $conn-> query($query);
        while($row = $result-> fetch_array()) {
            $marks_array = json_decode($row[1], true);
        }

        $query1 = "SELECT * FROM practical_mapping WHERE batch_id=$batch_id";
        $result1 = $conn-> query($query1);
        while($row1 = $result1-> fetch_array()) {
            $number_exps = $row1[1];
            $target_value = json_decode($row1[7], true);
            $lower_range = $row1[8];
            $upper_range = $row1[9];
            $lo_mapped = json_decode($row1[2], true);
            $mini_project_marks = $row1[11];
            $mini_project = $row1[4];
        }

        $final_practical_marks = $practical_marks - $mini_project_marks;
    
        $los_array = Array();
        $lo_occurance_array = Array();
        $lo_total_marks = Array();
        $lo_attainment_array = Array();
    
        $query2 = "SELECT * FROM lo_list";
        $result2 = $conn-> query($query2);
        while($row2 = $result2-> fetch_array()) {
            $lo_attainment_array[$row2[1]] = Array(
                'greater_count' => 0,
                'lower_count' => 0,
            );
            $los_array[$row2[1]] = Array();
            $lo_occurance_array[$row2[1]] = 0;
            $lo_total_marks[$row2[1]] = 0;
            array_push($lo_array, $row2[1]);
        }

        $target_value = array_values($target_value);
        $target_value = $target_value[0];

        $temp_array = array_values($lo_mapped);
        $lo_mapped_array = Array();
        $target_lo_value_marks = Array();
        $lo_count_array = Array();

        for($i=0; $i<$number_exps; $i++) {
            $some_array = array_values($temp_array[$i]);
            array_push($lo_mapped_array, $some_array);
            $target_value_marks = $final_practical_marks/count($some_array[0]);
            array_push($lo_count_array, count($some_array[0]));
            array_push($target_lo_value_marks, $target_value_marks);

            for ($j=0; $j<count($lo_array); $j++) {
                if(in_array($lo_array[$j], $some_array[0])) {
                    $target_marks = ($target_value[$j] * $target_value_marks)/100;
                    array_push($los_array[$lo_array[$j]],$target_marks);
                    $lo_occurance_array[$lo_array[$j]] = $lo_occurance_array[$lo_array[$j]] + 1;
                    $lo_total_marks[$lo_array[$j]] = $lo_total_marks[$lo_array[$j]] + $target_value_marks;
                } else {
                    array_push($los_array[$lo_array[$j]],0);
                }
            }
        }

        $lo_value_student = Array();
        $temp_array1 = Array();
        $attainment_array = Array();
        for ($i=0; $i<count($marks_array); $i++) {
            $temp_array1 = array_values($marks_array[$i]);
            $temp_array1 = $temp_array1[0];
            for ($j=0; $j<$number_exps; $j++) {
                $inidividual_lo_marks = $temp_array1[$j]/$lo_count_array[$j];
                for ($k=0; $k<count($lo_array); $k++) {
                    if (in_array($lo_array[$k], $lo_mapped_array[$j][0])) {
                        if ($inidividual_lo_marks >= $los_array[$lo_array[$k]][$j]) {
                            $lo_attainment_array[$lo_array[$k]]['greater_count'] = $lo_attainment_array[$lo_array[$k]]['greater_count'] + 1;
                        } else {
                            $lo_attainment_array[$lo_array[$k]]['lower_count'] = $lo_attainment_array[$lo_array[$k]]['lower_count'] + 1;
                        }
                    }
                }
            }
        }

        $mini_los = array_values($lo_mapped)[count($lo_mapped)-1];
        $mini_los = array_values($mini_los)[0];
        $mini_lo_marks = $mini_project_marks/count($mini_los);
        $mini_target_marks = Array();
        for ($i=0; $i<count($lo_array); $i++) {
            if (in_array($lo_array[$i], $mini_los)) {
                $mini_target_marks[$lo_array[$i]] = ($target_value[$i]*$mini_lo_marks)/100;
            } else {
                $mini_target_marks[$lo_array[$i]] = 0;
            }
        }

        $mini_greater_count = 0;
        $mini_lower_count = 0;

        for ($i=0; $i<count($marks_array); $i++) {
            $temp_array1 = array_values($marks_array[$i]);
            $temp_array1 = $temp_array1[0];
            $inidividual_lo_marks = $temp_array1[$number_exps]/count($mini_los);
            for ($k=0; $k<count($lo_array); $k++) {
                if (in_array($lo_array[$k], $mini_los)) {
                    if ($inidividual_lo_marks >= $mini_target_marks[$lo_array[$k]]) {
                        $lo_attainment_array[$lo_array[$k]]['greater_count'] = $lo_attainment_array[$lo_array[$k]]['greater_count'] + 1;
                    } else {
                        $lo_attainment_array[$lo_array[$k]]['lower_count'] = $lo_attainment_array[$lo_array[$k]]['lower_count'] + 1;
                    }
                }
            }
        }
    
        for ($j=0; $j<count($lo_attainment_array); $j++) {
            $cal = 0;
            // echo (count($marks_array))."<Br>";
            $cal = ($lo_occurance_array[$lo_array[$j]]*count($marks_array)) - $lo_attainment_array[$lo_array[$j]]['greater_count'];
            if (abs($cal)>0) {
                $lo_attainment_array[$lo_array[$j]]['greater_count'] = count($marks_array) - abs($cal);
            } else {
                $lo_attainment_array[$lo_array[$j]]['greater_count'] = count($marks_array);
            }
        }



        $attainment_level_array = Array();
        $percentage_array = Array();

        for ($j=0; $j<count($lo_array); $j++) {
            $percentage = ($lo_attainment_array[$lo_array[$j]]['greater_count']/count($marks_array)) * 100;
            $attainment_level = 0;

            if ($percentage >= (int)$upper_range) {
                $attainment_level = 3;
            } elseif($percentage >= (int)$lower_range && $percentage < (int)$upper_range) {
                $attainment_level = 2;
            } else {
                $attainment_level = 1;
            }

            $attainment_level_array[$lo_array[$j]] = $attainment_level;
            $percentage_array[$lo_array[$j]] = $percentage;
        }

        $attainment_level_array = json_encode($attainment_level_array);
        $percentage_array = json_encode($percentage_array);

        $insert_query = "INSERT INTO practical_attainment (batch_id, attainment_levels, percentages) VALUES ($batch_id, '$attainment_level_array', '$percentage_array')";
        if ($conn-> query($insert_query)) {
            echo "<script>
                alert('Data entered Successfully!!');
                window.location.href='../frontend/Teacher/PracticalAttainment.php';
                </script>";
            die();
        } else {
            echo "<script>
                alert('Some error has occured, please try again!!');
                window.location.href='../frontend/Teacher/PracticalAttainment.php';
                </script>";
            die();
        }
    } else {
        echo "<script>
            alert('Please login and then try to access the page!!');
            window.location.href='../frontend/Login.php';
            </script>";
        die();
    }

?>