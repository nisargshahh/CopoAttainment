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
  <title>IA Attainment</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/table5.css">
</head>
<body>
  <?php include('../../assets/header.html'); ?>
  <center><br>
    <img src="../../assets/somaiya100.png" class="logo" style="position:absolute; left:20px; top:60px; width:100px; height:100px;"><br>
    <h1>IA Attainment</h1>
    <?php
      $batch_id = $_POST["batch"];
      $batch_name = "";
      $query = "SELECT * FROM batch WHERE batch_id=$batch_id";
      $result = $conn-> query($query);
      while($row = $result-> fetch_array()) {
        $batch_name = $row[1];
      }
    ?>
    <div class="container">
      <div class="input-field">
      <table id="instruction">
          <tr>
            <td>Instructions-</td>
          </tr>
          <tr>
            <td>
              <ul>
                <li>Levels are displayed below.</li><br>
                <li>As per the ranges selected in the previous section, levels are displayed.</li><br>
            </td>
            </ul>
          </tr>
        </table>
        <br>

        <div class="input-field">
          <table id="customers">
            <tr>
              <th></th>
              <th>Orals</th>
            </tr>
            <?php

              $attainment = 0;
              $percentage = 0;

              $query1 = "SELECT * FROM ia_attainment WHERE batch_id=$batch_id";
              $result1 = $conn-> query($query1);
              while($row1 = $result1-> fetch_array()) {
                $attainment = $row1[2];
                $percentage = $row1[3];
              }

              echo "<tr>";
                echo "<td>Percentage</td>";
                echo "<td>$percentage%</td>";
              echo "</tr>";
              echo "<tr>";
                echo "<td>Level</td>";
                echo "<td>$attainment</td>";
              echo "</tr>";
            ?>
          </table><br><br>
        <div>
          <button onClick="window.print()">
            <b>Print</b>
          </button><br><br><br>
        </div>
      </div>
    </div>
  </center>
</body>
</html>