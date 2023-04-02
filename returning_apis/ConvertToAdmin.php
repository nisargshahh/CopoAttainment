<?php

    session_start();
    if (isset($_SESSION['uname'])) {
        include('../assets/copo_config.php');
    
        if(isset($_REQUEST['chk'])) {
            $teacher_id = $_REQUEST['chk'];
            $count = 0;
            while($count < count($teacher_id)) {
                $query = "UPDATE teacher SET type=1 WHERE teacher_id=$teacher_id[$count]";
                if ($conn-> query($query)) {
                    echo "<script>
                        alert('Account successfully activated!!');
                        window.location.href='../frontend/Admin/ActivateSubAdmin.php';
                        </script>";
                    die();
                } else {
                    echo "<script>
                        alert('Some error occured, please try again!!');
                        window.location.href='../frontend/Admin/ActivateSubAdmin.php';
                        </script>";
                    die();
                }
            }
        } else {
            echo "<script>
                alert('Please select user to be activated!!');
                window.location.href='../frontend/Admin/ActivateSubAdmin.php';
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