<?php

    session_start();
    if (isset($_SESSION['uname'])) {
        include("../assets/copo_config.php");

        $batch_id = $_REQUEST["batch_id"];
        $pattern_id = $_REQUEST['pattern_id'];
        $test_id = $_REQUEST['test_id'];
        $co_names = $_REQUEST['co_name'];
        $bt_levels = $_REQUEST['bt_levels'];
        $user_id = $_REQUEST['user_id'];
        $marks_id = $_REQUEST['marks_id'];

        $final_co_array = array(
            "cos"=> $co_names
        );
        $final_co_array = json_encode($final_co_array);

        $final_bt_array = array(
            "bt_levels"=> $bt_levels
        );
        $final_bt_array = json_encode($final_bt_array);

        $quests_min_levels = $_REQUEST['quests_min_levels'];
        $quests_max_levels = $_REQUEST['quests_max_levels'];

        $final_quests_min_levels = array(
            "min_levels" => $quests_min_levels
        );
        $final_quests_min_levels = json_encode($final_quests_min_levels);

        $final_quests_max_levels = array(
            "max_levels" => $quests_max_levels
        );
        $final_quests_max_levels = json_encode($final_quests_max_levels);

        $query = "INSERT INTO test_mapping (quests_cos, quests_bt, quests_range_min_val, quests_range_max_val, pattern_id, created_by, batch_id, marks_id) VALUES ('$final_co_array', '$final_bt_array', '$final_quests_min_levels', '$final_quests_max_levels', $pattern_id, $user_id, $batch_id, $marks_id)";
        if($conn-> query($query)) {
            echo "<script>
                alert('Data entered successfully!!');
                window.location.href='./SaveTestAttainment.php?batch_id=$batch_id&marks_id=$marks_id&test_id=$test_id';
                </script>";
            die();
        } else {
            echo "<script>
                alert('Some error occured, please try again!!');
                window.location.href='../frontend/Teacher/TargetValue.php?pattern_id=$pattern_id&batch_id=$batch_id&test_id=$test_id';
                </script>";
            die();
        }
    } else {
        echo "<script>
            alert('Please Login and then try to access pages!!');
            window.location.href='../frontend/Login.php';
            </script>";
        die();
    }

?>