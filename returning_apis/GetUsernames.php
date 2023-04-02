<?php
    session_start();

    if (isset($_SESSION['uname'])) {
        include( '../assets/copo_config.php' );
    
        $date = date("Y-m-d H:i:s");
    
        $succ = Array(
            "success" => true,
            "teacher_email" => [],
            "http code"=> 200
        );
        $teacher_email = Array();
        $query = "SELECT teacher_email FROM teacher";
        $result = $conn-> query($query);
        while ($row = $result-> fetch_array()) {
            array_push($teacher_email, $row["teacher_email"]);
        }
        $succ["teacher_email"] = $teacher_email;
    
        echo json_encode($succ);
    } else {
        echo "<script>
            alert('Please Login and then try to access the page!!');
            window.location.href='../';
            </script>";
        die();
    }
?>