<?php

    session_start();

    if(isset($_SESSION['uname'])) {
        include '../assets/copo_config.php';
        if(isset($_POST["co"]))
        {
            $co = $_POST["co"];
            $query="INSERT INTO co_list(co_name) VALUES ('$co')";

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