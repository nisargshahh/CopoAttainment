<?php

    session_start();
    if (isset($_SESSION['uname'])) {
        include("../assets/copo_config.php");

        $test = $_REQUEST['test'];

        if ((int)$test == 0) {
            echo "<script>
                alert('Please enter all the credentials and then try again!');
                window.location.href='../frontend/Admin/AddPattern.php';
                </script>";
            die();
        }

        $total_quests = $_REQUEST['no_main_questions'];
        $total_marks = $_REQUEST['marks'];

        $pattern_name = $_REQUEST['pattern_name'];

        $sub_quests_array = Array();
        $sub_quests_marks_array = Array();
        for ($i=1; $i<=$total_quests; $i++) {
            $sub_quests = $_REQUEST['sub_quests_'.$i];
            if (isset($_REQUEST['sub_quests_marks_'.$i])) {
                $sub_quests_marks = $_REQUEST['sub_quests_marks_'.$i];
                array_push($sub_quests_marks_array, $sub_quests_marks);
            } else {
                array_push($sub_quests_marks_array, 0);
            }
            array_push($sub_quests_array, $sub_quests);
        }

        $sub_marks = $_REQUEST['sub_marks'];

        $final_sub_marks = json_encode($sub_marks);
        $final_sub_quests = json_encode($sub_quests_array);
        $final_sub_quests_marks_array = json_encode($sub_quests_marks_array);

        $current_date = date("Y-m-d H:i:s");

        $query = "INSERT INTO pattern (pattern_name, test_id, no_main_questions, main_question_marks, no_of_sub_questions, sub_questions_marks, total_marks, created) VALUES ('$pattern_name', $test, $total_quests, '$final_sub_marks', '$final_sub_quests', '$final_sub_quests_marks_array', $total_marks, '$current_date')";
        if($conn-> query($query)) {
            echo "<script>
                alert('Data Entered Successfully!');
                window.location.href='../frontend/Admin/AddPattern.php';
                </script>";
            die();
        } else {
            echo "<script>
                alert('Some error occured, please try again!');
                window.location.href='../frontend/Admin/AddPattern.php';
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