<?php

    session_start();
    if (isset($_SESSION['uname'])) {
        include('../assets/copo_config.php');

        $succ = array (
            "success" => true,
            "batch" => [],
            "http code"=> 200
        );
    
        $batchArray = Array();
    
        $course_id = $_REQUEST['course_id'];
        $teacher_id = $_REQUEST['teacher_id'];

        $query = "SELECT * FROM batch WHERE course_id=$course_id AND created_by=$teacher_id";
        $result = $conn-> query($query);
        while($row = $result-> fetch_array()) {
            $tempArray = array(
                "batch_id"=> $row[0],
                "batch_name"=> $row[1],
            );
            array_push($batchArray, $tempArray);
        }

        $succ['batch'] = $batchArray;
        echo json_encode($succ);
    } else {
        echo "<script>
            alert('Please login and then try to access!!');
            window.location.href='../frontend/Login.php';
            </script>";
        die();
    }

?>