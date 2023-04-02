<?php
    session_start();
    if(isset($_SESSION['uname'])) {
        include('../assets/copo_config.php');

        $co_name = $_REQUEST['co_name'];
        $hours = $_REQUEST['hours'];
        $pos_array = $_REQUEST['co_pos'];

        $batch_id = $_REQUEST['batch_id'];
        $teacher_id = $_SESSION['uid'];
        $co_id = $_REQUEST['co_id'];

        $po_list = Array();

        $query = "SELECT * FROM po_list";
        $result = $conn-> query($query);
        while($row = $result-> fetch_array()) {
            array_push($po_list, $row[1]);
        }

        $po_array = Array();
        $po_hours_array = Array();
        for ($j=0; $j<count($po_list); $j++) {
            if ($pos_array[$j] > 0) {
                array_push($po_array, $po_list[$j]);
                array_push($po_hours_array, $pos_array[$j]);
            }
        }
        $po_array = json_encode($po_array);
        $po_hours_array = json_encode($po_hours_array);

        if (strcmp($co_name, "") != 0) {
            $update_query_name = "UPDATE co_mapping SET course_outcome=$co_name WHERE batch_id=$batch_id AND co_id=$co_id";
            if ($conn-> query($update_query_name)) {
                if (strcmp($hours, "") != 0){
                    $update_query_hours = "UPDATE co_mapping SET hours_allotted=$hours, po_list='$po_array', po_hours_allotted='$po_hours_array' WHERE batch_id=$batch_id AND co_id=$co_id";
                    if ($conn-> query($update_query_hours)) {
                        echo "<script>
                            alert('Some Error Occured, please try again!!');
                            window.location.href='../frontend/Teacher/VieCOPOMapping.php;
                            </script>";
                        die();
                    } else {
                        echo "<script>
                            alert('Some Error Occured, please try again!!');
                            window.location.href='../frontend/Teacher/EditCOPOMapping.php?batch_id=$batch_id&co_id=$co_id';
                            </script>";
                        die();
                    }
                }
            } else {
                echo "<script>
                    alert('Some Error Occured, please try again!!');
                    window.location.href='../frontend/Teacher/EditCOPOMapping.php?batch_id=$batch_id&co_id=$co_id';
                    </script>";
                die();
            }
        } else {
            if (strcmp($hours, "") != 0){
                $update_query_hours = "UPDATE co_mapping SET hours_allotted=$hours, po_list='$po_array', po_hours_allotted='$po_hours_array' WHERE batch_id=$batch_id AND co_id=$co_id";
                if ($conn-> query($update_query_hours)) {
                    echo "<script>
                        alert('Some Error Occured, please try again!!');
                        window.location.href='../frontend/Teacher/VieCOPOMapping.php;
                        </script>";
                    die();
                } else {
                    echo "<script>
                        alert('Some Error Occured, please try again!!');
                        window.location.href='../frontend/Teacher/EditCOPOMapping.php?batch_id=$batch_id&co_id=$co_id';
                        </script>";
                    die();
                }
            }
        }
    } else {
        echo "<script>
            alert('Please Login and then try to access the page!!');
            window.location.href='../';
            </script>";
        die();
    }
?>