<?php

    session_start();

    if(isset($_SESSION['uname'])) {
        include '../assets/copo_config.php';
        if(isset($_POST["bt"]))
        {
            $bt=$_POST["bt"];
            $query="INSERT INTO bt(bt_name) VALUES ('$bt')";

            if($conn -> query($query)) {
                echo "<script>
                    alert('Data Entered Successfully!');
                    window.location.href='../frontend/Admin/AddBt.php';
                    </script>";
                die();
            }
            else {
                echo "<script>
                    alert('Some error occured, please try again!');
                    window.location.href='../frontend/Admin/AddBt.php';
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