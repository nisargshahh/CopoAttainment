<?php
    session_start();
    if (isset($_SESSION['uname'])) {
        include('../assets/copo_config.php');
        $batch_id = $_REQUEST['batch_id'];

        $po_list = Array();
        $get_po_query = "SELECT * FROM po_list";
        $get_po_result = $conn-> query($get_po_query);
        while ($get_po_row = $get_po_result-> fetch_array()) {
            array_push($po_list, $get_po_row[1]);
        }

        $get_co_mapping = "SELECT * FROM co_mapping WHERE batch_id=$batch_id";
        $get_co_mapping_result = $conn-> query($get_co_mapping);
        while($row = $get_co_mapping_result-> fetch_array()) {
            // code
        }
    } else {
        echo "<script>
            alert('Please login and then try to access the page!!');
            window.location.href='../frontend/Login.php';
            </script>";
        die();
    }
?>