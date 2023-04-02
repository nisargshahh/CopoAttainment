<?php
    session_start();
    if(isset($_SESSION['uname'])) {
        include('../assets/copo_config.php');
        include("./CheckForAdmin.php");

        $po_id = $_REQUEST['delete_po'];

        $query = "DELETE FROM po_list WHERE po_id=$po_id";

        if ($conn-> query($query)) {
            echo "<script>
                alert('PO Deleted Successfully!!');
                window.location.href='../frontend/Admin/AddPO.php';
                </script>";
            die();
        } else {
            echo "<script>
                alert('Some error occured please try again!!');
                window.location.href='../frontend/Admin/AddPO.php';
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