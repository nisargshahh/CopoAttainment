<?php
    session_start();
    if(isset($_SESSION['uname'])) {
        include('../assets/copo_config.php');
        include("./CheckForAdmin.php");

        $department_id = $_REQUEST['delete_dept'];

        $query = "DELETE FROM department WHERE dept_id=$department_id";

        if ($conn-> query($query)) {
            echo "<script>
                alert('Department Deleted Successfully!!');
                window.location.href='../frontend/Admin/ViewCourses.php';
                </script>";
            die();
        } else {
            echo "<script>
                alert('Some error occured please try again!!');
                window.location.href='../frontend/Admin/ViewCourses.php';
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