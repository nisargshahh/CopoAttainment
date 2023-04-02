<?php

session_start();
if (isset($_SESSION['uname'])) {
    include('../assets/copo_config.php');
    include "../assets/PHPExcel-1.8/Classes/PHPExcel/IOFactory.php";

    // $mini_proj = $_REQUEST['mini_proj'];
    $practical_type = $_REQUEST['prac_type'];
    $batch_id = $_REQUEST["batch"];
    
    $teacher_id = $_SESSION['uid'];

    $current_date = date("Y-m-d H:i:s");


    $student_array = array();

    if (isset($_POST["import"])) {
        if ($practical_type == 4) {
            $no_pracs = $_REQUEST['no_prac'];
            $mini_proj = 0;
            $mini_proj_marks = 0;
            if (isset($_REQUEST['mini_proj'])) {
                $no_pracs = $no_pracs + 1;
                $mini_proj_marks = $_REQUEST['mini_proj_marks'];
                $mini_proj = 1;
            }
            $no_pracs = $no_pracs + 2;

            $tmp = explode(".", $_FILES["excel"]["name"]);
            $extension = end($tmp);
            $allowed_extension = array("xls", "xlsx", "csv");
            if (in_array($extension, $allowed_extension)) {
                $file = $_FILES["excel"]["tmp_name"];
                $objPHPExcel = PHPExcel_IOFactory::load($file);
                foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
                    $highestRow = $worksheet->getHighestRow();
                    for ($row = 2; $row <= $highestRow; $row++) {
                        $temp_array = array();
                        $stud_name = "";
                        $marks_array = array();
                        for ($j = 0; $j < (int)$no_pracs; $j++) {
                            $data = $worksheet->getCellByColumnAndRow($j, $row)->getValue();
                            if ($j > 1) {
                                array_push($marks_array, $data);
                            } else {
                                $stud_name = $data;
                            }
                        }
                        $temp_array[$stud_name] = $marks_array;
                        array_push($student_array, $temp_array);
                    }
                }
                $student_array = json_encode($student_array);
                $query = "INSERT INTO marks (marks, batch_id, created, type) VALUES ('$student_array', $batch_id, '$current_date', $practical_type)";
                // echo $query;
                if ($conn -> query($query)) {
                    $marks_id = $conn-> insert_id;
                    echo "<script>
                        alert('Data entered successfully!!');
                        window.location.href='../frontend/Teacher/SoMapping.php?batch_id=$batch_id&no_pracs=$no_pracs&mini_proj=$mini_proj&prac_type=$practical_type&marks_id=$marks_id&mini_proj_marks=$mini_proj_marks';
                        </script>";
                    die();
                } else {
                    echo "<script>
                        alert('Some error has occured please try again!!');
                        window.location.href='../frontend/Teacher/SATMarks.php;
                        </script>";
                    die();
                }
            }
        } else if ($practical_type == 5) {
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
                $query = "INSERT INTO marks (marks, batch_id, created, type) VALUES ('$student_array', $batch_id, '$current_date', $practical_type)";
                // $conn-> query($query)
                // echo $query;
                if ($conn-> query($query)) {
                    $marks_id = $conn-> insert_id;
                    echo "<script>
                        alert('Data entered successfully!!');
                        window.location.href='../frontend/Teacher/ActivityTechnologyLoMapping.php?batch_id=$batch_id&marks_id=$marks_id&prac_type=$practical_type';
                        </script>";
                    die();
                } else {
                    echo "<script>
                        alert('Some error occured, please try again!!');
                        window.location.href='../frontend/Teacher/SATMarks.php';
                        </script>";
                    die();
                }
            } else {
                echo "<script>
                    alert('Invalid File Format!!');
                    window.location.href='../frontend/Teacher/SATMarks.php';
                    </script>";
                die();
            }
            
        }
    } else {
        echo "<script>
            alert('Invalid File Format!!');
            window.location.href='../frontend/Teacher/SATMarks.php';
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