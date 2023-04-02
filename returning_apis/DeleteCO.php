<?php
    session_start();
    if(isset($_SESSION['uname'])) {
        include('../assets/copo_config.php');
        include("./CheckForAdmin.php");

        $co_id = $_REQUEST['delete_co'];

        $query = "DELETE FROM co_list WHERE co_id=$co_id";

        if ($conn-> query($query)) {
            echo "<script>
                alert('CO Deleted Successfully!!');
                window.location.href='../frontend/Admin/AddCO.php';
                </script>";
            die();
        } else {
            echo "<script>
                alert('Some error occured please try again!!');
                window.location.href='../frontend/Admin/AddCO.php';
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