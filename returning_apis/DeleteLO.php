<?php
    session_start();
    if(isset($_SESSION['uname'])) {
        include('../assets/copo_config.php');
        include("./CheckForAdmin.php");

        $lo_id = $_REQUEST['delete_lo'];

        $query = "DELETE FROM lo_list WHERE lo_id=$lo_id";

        if ($conn-> query($query)) {
            echo "<script>
                alert('LO Deleted Successfully!!');
                window.location.href='../frontend/Admin/AddLO.php';
                </script>";
            die();
        } else {
            echo "<script>
                alert('Some error occured please try again!!');
                window.location.href='../frontend/Admin/AddLO.php';
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