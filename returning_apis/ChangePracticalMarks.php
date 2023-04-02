<?php
    session_start();
    if(isset($_SESSION['uname'])) {
        include('../assets/copo_config.php');

        $prac_marks = $_REQUEST['prac_marks'];
        $current_date = date("Y-m-d H:i:s");

        $query = "UPDATE practical_marks SET marks=$prac_marks, updated_at='$current_date' WHERE id=1";

        if ($conn-> query($query)) {
            echo "<script>
                alert('Marks Updated Successfully!!');
                window.location.href='../frontend/Admin/ChangePracticalMarks.php';
                </script>";
            die();
        } else {
            echo "<script>
                alert('Some error occured please try again!!');
                window.location.href='../frontend/Admin/ChangePracticalMarks.php';
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