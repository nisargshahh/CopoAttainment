<?php
    session_start();

    if(isset($_SESSION['uname'])){
        include "../assets/copo_config.php";
        $activity_name = $_REQUEST['activity_name'];
        $activity_target_value = $_REQUEST['activity_target_value'];
        $aotos = $_REQUEST['aotos'];
        $upper_range = $_REQUEST['upper_range'];
        $lower_range = $_REQUEST['lower_range'];
        $batch_id = $_REQUEST['batch_id'];
        $teacher_id = $_SESSION['uid'];
        $prac_type = $_REQUEST['prac_type'];
        $activity_target_value = $_REQUEST['activity_target_value'];
        $marks_id = $_REQUEST['marks_id'];
        $final_aotos = json_encode($aotos);

        $query = "INSERT INTO sat_mapping (number_practicals, so_mapped, batch_id, mini_project, teacher_id, type, target_val_percentage, lower_range, upper_range, marks_id, mini_project_marks) VALUES (1, '$final_aotos', $batch_id, 1, $teacher_id, $prac_type, '$activity_target_value', $lower_range, $upper_range, $marks_id, 0)";

        if($conn -> query($query)) {
            echo "<script>
                alert('Data entered successfully!!');
                window.location.href='../frontend/Teacher/SATActivityBasedAttainment.php'
                </script>";
            die();
        } else {
            echo "<script>
                alert('Some error occured, please try again!!');
                window.location.href='../frontend/Teacher/ActivityTechnologyLoMapping.php?batch_id=$batch_id&prac_type=$prac_type&marks_id=$marks_id';
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