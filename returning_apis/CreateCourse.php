<?php

    session_start();
    if(isset($_SESSION['uname'])) {
        include('../assets/copo_config.php');

        $course_code = $_REQUEST['course_code'];
        $subject_name = $_REQUEST['subname'];
        $sem = $_REQUEST['semester'];
        $ese_marks = $_REQUEST['esem'];
        $department = $_REQUEST['department'];

        $current_datetime = date("Y-m-d H:i:s");

        $query = "INSERT INTO course (course_name, course_code, semester, end_sem_total_marks, created, department) VALUES ('$subject_name', '$course_code', $sem, $ese_marks, '$current_datetime',$department)";
        if($conn-> query($query)) {
            echo "<script>
                alert('Data Entered Successfully!!');
                window.location.href='../frontend/Admin/Dashboard.php';
                </script>";
            die();
        } else {
            echo "<script>
                alert('Some error occured, please try again!!');
                window.location.href='../frontend/Admin/CreateCourse.php';
                </script>";
            die();
        }
    } else {
        echo "<script>
            alert('Please login and then try to access the page!!');
            window.location.href='../frontend/Login.php';
            </script>";
        die();
    }

?>