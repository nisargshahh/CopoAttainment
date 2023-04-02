<?php
    session_start();
    if(isset($_SESSION['uname'])) {
        include('../assets/copo_config.php');
        $batch_id = $_REQUEST['batch_id'];
        $so_statement = $_REQUEST['so_statement'];
        $hours = $_REQUEST['hours'];
        $pos = $_REQUEST['pos'];
        $so_id = $_REQUEST['so_id'];
        $teacher_id = $_SESSION['uid'];

        $count = 0;
        $po_array = Array();
        $po_hours_array = Array();

        $query = "SELECT * FROM po_list";
        $result = $conn-> query($query);
        while($row = $result-> fetch_array()) {
            if ($pos[$count] > 0) {
                array_push($po_array, $row[1]);
                array_push($po_hours_array, $pos[$count]);
            }
            $count = $count + 1;
        }

        $po_array = json_encode($po_array);
        $po_hours_array = json_encode($po_hours_array);

        $insert_query = "INSERT INTO sat_lo_mapping (so_id, sat_outcome, hours_allotted, po_list, po_hours_allotted, batch_id, teacher_id) VALUES ($so_id, '$so_statement', $hours, '$po_array', '$po_hours_array', $batch_id, $teacher_id)";
        if ($conn-> query($insert_query)) {
            echo "<script>
                alert('Data inserted Successfully!!');
                window.location.href='../frontend/Teacher/LOPOMapping.php';
                </script>";
                die();
        } else {
            echo "<script>
                alert('Some error occured, please try again!!');
                window.location.href='../frontend/Teacher/AddLOPOMapping.php';
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