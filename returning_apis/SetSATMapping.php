<?php
    
    session_start();
    if(isset($_SESSION['uname'])) {
        include "../assets/copo_config.php";
        $batch_id = $_REQUEST['batch_id'];
        $no_pracs = $_REQUEST['no_pracs'];
        $prac_type = $_REQUEST['prac_type'];
        // $sos = $_REQUEST['sos'];
        $exp_names = $_REQUEST['exp_name'];
        $percentages = $_REQUEST['target_value'];
        $lower_range = $_REQUEST['practical_lower_range'];
        $upper_range = $_REQUEST['practical_upper_range'];
        $marks_id = $_REQUEST['marks_id'];
        $mini_sos = Array();
        $mini_proj_name = "";

        $mini_proj = $_REQUEST['mini_proj'];


        $teacher_id = $_SESSION['uid'];

        $final_no_pracs = $no_pracs - 3;

        $so_mapping_array = Array();
        
        $count = 0;

        // var_dump($exp_names);

        for ($i=0; $i<count($exp_names); $i++) {
            $so_array = $_REQUEST['sos'.$i];
            array_push($so_mapping_array, $so_array);
        }


        $mini_proj_marks = 0;

        if ((int)$mini_proj == 1) {
            $mini_sos = $_REQUEST['mini_sos'];
            $mini_proj_marks = $_REQUEST['mini_proj_marks'];
            $mini_proj_name = $_REQUEST['mini_proj_name'];
            $some_array = Array($mini_proj_name => $mini_sos);
            array_push ($so_mapping_array, $some_array);
        }

        $final_so_mapping_array = json_encode($so_mapping_array);

        $final_percentages = Array(
            "percentages"=> $percentages,
        );
        $final_percentages = json_encode($final_percentages);


        $query = "INSERT INTO sat_mapping (number_practicals, so_mapped, batch_id, mini_project, teacher_id, type, target_val_percentage, lower_range, upper_range, marks_id, mini_project_marks) VALUES ($final_no_pracs, '$final_so_mapping_array', $batch_id, $mini_proj, $teacher_id, $prac_type, '$final_percentages', $lower_range, $upper_range, $marks_id, $mini_proj_marks)";

        if ($conn-> query($query)) {
            echo "<script>
                alert('Data entered successfully!!');
                window.location.href='../frontend/Teacher/SATSkillBasedAttainment.php'
                </script>";
            die();
        } else {
            echo "<script>
                alert('Some error occured, please try again!!');
                window.location.href='../frontend/Teacher/SoMapping.php?batch_id=$batch_id&no_pracs=$no_pracs&mini_proj=$mini_proj&prac_type=$prac_type&marks_id=$marks_id';
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