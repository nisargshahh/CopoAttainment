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
  <title>Course Exit Attainment</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/table5.css">
</head>
<body>
  <?php include('../../assets/header.html'); ?>
  <center><br>
    <img src="../../assets/somaiya100.png" class="logo" style="position:absolute; left:20px; top:60px; width:100px; height:100px;"><br>
    <h1>Lab Exit Attainment</h1>
    <?php

      $batch_id = $_POST["batch_id"];
      $batch_name = "";
      $query = "SELECT * FROM batch WHERE batch_id=$batch_id";
      $result = $conn-> query($query);
      while($row = $result-> fetch_array()) {
        $batch_name = $row[1];
      }

      $co_list = Array();

      $query1 = "SELECT * FROM co_list";
      $result1 = $conn-> query($query1);
      while($row1 = $result1-> fetch_array()) {
        array_push($co_list, $row1[1]);
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
              <?php
                for ($i=0; $i<count($co_list); $i++) {
                  echo "<th>$co_list[$i]</th>";
                }
              ?>
            </tr>
            <?php

              $attainment_array = Array();
              $query2 = "SELECT * FROM course_exit_attainment WHERE batch_id=$batch_id";
              $result2 = $conn-> query($query2);
              while($row2 = $result2-> fetch_array()) {
                $attainment_array = json_decode($row2[2], true);
              }

              echo "<tr>";
                echo "<td>Level</td>";
                for ($i=0; $i<count($co_list); $i++) {
                  echo "<td>" . (int)$attainment_array[$co_list[$i]] . "</td>";
                }
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