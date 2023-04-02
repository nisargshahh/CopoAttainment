<?php
    session_start();
    if(isset($_SESSION['uname'])) {
        include('../assets/copo_config.php');
        include("./CheckForAdmin.php");

        $bt_id = $_REQUEST['delete_bt'];

        $query = "DELETE FROM bt WHERE bt_id=$bt_id";

        if ($conn-> query($query)) {
            echo "<script>
                alert('BT Deleted Successfully!!');
                window.location.href='../frontend/Admin/ViewCourses.php';
                </script>";
            die();
        } else {
            echo "<script>
                alert('Some error occured please try again!!');
                window.location.href='../frontend/Admin/ViewCourses.php';
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