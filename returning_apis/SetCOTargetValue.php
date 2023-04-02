<?php
    session_start();
    if (isset($_SESSION['uname'])) {
        include('../assets/copo_config.php');

        $batch_id = $_REQUEST['batch_id'];

        $co_list = Array();
        $query = "SELECT * FROM co_list";
        $result = $conn-> query($query);
        while($row = $result-> fetch_array()) {
            array_push($co_list, $row[1]);
        }

        $target_value = $_REQUEST['target_value'];

        if (count($target_value) !== count($co_list)) {
            echo "<script>
                alert('Please enter all target values and then try again!!');
                window.location.href='../frontend/Teacher/COTargetValue.php?batch_id=$batch_id;
                </script>";
            die();
        }

        $target_value = json_encode($target_value);
        $insert_query = "INSERT INTO co_target_value(percentages, batch_id) VALUES ('$target_value', $batch_id)";
        if ($conn-> query($insert_query)) {
            echo "<script>
                alert('Data entered Successfully!!');
                window.location.href='../frontend/Teacher/TestMarks.php';
                </script>";
            die();
        } else {
            echo "<script>
                alert('Some error has occured, please try again!!');
                window.location.href='../frontend/Teacher/COTargetValue.php?batch_id=$batch_id';
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