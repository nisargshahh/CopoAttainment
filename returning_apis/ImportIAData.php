<?php

    session_start();
    if (isset($_SESSION['uname'])) {
        include('../assets/copo_config.php');
        include "../assets/PHPExcel-1.8/Classes/PHPExcel/IOFactory.php";

        $batch_id = $_REQUEST["batch_id"];
        $teacher_id = $_SESSION['uid'];

        $current_date = date("Y-m-d H:i:s");

        $student_array = Array();
    
        if(isset($_POST["import"])) {
            $tmp = explode(".", $_FILES["excel"]["name"]);
            $extension = end($tmp); 
            $allowed_extension = array("xls", "xlsx", "csv"); 
            if(in_array($extension, $allowed_extension)) {
                $file = $_FILES["excel"]["tmp_name"]; 
                $objPHPExcel = PHPExcel_IOFactory::load($file); 
                foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
                    $highestRow = $worksheet->getHighestRow();
                    for ($row=2; $row<=$highestRow; $row++) {
                        $temp_array = Array();
                        $stud_name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                        $marks_array = Array();
                        $data = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                        array_push($marks_array, $data);
                        $temp_array[$stud_name] = $marks_array;
                        array_push($student_array, $temp_array);
                    }
                }
                $student_array = json_encode($student_array);
                $query = "INSERT INTO marks (marks, batch_id, created, type) VALUES ('$student_array', $batch_id, '$current_date', 9)";
                if ($conn-> query($query)) {
                    $marks_id = $conn-> insert_id;
                    echo "<script>
                        alert('Data entered successfully!!');
                        window.location.href='../frontend/Teacher/IAMapping.php?batch_id=$batch_id&marks_id=$marks_id';
                        </script>";
                    die();
                } else {
                    echo "<script>
                        alert('Some error occured, please try again!!');
                        window.location.href='../frontend/Teacher/IAMarks.php';
                        </script>";
                    die();
                }
            } else {
                echo "<script>
                    alert('Invalid File Format!!');
                    window.location.href='../frontend/Teacher/IAMarks.php';
                    </script>";
                die();
            }
        } else {
            echo "<script>
                alert('Please provide file to import!!');
                window.location.href='../frontend/Teacher/IAMarks.php';
                </script>";
            die();
        }
    } else {
        echo "<script>
            alert('Please Login and then try to access!!');
            window.location.href='../frontend/Login.php';
            </script>";
        die();
    }

?>