<?php
  session_start();
  if (isset($_SESSION['uname'])) {
    include('../assets/copo_config.php');
    include('../assets/PHPExcel-1.8/Classes/PHPExcel/IOFactory.php');
    $tmp = explode(".", $_FILES["excel"]["name"]);
    $batch_id = $_REQUEST['batch_id'];
    $extension = end($tmp);
    $allowed_extension = array("xls", "xlsx", "csv");
    $current_date = date("Y-m-d H:i:s");
    $lo_list = Array();
    $query1 = "SELECT * FROM lo_list";
    $result1 = $conn-> query($query1);
    while($row1 = $result1-> fetch_array()) {
      array_push($lo_list, $row1[1]);
    }
    if (in_array($extension, $allowed_extension)) {
      $file = $_FILES["excel"]["tmp_name"];
      $objPHPExcel = PHPExcel_IOFactory::load($file);
      $student_array = Array();
      foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
        $highestRow = $worksheet->getHighestRow();
        for ($row = 2; $row <= $highestRow; $row++) {
          $temp_array = Array();
          $stud_name = "";
          $marks_array = Array();
          for ($j=0; $j<(count($lo_list)+2); $j++) {
              $data = $worksheet->getCellByColumnAndRow($j, $row)->getValue();
              if ($j == 0) {
                continue;
              }
              if ($j == 1) {
                if ($data == "") {
                  break;
                }
                $stud_name = $data;
                continue;
              }
              if ($data == "") {
                $data = 0;
              }
              array_push($marks_array, $data);
          }
          if (count($marks_array) == 0) {
            continue;
          }
          $temp_array[$stud_name] = $marks_array;
          array_push($student_array, $temp_array);
        }
      }
      $student_array = json_encode($student_array);
      $query = "INSERT INTO marks(marks, batch_id, created, type) VALUES('$student_array', $batch_id, '$current_date', 6)";
      if ($conn-> query($query)) {
        $marks_id = $conn-> insert_id;
        echo "<script>
          alert('Data Inserted Successfully!!');
          window.location.href='../frontend/Teacher/LabExitTargetValue.php?batch_id=$batch_id&marks_id=$marks_id';
          </script>";
        die();
      } else {
        echo "<script>
          alert('Some error occured, please try again!!');
          window.location.href='../frontend/Teacher/LabExitMarks.php';
          </script>";
        die();
      }
    } else {
      echo "<script>
        alert('Invalid File Format!!');
        window.location.href='../frontend/Teacher/LabExitMarks.php';
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