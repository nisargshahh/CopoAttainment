<?php
    session_start();

    if(isset($_SESSION['uname'])) {
        include('../assets/copo_config.php');
        $current_date = date("Y-m-d H:i:s");

        $user_id = $_REQUEST["uid"];
        $course_id = $_REQUEST["course_id"];
        $ay = $_REQUEST["ay"];
        $course_name = "";
    
        $query1 = "SELECT course_name FROM course WHERE course_id=$course_id";
        $result1 = $conn-> query($query1);
        while ($row = $result1-> fetch_array()) {
            $course_name = $row[0];
        }
    
        $batch = $course_name." :".$ay;
    
        $query = "INSERT INTO batch (batch_name, year, created_by, created, course_id) VALUES ('$batch', '$ay', $user_id, '$current_date', $course_id)";
        if ($conn-> query($query)) {
            echo "<script>
                alert('Data Entered Successfully!');
                window.location.href='../frontend/Teacher/CreateBatch.php';
                </script>";
            die();
        } else {
            echo "<script>
                alert('Some error occured, please try again!!');
                window.location.href='../frontend/Teacher/CreateBatch.php';
                </script>";
            die();
        }
    }

?>