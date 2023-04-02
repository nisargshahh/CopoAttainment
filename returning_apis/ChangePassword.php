<?php
    session_start();
    if (isset($_SESSION['uname'])) {
        include('../assets/copo_config.php');

        $old_password = $_REQUEST['oldPassword'];
        $new_password = $_REQUEST['newPassword'];
        $re_new_password = $_REQUEST['reNewPassword'];

        if(trim($old_password)=="" || trim($new_password)=="" || trim($re_new_password)=="") {
            echo "<script>
                alert('Please enter valid string!!');
                window.location.href='../frontend/Teacher/ChangePassword.php';
                </script>";
            die();
        }

        if (strcmp($new_password, $re_new_password) !== 0) {
            echo "<script>
                alert('New Password and re entered new password does not match!!');
                window.location.href='../frontend/Teacher/ChangePassword.php';
                </script>";
            die();
        }

        $user_id = $_SESSION['uid'];
        $query = "SELECT password FROM teacher WHERE teacher_id=$user_id";
        $result = $conn-> query($query);
        while($row = $result-> fetch_array()) {
            if (strcmp($old_password, $row[0]) !== 0) {
                echo "<script>
                    alert('Incorrect Old Password!!');
                    window.location.href='../frontend/Teacher/ChangePassword.php';
                    </script>";
                die();
            }
        }

        $update_query = "UPDATE teacher SET password='$new_password' WHERE teacher_id=$user_id";
        if($conn-> query($update_query)) {
            echo "<script>
                alert('Password Updated Successfully!!');
                window.location.href='../frontend/Teacher/Dashboard.php';
                </script>";
            die();
        } else {
            echo "<script>
                alert('Some error occured, please try again!!');
                window.location.href='../frontend/Teacher/ChangePassword.php';
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