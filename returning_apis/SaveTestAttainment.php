<?php
    session_start();
    if (isset($_SESSION['uname'])) {
        include('../assets/copo_config.php');
        $batch_id = $_REQUEST['batch_id'];
        $marks_id = $_REQUEST['marks_id'];
        $test_id = $_REQUEST['test_id'];

        $lower_range = 0;
        $upper_range = 0;
        $number_quests = 0;
        $co_mapped = Array();
        $lo_array = Array();
        $marks_array = Array();

        $total_main_marks_array = Array();
        $total_sub_marks_array = Array();
        $query = "SELECT * FROM pattern WHERE pattern_id=(SELECT pattern_id FROM marks WHERE marks_id=$marks_id)";
        $result = $conn-> query($query);
        while($row = $result-> fetch_array()) {
            $total_main_marks_array = json_decode($row[4], true);
            $total_sub_marks_array = json_decode($row[6], true);
        }

        $query1 = "SELECT * FROM marks WHERE batch_id=$batch_id AND type=1";
        $result1 = $conn-> query($query1);
        while($row1 = $result1-> fetch_array()) {
            $marks_array = json_decode($row1[1], true);
        }

        $query2 = "SELECT * FROM test_mapping WHERE batch_id=$batch_id AND marks_id=$marks_id";
        $result2 = $conn-> query($query2);
        while($row2 = $result2-> fetch_array()) {
            $lower_range = json_decode($row2[3], true);
            $upper_range = json_decode($row2[4], true);
            $co_mapped = json_decode($row2[1], true);
        }

        $co_percentage_mapping_array = Array();
        $attainment_level_array = Array();
        $co_array = Array();

        $query3 = "SELECT * FROM co_list";
        $result3 = $conn-> query($query3);
        while($row3 = $result3-> fetch_array()) {
            array_push($co_array, $row3[1]);
            array_push($co_percentage_mapping_array, 0);
            array_push($attainment_level_array, 0);
        }

        $target_value = Array();

        $query4 = "SELECT * FROM co_target_value WHERE batch_id=$batch_id";
        $result4 = $conn-> query($query4);
        while($row4 = $result4-> fetch_array()) {
            $target_value = json_decode($row4[1], true);
        }

        $temp_array = $co_mapped['cos'];
        $target_value_marks = Array();

        for($i=0; $i<count($total_main_marks_array); $i++) {
            if ($total_sub_marks_array[$i] == 0) {
                $target_marks = ((int)$total_main_marks_array[$i]*$target_value[((int)$temp_array[$i] - 1)])/100;
                array_push($target_value_marks, $target_marks);
                $number_quests = $number_quests + 1;
            } else {
                for ($j=0; $j<count($total_sub_marks_array[$i]); $j++) {
                    $target_marks = ($total_sub_marks_array[$i][$j]*$target_value[((int)$temp_array[$i] - 1)])/100;
                    array_push($target_value_marks, $target_marks);
                    $number_quests = $number_quests + 1;
                }
            }
        }

        $marks_temp_array = Array();
        $attainment_array = Array();

        $quests_greater_array = [0,0,0,0];
        $quests_lower_array = [0,0,0,0];

        for ($i=0; $i<count($marks_array); $i++) {
            $marks_temp_array = array_values($marks_array[$i])[0];
            for ($j=0; $j<$number_quests; $j++) {
                if ($marks_temp_array[$j]>$target_value_marks[$j]) {
                    $quests_greater_array[$j] = $quests_greater_array[$j] + 1;
                } else {
                    $quests_lower_array[$j] = $quests_lower_array[$j] + 1;
                }
            }
        }

        $quests_percentage_array = Array();
        $attainment_level = 0;

        $get_co_attainment = "SELECT * FROM co_attainment WHERE batch_id=$batch_id";
        $co_attainment_result = $conn-> query($get_co_attainment);
        if ($co_attainment_row = $co_attainment_result-> fetch_array()) {
            $attainment_level_array = json_decode($co_attainment_row[3], true);
            $co_percentage_mapping_array = json_decode($co_attainment_row[2], true);
        }

        $upper_range = array_values($upper_range)[0];
        $lower_range = array_values($lower_range)[0];

        for ($k=0; $k<$number_quests; $k++) {
            $percentage = ($quests_greater_array[$k]/count($marks_array)) * 100;

            if ($percentage >= (int)$upper_range[$k]) {
                $attainment_level = 3;
            } elseif($percentage >= (int)$lower_range && $percentage < (int)$upper_range) {
                $attainment_level = 2;
            } else {
                $attainment_level = 1;
            }

            if ($co_percentage_mapping_array[((int)$temp_array[$k] - 1)] == 0) {
                $co_percentage_mapping_array[((int)$temp_array[$k] - 1)] = round($percentage,1);
                $attainment_level_array[((int)$temp_array[$k] - 1)] = $attainment_level;
            } else {
                $co_percentage_mapping_array[((int)$temp_array[$k] - 1)] = round((($co_percentage_mapping_array[((int)$temp_array[$k] - 1)] + $percentage) / 2), 1);
                $attainment_level_array[((int)$temp_array[$k] - 1)] = round(($attainment_level_array[((int)$temp_array[$k] - 1)] + $attainment_level)/2, 1);
            }
            array_push($quests_percentage_array, round($percentage, 1));
        }

        $co_percentage_mapping_array = json_encode($co_percentage_mapping_array);
        $attainment_level_array = json_encode($attainment_level_array);

        $insert_query = "INSERT INTO co_attainment (batch_id, attainment_levels, percentages, test_id) VALUES ($batch_id, '$attainment_level_array', '$co_percentage_mapping_array', $test_id)";
        if ($conn-> query($insert_query)) {
            echo "<script>
                alert('Data entered Successfully!!');
                window.location.href='../frontend/Teacher/COAttainmentIndex.php';
                </script>";
            die();
        } else {
            echo "<script>
                alert('Some error has occured, please try again!!');
                window.location.href='../frontend/Teacher/COAttainmentIndex.php';
                </script>";
            die();
        }
    } else {
        echo "<script>
            alert('Please Login and then try to access the page!!');
            window.location.href='../';
            </script>";
        die();
    }

?>