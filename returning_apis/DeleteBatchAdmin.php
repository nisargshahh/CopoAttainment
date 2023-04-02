<?php
    session_start();
    if(isset($_SESSION['uname'])) {
        include("../assets/copo_config.php");

        $batch_id = $_REQUEST['batch_id'];

        $query =  "DELETE FROM batch WHERE batch_id=$batch_id";
        if ($conn-> query($query)) {
            echo "<script>
                alert('Batch Deleted successfully!!');
                window.location.href='../frontend/ViewBatch.php';
                </script>";
            die();
        } else {
            echo "<script>
                alert('Some error occured, please try again after some time!!');
                window.location.href='../frontend/ViewBatch.php';
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