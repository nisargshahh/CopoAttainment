<?php

    session_start();
    if (isset($_SESSION['uname'])) {
        include('../assets/copo_config.php');
        include "../assets/PHPExcel-1.8/Classes/PHPExcel/IOFactory.php";

        
        $ese_marks = $_REQUEST['esem'];
        $department = $_REQUEST['department'];
        $current_date = date("Y-m-d H:i:s");

    
    
        if(isset($_REQUEST['import'])) {
            $tmp = explode(".", $_FILES["excel"]["name"]);
            $extension = end($tmp);
            $tem = 1;
            $allowed_extension = array("xls", "xlsx", "csv"); 
            if(in_array($extension, $allowed_extension)) {
                $file = $_FILES["excel"]["tmp_name"]; 
                $objPHPExcel = PHPExcel_IOFactory::load($file); 
                foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
                    $highestRow = $worksheet->getHighestRow();
                    for ($row=2; $row<=$highestRow; $row++) {
                        $subject_code = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                        $subject_name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                        $semester = $worksheet->getCellByColumnAndRow(2,$row)->getValue();
                        // query
                        $query = "INSERT INTO `course` (`course_name`, `course_code`, `semester`, `end_sem_total_marks`, `created`, `department`) VALUES ( '$subject_name', '$subject_code', '$semester', '$ese_marks', '$current_date', '$department')";
                        $conn-> query($query);
                    }
                    if ($tem==1) {
                        echo "<script>
                            alert('Data entered successfully!!');
                            window.location.href='../frontend/Admin/Dashboard.php';
                            </script>";
                        die();
                    } else {
                        echo "<script>
                            alert('Some error occured, please try again!!');
                            window.location.href='../frontend/Admin/Dashboard.php';
                            </script>";
                        echo "<h1>$query</h1>";
                        die();
                    }
                }
               
            } else {
                echo "<script>
                    alert('Invalid File Format!!');
                    window.location.href='../frontend/Admin/CreateMultipleCourses.php';
                    </script>";
                die();
               
            }
        } else {
            echo "<script>
                alert('Please provide file to import!!');
                window.location.href='../frontend/Teacher/OralMarks.php';
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