<?php

    session_start();
    if (isset($_SESSION['uname'])) {
        include("../assets/copo_config.php");

        $test_id = $_REQUEST['test_id'];

        $succ = array (
            "success" => true,
            "patterns" => [],
            "http code"=> 200
        );

        $pattern_array = Array();

        $query = "SELECT * FROM pattern WHERE test_id=$test_id";
        $result = $conn-> query($query);

        while($row = $result-> fetch_array()) {
            $temp_array = array();
            $temp_array['pattern_id'] = $row[0];
            $temp_array['pattern_name'] = $row[1];
            array_push($pattern_array, $temp_array);
        }

        echo json_encode($pattern_array);
    } else {
        echo "<script>
            alert('Please Login and then try to access the page!!');
            window.location.href='../';
            </script>";
        die();
    }

?>