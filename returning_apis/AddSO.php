<?php

    session_start();

    if(isset($_SESSION['uname'])) {
        include '../assets/copo_config.php';
        if(isset($_POST["so"]))
        {
            $so = $_POST["so"];
            $query="INSERT INTO so_list(so_name) VALUES ('$so')";

            if($conn -> query($query)) {
                echo "<script>
                    alert('Data Entered Successfully!');
                    window.location.href='../frontend/Admin/AddSO.php';
                    </script>";
                die();
            }
            else {
                echo "<script>
                    alert('Some error occured, please try again!');
                    window.location.href='../frontend/Admin/AddSO.php';
                    </script>";
                die();
            }
        }
    } else {
        echo "<script>
            alert('Please Login and then try to access the page!!');
            window.location.href='../';
            </script>";
        die();
    }

?>