<?php
    
    session_start();
    if(isset($_SESSION['uname'])) {
        include "../assets/copo_config.php";
        $batch_id = $_REQUEST['batch_id'];
        $no_pracs = $_REQUEST['no_pracs'];
        $prac_type = $_REQUEST['prac_type'];
        $los = $_REQUEST['los'];
        $exp_names = $_REQUEST['exp_name'];
        $percentages = $_REQUEST['target_value'];
        $lower_range = $_REQUEST['practical_lower_range'];
        $upper_range = $_REQUEST['practical_upper_range'];
        $marks_id = $_REQUEST['marks_id'];
        $mini_los = Array();
        $mini_proj_name = "";

        $mini_proj = $_REQUEST['mini_proj'];


        $teacher_id = $_SESSION['uid'];

        $final_no_pracs = $no_pracs - 3;

        $lo_mapping_array = Array();
        
        $count = 0;

        var_dump($exp_names);
        
        for ($i=0; $i<count($exp_names); $i++) {
            $temp_array = Array();
            $lo_array = Array();
            for ($j=$count; $j<count($los); $j) {
                array_push($lo_array, $los[$count]);
                // echo $los[$count];
                if (strcmp("LO6", $los[$count]) == 0) {
                    $temp_array[$exp_names[$i]] = $lo_array;
                    $count = $count + 1;
                    break;
                }
                $count = $count + 1;
            }
            array_push($lo_mapping_array, $temp_array);
        }

        $mini_proj_marks = 0;

        if ((int)$mini_proj == 1) {
            $mini_los = $_REQUEST['mini_los'];
            $mini_proj_marks = $_REQUEST['mini_proj_marks'];
            $mini_proj_name = $_REQUEST['mini_proj_name'];
            $some_array = Array($mini_proj_name => $mini_los);
            array_push ($lo_mapping_array, $some_array);
        }

        $final_percentages = Array(
            "percentages"=> $percentages,
        );
        $final_percentages = json_encode($final_percentages);

        $final_lo_mapping_array = json_encode($lo_mapping_array);


        $query = "INSERT INTO practical_mapping (number_of_practicals, lo_mapped, batch_id, mini_project, teacher_id, type, target_val_percentage, lower_range, upper_range, marks_id, mini_project_marks) VALUES ($final_no_pracs, '$final_lo_mapping_array', $batch_id, $mini_proj, $teacher_id, $prac_type, '$final_percentages', $lower_range, $upper_range, $marks_id, $mini_proj_marks)";

        echo $query;
        if ($conn-> query($query)) {
            echo "<script>
                alert('Data entered successfully!!');
                window.location.href='./SavePracticalAttainment.php?batch_id=$batch_id'
                </script>";
            die();
        } else {
            echo "<script>
                alert('Some error occured, please try again!!');
                window.location.href='../frontend/Teacher/LoMapping.php?batch_id=$batch_id&no_pracs=$no_pracs&mini_proj=$mini_proj&prac_type=$prac_type';
                </script>";
            die();
        }
    } else {
        echo "<script>
            alert('Please Login and then try to access pages!!');
            window.location.href='../frontend/Login.php';
            </script>";
        die();
    }

?>