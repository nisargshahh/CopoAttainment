<?php
    session_start();
    if(isset($_SESSION['uname'])) {
        include("../assets/copo_config.php");

        $selected_items = $_REQUEST['chk'];

        for ($i=0; $i<count($selected_items); $i++) {
            $query =  "DELETE FROM batch WHERE batch_id=$selected_items[$i]";
            if ($conn-> query($query)) {
                // code
            } else {
                echo "<script>
                    alert('Some error occured, please try again after some time!!');
                    window.location.href='../frontend/ViewBatch.php';
                    </script>";
                die();
            }
        }
        echo "<script>
            alert('Batches Deleted successfully!!');
            window.location.href='../frontend/ViewBatch.php';
            </script>";
        die();

    } else {
        echo "<script>
            alert('Please login and then try to access!!');
            window.location.href='../frontend/Login.php';
            </script>";
        die();
    }
?>