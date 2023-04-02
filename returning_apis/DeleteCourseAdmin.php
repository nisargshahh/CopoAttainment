<?php
    session_start();
    if(isset($_SESSION['uname'])) {
        include('../assets/copo_config.php');
        include("./CheckForAdmin.php");

        $course_id = $_REQUEST['course_id'];

        $query = "DELETE FROM course WHERE course_id=$course_id";

        if ($conn-> query($query)) {
            echo "<script>
                alert('Course Deleted Successfully!!');
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