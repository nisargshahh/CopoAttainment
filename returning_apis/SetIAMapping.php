<?php
    session_start();
    if(isset($_SESSION['uname'])) {
        include('../assets/copo_config.php');
        $batch_id = $_REQUEST['batch_id'];
        $marks_id = $_REQUEST['marks_id'];
        $target_value = $_REQUEST['target_value'];
        $lower_range = $_REQUEST['ia_lower_range'];
        $upper_range = $_REQUEST['ia_upper_range'];

        $teacher_id = $_SESSION['uid'];

        $query = "INSERT INTO ia_mapping (batch_id, teacher_id, target_value, lower_range, upper_range, marks_id) VALUES ($batch_id, $teacher_id, $target_value, $lower_range, $upper_range, $marks_id)";
        if ($conn-> query($query)) {
            echo "<script>
                alert('Data Entered Successfully!!');
                window.location.href='./SaveIAAttainment.php?batch_id=$batch_id';
                </script>";
            die();
        } else {
            echo "<script>
                alert('Some error occured, please try again!!');
                window.location.href='../frontend/Teacher/IAMapping.php?batch_id=$batch_id&marks_id=$marks_id';
                </script>";
            die();
        }
    } else {
        echo "<script>
            alert('Please Login and then try accessing the page!!');
            window.location.href='..frontend/Login.php';
            </script>";
        die();
    }
?>