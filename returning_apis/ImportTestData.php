<?php

    session_start();
    if (isset($_SESSION['uname'])) {
        include "../assets/PHPExcel-1.8/Classes/PHPExcel/IOFactory.php";
        include "../assets/copo_config.php";
        if(isset($_POST["import"])) {
            $batch = $_REQUEST["batch"];
            $test_id = $_REQUEST['test_val'];
            $pattern_id = $_REQUEST['patterns'];
            $current_datetime = date("Y-m-d H:i:s");
            $marks_array = Array();
            $final_array = Array();
            $number_quests = 0;
            $main_quests_array = Array();
            $sub_quests_array = Array();
            $pattern_query = "SELECT * FROM pattern WHERE pattern_id=$pattern_id";
            $pattern_result = $conn-> query($pattern_query);
            while($pattern_row = $pattern_result-> fetch_array()) {
                $main_quests_array = json_decode($pattern_row[4], true);
                $sub_quests_array = json_decode($pattern_row[5], true);
            }

            for ($i=0; $i<count($main_quests_array); $i++) {
                if($sub_quests_array[$i] == 0) {
                    $number_quests = $number_quests + 1;
                } else {
                    for ($j=0; $j<$sub_quests_array[$i]; $j++) {
                        $number_quests = $number_quests + 1;
                    }
                }
            }

            $tmp = explode(".", $_FILES["excel"]["name"]);
            $extension = end($tmp); 
            $allowed_extension = array("xls", "xlsx", "csv"); 
            if(in_array($extension, $allowed_extension)) {
                $file = $_FILES["excel"]["tmp_name"]; 
                $objPHPExcel = PHPExcel_IOFactory::load($file);

                foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
                    $highestRow = $worksheet->getHighestRow();
                    for($row=2, $student=1; $row<=$highestRow; $row++, $student++) {
                        $tempArray = [];
                        for ($column=2; $column<($number_quests+2); $column++) {
                            array_push($tempArray, "".$worksheet->getCellByColumnAndRow($column, $row)->getValue()."");
                        }
                        $tempDict = array(
                            $worksheet->getCellByColumnAndRow(1, $row)->getValue()=> $tempArray,
                        );
                        array_push($marks_array, $tempDict);
                    }
                    $final_array = json_encode($marks_array);

                    $query = "INSERT INTO marks (marks, pattern_id, batch_id, created, type) VALUES ('$final_array', $pattern_id, $batch, '$current_datetime', 1)";
                    if ($conn-> query($query)) {
                        $marks_id = $conn-> insert_id;
                        echo "<script>
                            alert('Data entered sccessfully!!');
                            window.location.href='../frontend/Teacher/TargetValue.php?test_id=$test_id&batch_id=$batch&pattern_id=$pattern_id&marks_id=$marks_id';
                            </script>";
                        die();
                    } else {
                        echo "<script>
                            alert('Some error occured, please try again!!');
                            window.location.href='../frontend/Teacher/TestMarks.php';
                            </script>";
                        die();
                    }
                }
            }
            else {
                echo "<script>
                    alert('Invalid File Format!!');
                    window.location.href='../frontend/Teacher/TestMarks.php';
                    </script>";
                die();
            }
        } else {
            echo "<script>
                alert('Please provide file to import marks!!');
                window.location.href='../frontend/Teacher/TestMarks.php';
                </script>";
            die();
        }
    } else {
        echo "<script>
            alert('Please login and then try to access the page!!');
            window.location.href='../frontend/Login.php';
            </script>";
        die();
    }

?>