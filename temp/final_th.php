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
  <title>Closure of the Quality Loop for Theory</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/table5.css">
</head>

<body>
  <?php include('../../assets/header.html'); ?>
  <center><br>
    <img src="../../assets/somaiya100.png" class="logo" style="position:absolute; left:20px; top:60px; width:100px; height:100px;">
    <h1>Closure of the Quality Loop for Theory</h1><br>
    <?php
      $user_id = $_SESSION['uid'];
      if (isset($_POST["batch"])) {
        $u = $_POST["batch"];
        echo "<h2>$u</h2>"
    ?>
    <div class="container">
      <form class="insert-form" id="insert_form" method="POST" action="final_th.php">
        <div class="input-field">
          <form action='final_th.php' method=POST>

            <table id="customers">
              <tr>
              <tr>
                <th></th>
                <th>CO1</th>
                <th>CO2</th>
                <th>CO3</th>
                <th>CO4</th>
                <th>CO5</th>
                <th>CO6</th>
              </tr>
              </tr>
              <?php

              $select = "SELECT * FROM th_closure where uname='" . $_SESSION["uname"] . "' and batch='$u'";
              $result = mysqli_query($conn, $select);
              while ($row = mysqli_fetch_assoc($result)) {

                echo "<tr>";
                echo "<tr><td>Gap</td>";
                echo "<td>" . $row['gco1'] . "</td>";
                echo "<td>" . $row['gco2'] . "</td>";
                echo "<td>" . $row['gco3'] . "</td>";
                echo "<td>" . $row['gco4'] . "</td>";
                echo "<td>" . $row['gco5'] . "</td>";
                echo "<td>" . $row['gco6'] . "</td></tr>";
                echo "<tr><td>Action proposed to bridge the gap</td>";
                echo "<td>" . $row['acco1'] . "</td>";
                echo "<td>" . $row['acco2'] . "</td>";
                echo "<td>" . $row['acco3'] . "</td>";
                echo "<td>" . $row['acco4'] . "</td>";
                echo "<td>" . $row['acco5'] . "</td>";
                echo "<td>" . $row['acco6'] . "</td></tr>";
                echo "<tr><td>Modify of target where achieved gap</td>";
                echo "<td>" . $row['mco1'] . "</td>";
                echo "<td>" . $row['mco2'] . "</td>";
                echo "<td>" . $row['mco3'] . "</td>";
                echo "<td>" . $row['mco4'] . "</td>";
                echo "<td>" . $row['mco5'] . "</td>";
                echo "<td>" . $row['mco6'] . "</td></tr>";
                echo "</tr>";
              }  ?>
            </table>
            <br>

            <button onClick="window.print()"><b>Print</b></button>
        </div>
      </form>
    </div>
    <?php
      } else {
        $query = "SELECT * FROM batch WHERE created_by=$user_id";
        $result = $conn-> query($query);
        echo "<center><div class=box><div style=border:solid 5px rgb(0, 0, 0); padding:10px; margin-left: auto;margin-right: auto;><form action='final_th.php' method=POST><BR><h2>Select Batch</h2><BR><select name=batch>";
        echo "<option value=0>Select Batch</option>";

        while ($row = $result-> fetch_array()) {
          echo "<option value=" . $row[1] . ">" . $row[0];
        }
        echo "</select><BR>";
        echo "<BR><input type=submit class='button'><BR>&nbsp</form></div></div> </center>";
      }
    ?>
  </center>
</body>

</html>