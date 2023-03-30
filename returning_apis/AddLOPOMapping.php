<?php
    session_start();
    if(isset($_SESSION['uname'])) {
        include('../assets/copo_config.php');

        $lo_list = Array();
        $lo_statements = Array();
        $pos_array = Array();
        $hours_array = Array();
        $query1 = "SELECT * FROM lo_list";
        $result1 = $conn-> query($query1);
        while($row1 = $result1-> fetch_array()) {
            array_push($lo_list, $row1[1]);
            $co_statement = $_REQUEST[$row1[1].'_lo_statement'];
            array_push($lo_statements, $lo_statement);
            $hours = $_REQUEST[$row1[1].'_hours'];
            array_push($hours_array, $hours);
            $pos = $_REQUEST[$row1[1].'_pos'];
            $pos_array[$row1[1]] = $pos;
        }

        $batch_id = $_REQUEST['batch_id'];
        $teacher_id = $_SESSION['uid'];

        $po_list = Array();

        $query = "SELECT * FROM po_list";
        $result = $conn-> query($query);
        while($row = $result-> fetch_array()) {
            array_push($po_list, $row[1]);
        }

        for ($i=0; $i<count($lo_list); $i++) {
            $po_array = Array();
            $po_hours_array = Array();
            for ($j=0; $j<count($po_list); $j++) {
                if ($pos_array[$lo_list[$i]][$j] > 0) {
                    array_push($po_array, $po_list[$j]);
                    array_push($po_hours_array, $pos_array[$lo_list[$i]][$j]);
                }
            }
            $po_array = json_encode($po_array);
            $po_hours_array = json_encode($po_hours_array);
            $insert_query = "INSERT INTO lo_mapping (lo_id, lab_outcome, hours_allotted, po_list, po_hours_allotted, batch_id, teacher_id) VALUES (($i+1), '$lo_statements[$i]', $hours_array[$i], '$po_array', '$po_hours_array', $batch_id, $teacher_id)";
            echo $insert_query;
            if ($conn-> query($insert_query)) {
                $flag = $flag + 1;
            }
        }

        if ($flag == count($co_list)) {
            echo "<script>
                alert('Data Entered Successfully!!');
                window.location.href='../frontend/Teacher/ViewCOPOMapping.php';
                </script>";
            die();
        } else {
            echo "<script>
                alert('Some error occured, please try again!!');
                window.location.href='../frontend/Teacher/AddCOPOMapping.php';
                </script>";
            die();
        }
    } else {
        echo "<script>
            alert('Please Login and then try to access the page!!');
            window.location.href='../frontend/Teacher/AddCOPOMapping.php';
            </script>";
        die();
    }
?>