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
    <title>Final Practical Attainment</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/table5.css">
  </head>
  <body>
    <?php include('../../assets/header.html'); ?>
    <center><br>
      <img src="../../assets/somaiya100.png" class="logo" style="position:absolute; left:20px; top:60px; width:100px; height:100px;"><br>&nbsp<br>
      <h1>Practical With Orals Attainment</h1>

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

                  $lo_list = Array();

                  $lo_query = "SELECT * FROM lo_list";
                  $lo_result = $conn-> query($lo_query);
                  while($lo_row = $lo_result-> fetch_array()) {
                    array_push($lo_list, $lo_row[1]);
                    echo "<th>$lo_row[1]</th>";
                  }
                ?>
              </tr>
              <tr>
                <td>Lab Exit</td>
                <?php
                  $batch_id = $_REQUEST['batch_id'];

                  $lab_exit_attainment_levels = Array();

                  $query1 = "SELECT * FROM lab_exit_attainment WHERE batch_id=$batch_id";
                  $result1 = $conn-> query($query1);
                  while($row1 = $result1-> fetch_array()) {
                    $lab_exit_attainment_levels = json_decode($row1[2], true);
                  }

                  for ($i=0; $i<count($lo_list); $i++) {
                    echo "<td>".$lab_exit_attainment_levels[$lo_list[$i]]."</td>";
                  }
                ?>
              </tr>
              <tr>
                <td>Practical Continuous Assessment</td>
                <?php
                  $practical_attainment_levels = Array();

                  $query2 = "SELECT * FROM practical_attainment WHERE batch_id=$batch_id";
                  $result2 = $conn-> query($query2);
                  while($row2 = $result2-> fetch_array()) {
                    $practical_attainment_levels = json_decode($row2[2], true);
                  }

                  for ($i=0; $i<count($lo_list); $i++) {
                    echo "<td>".$practical_attainment_levels[$lo_list[$i]]."</td>";
                  }
                ?>
              </tr>
              <tr>
                <td>Orals</td>
                <?php
                  $orals_attainment_levels = 0;

                  $query3 = "SELECT * FROM orals_attainment WHERE batch_id=$batch_id";
                  $result3 = $conn-> query($query3);
                  while($row3 = $result3-> fetch_array()) {
                    $orals_attainment_levels = $row3[2];
                  }

                  for ($i=0; $i<count($lo_list); $i++) {
                    echo "<td>".$orals_attainment_levels."</td>";
                  }
                ?>
              </tr>
              <tr>
                <td>Total (in percentage)</td>
                <?php
                  for ($i=0; $i<count($lo_list); $i++) {
                    $practical_final = (80*$practical_attainment_levels[$lo_list[$i]])/100;
                    $lab_exit_final = (20*$lab_exit_attainment_levels[$lo_list[$i]])/100;
                    $orals_final = round((60*$orals_attainment_levels)/100, 1);
                    $final_practical_attainment = round($practical_final, 1) + round($lab_exit_final, 1);
                    $final_practical_attainment = (round((40*$final_practical_attainment)/100, 1)) + $orals_final;
                    if ($final_practical_attainment > 3) {
                      $final_practical_attainment = 3; 
                    }
                    echo "<td>".$final_practical_attainment."</td>";
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