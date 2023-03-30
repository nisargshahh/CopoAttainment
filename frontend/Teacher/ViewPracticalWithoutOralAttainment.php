<?php
  include('../../assets/copo_config.php');
  session_start();
  if (!isset($_SESSION["uname"])) {
    header("Location: ../Login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<html>

<head>
  <title>Practical Attainment</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/table5.css">
</head>
<body>
  <?php include('../../assets/header.html'); ?>
  <center><br>
    <img src="../../assets/somaiya100.png" class="logo" style="position:absolute; left:20px; top:60px; width:100px; height:100px;"><br>
    <h1>Practical Attainment</h1>
    <div class="container">
      <form class="insert-form" id="insert_form" method="POST" action="ViewPracticalWithoutOralAttainment.php">
        <div class="input-field">
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
          </table><br>&nbsp
          <table>
            <tr>
              <th>
                Subject Name
              </th>
            </tr>
            <tr>
              <td>
                <?php
                  $batch_id = $_REQUEST['batch_id'];

                  $query1 = "SELECT batch_name FROM batch WHERE batch_id=$batch_id";
                  $result1 = $conn-> query($query1);
                  if($row1 = $result1-> fetch_array())
                  {
                    echo $row1[0];
                  }
                ?>
              </td>
            </tr>
          </table><br><br>
          <table id="customers">
            <tr>
              <th></th>
              <?php
                $lo_list = Array();
                $query = "SELECT * FROM lo_list";
                $result = $conn-> query($query);
                while($row = $result-> fetch_array()) {
                  echo "<th>$row[1]</th>";
                  array_push($lo_list, $row[1]);
                }
              ?>
            </tr>
            <tr>
              <td>Lab Exit</td>
              <?php
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
              <td>Total (in percentage)</td>
              <?php
                for ($i=0; $i<count($lo_list); $i++) {
                  $practical_final = (80*$practical_attainment_levels[$lo_list[$i]])/100;
                  $lab_exit_final = (20*$lab_exit_attainment_levels[$lo_list[$i]])/100;
                  $final_attainment = round($practical_final, 1) + round($lab_exit_final, 1);
                  echo "<td>".$final_attainment."</td>";
                }
              ?>
            </tr>
          </table><br>
          <div>
            <button onClick="window.print()"><b>Print</b></button>
          </div>
      </form><br>&nbsp
    </div>
  </center>
</body>
</html>