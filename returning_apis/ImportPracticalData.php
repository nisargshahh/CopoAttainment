<?php

    session_start();
    if (isset($_SESSION['uname'])) {
        include('../assets/copo_config.php');
        include "../assets/PHPExcel-1.8/Classes/PHPExcel/IOFactory.php";

        $mini_proj = $_REQUEST['mini_proj'];
        $practical_type = $_REQUEST['prac_type'];
        $batch_id = $_REQUEST["batch"];
        $no_pracs = $_REQUEST['no_prac'];
        $mini_proj = 0;
        $mini_proj_marks = 0;
        if(isset($_REQUEST['mini_proj'])) {
            $no_pracs = $no_pracs + 1;
            $mini_proj_marks = $_REQUEST['mini_proj_marks'];
            $mini_proj = 1;
        }
        $teacher_id = $_SESSION['uid'];

        $current_date = date("Y-m-d H:i:s");
    
        $no_pracs = $no_pracs + 2;
    
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
                        $stud_name = "";
                        $marks_array = Array();
                        for ($j=0; $j<(int)$no_pracs; $j++) {
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
                $query = "INSERT INTO marks (marks, batch_id, created, type) VALUES ('$student_array', $batch_id, '$current_date', 2)";
                if ($conn-> query($query)) {
                    $marks_id = $conn-> insert_id;
                    echo "<script>
                        alert('Data entered successfully!!');
                        window.location.href='../frontend/Teacher/LoMapping.php?batch_id=$batch_id&no_pracs=$no_pracs&mini_proj=$mini_proj&prac_type=$practical_type&marks_id=$marks_id&mini_proj_marks=$mini_proj_marks';
                        </script>";
                    die();
                } else {
                    echo "<script>
                        alert('Some error occured, please try again!!');
                        window.location.href='../frontend/Teacher/PracticalMarks.php';
                        </script>";
                    die();
                }
            } else {
                echo "<script>
                    alert('Invalid File Format!!');
                    window.location.href='../frontend/Teacher/PracticalMarks.php';
                    </script>";
                die();
            }
        } else {
            echo "<script>
                alert('Please provide file to enter marks!!');
                window.location.href='../frontend/Teacher/PracticalMarks.php';
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