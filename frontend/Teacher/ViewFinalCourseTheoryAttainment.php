<?php
  include('../../assets/copo_config.php');
  session_start();
  if (!isset($_SESSION["uname"])) {
    header("Location: ../Login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Final CO Attainment</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/table5.css">
  </head>
  <body>
    <?php include('../../assets/header.html'); ?>
    <center><br>
      <img src="../../assets/somaiya100.png" class="logo" style="position:absolute; left:20px; top:60px; width:100px; height:100px;"><br>&nbsp<br>
      <h1>Final CO Attainment</h1>

      <table id="instruction">
        <tr>
          <td>Instructions-</td>
        </tr>
        <tr>
          <td>
            <ul>
              <li>Please Print this file for your reference to prevent any further problems</li><br>
          </td>
          </ul>
        </tr>
      </table><br>
      <div class="container">
        <form class="insert-form" id="insert_form" method="POST" action="ViewPracticalWithOralAttainment.php">
          <div class="input-field">
            <table id="customers">
              <tr>
                <th></th>
                <?php

                  $co_list = Array();

                  $co_query = "SELECT * FROM co_list";
                  $co_result = $conn-> query($co_query);
                  while($co_row = $co_result-> fetch_array()) {
                    array_push($co_list, $co_row[1]);
                    echo "<th>$co_row[1]</th>";
                  }
                ?>
              </tr>
              <tr>
                <td>Test 1</td>
                <?php
                  $batch_id = $_REQUEST['batch'];

                  $test1_attainment_levels = Array();

                  $query1 = "SELECT * FROM co_attainment WHERE batch_id=$batch_id AND test_id=1";
                  $result1 = $conn-> query($query1);
                  while($row1 = $result1-> fetch_array()) {
                    $test1_attainment_levels = json_decode($row1[3], true);
                  }

                  for ($i=0; $i<count($co_list); $i++) {
                    echo "<td>".$test1_attainment_levels[$i]."</td>";
                  }
                ?>
              </tr>
              <tr>
                <td>Test 2</td>
                <?php

                  $test2_attainment_levels = Array();

                  $query2 = "SELECT * FROM co_attainment WHERE batch_id=$batch_id AND test_id=2";
                  $result2 = $conn-> query($query2);
                  while($row2 = $result2-> fetch_array()) {
                    $test2_attainment_levels = json_decode($row2[3], true);
                  }

                  for ($i=0; $i<count($co_list); $i++) {
                    echo "<td>".$test2_attainment_levels[$i]."</td>";
                  }
                ?>
              </tr>
              <tr>
                <td>Course Exit</td>
                <?php
                  $course_exit_attainment = 0;

                  $query3 = "SELECT * FROM course_exit_attainment WHERE batch_id=$batch_id";
                  $result3 = $conn-> query($query3);
                  while($row3 = $result3-> fetch_array()) {
                    $course_exit_attainment = json_decode($row3[1], true);
                  }

                  for ($i=0; $i<count($co_list); $i++) {
                    echo "<td>".$course_exit_attainment[$co_list[$i]]."</td>";
                  }
                ?>
              </tr>
              <tr>
                <td>Internal Assessment</td>
                <?php

                  $IA_attainment_levels = Array();

                  $query4 = "SELECT * FROM ia_attainment WHERE batch_id=$batch_id";
                  $result4 = $conn-> query($query4);
                  while($row4 = $result4-> fetch_array()) {
                    $IA_attainment_levels = $row4[2];
                  }

                  for ($i=0; $i<count($co_list); $i++) {
                    echo "<td>".$IA_attainment_levels."</td>";
                  }
                ?>
              </tr>
            </table><br><br>
            <table id="customers">
              <tr>
                <th></th>
                <?php
                  for ($i=0;$i<count($co_list);$i++) {
                    echo "<th>$co_list[$i]</th>";
                  }
                ?>
              </tr>
              <tr>
                <td>End Sem Exam</td>
                <?php

                  $end_sem_attainment_levels = Array();

                  $query5 = "SELECT * FROM co_attainment WHERE batch_id=$batch_id AND test_id=5";
                  $result5 = $conn-> query($query5);
                  while($row5 = $result5-> fetch_array()) {
                    $end_sem_attainment_levels = json_decode($row5[3], true);
                  }

                  for ($i=0; $i<count($co_list); $i++) {
                    echo "<td>".$end_sem_attainment_levels[$i]."</td>";
                  }
                ?>
              </tr>
            </table><br><Br>
            <table id="customers">
              <tr>
                <th></th>
                <?php
                  for ($i=0;$i<count($co_list);$i++) {
                    echo "<th>$co_list[$i]</th>";
                  }
                ?>
              </tr>
              <tr>
                <td>Total</td>
                <?php
                  for ($i=0; $i<count($co_list); $i++) {
                    $test1_final = (0.096*$test1_attainment_levels[$i]);
                    $test2_final = (0.096*$test2_attainment_levels[$i])/100;
                    $internal_assessment_final = (0.128*$IA_attainment_levels);
                    $test_final = round($test1_final, 1) + round($test2_final, 1) + round($internal_assessment_final, 1);
                    $internal_final = round($test_final*0.32, 1) + round($course_exit_attainment[$co_list[$i]]*0.08, 1);
                    $end_sem_exam_final = round($end_sem_attainment_levels[$i]*0.6, 1);
                    $internal_final = round($internal_final*0.4, 1);
                    $final = $internal_final + $end_sem_exam_final;

                    echo "<td>".$final."</td>";
                  }
                ?>
              </tr>
            </table><br>
            <div>
              <button onClick="window.print()"><b>Print</b></button>
              <!-- <a href="closure1.php" class="link-btn">Next</a><br><br><br><br>&nbsp -->
            </div>
          </div>
        </form><br>&nbsp
      </div>
    </center>
  </body>
</html>