<?php
    session_start();
    if (isset($_SESSION['uname'])) {
        include('../assets/copo_config.php');
        $batch_id = $_REQUEST['batch_id'];
        $marks_id = $_REQUEST['marks_id'];
        $target_value = $_REQUEST['target_value'];
        $lower_range = $_REQUEST['lower_range'];
        $upper_range = $_REQUEST['upper_range'];

        $target_value = json_encode($target_value);

        $query = "INSERT INTO lab_exit_mapping (target_value, lower_range, upper_range, batch_id, marks_id) VALUES ('$target_value', $lower_range, $upper_range, $batch_id, $marks_id)";

        if($conn-> query($query)) {
            echo "<script>
                alert('Data entered successfully!!');
                window.location.href='./SaveLabExitAttainment.php';
                </script>";
            die();
        } else {
            echo "<script>
                alert('Some error occured, please try again!!');
                window.location.href='../frontend/Teacher/LabExitTargetValue.php?batch_id=$batch_id&marks_id=$marks_id';
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