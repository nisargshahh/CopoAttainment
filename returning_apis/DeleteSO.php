<?php
    session_start();
    if(isset($_SESSION['uname'])) {
        include('../assets/copo_config.php');
        include("./CheckForAdmin.php");

        $so_id = $_REQUEST['delete_so'];

        $query = "DELETE FROM so_list WHERE so_id=$so_id";

        if ($conn-> query($query)) {
            echo "<script>
                alert('PO Deleted Successfully!!');
                window.location.href='../frontend/Admin/AddSO.php';
                </script>";
            die();
        } else {
            echo "<script>
                alert('Some error occured please try again!!');
                window.location.href='../frontend/Admin/AddSO.php';
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