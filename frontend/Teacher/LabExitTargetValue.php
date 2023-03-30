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

  <title>Lab Exit | Target Value</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/table5.css">
</head>

<body>
  <?php include('../../assets/header.html'); ?>
  <center>
    <form action='../../returning_apis/SetLabExitTargetValue.php' method=POST form class="insert-form" id="insert_form" method="POST">
      <div class="container">
        <img src="../../assets/somaiya100.png" class="logo" style="position:absolute; left:20px; top:60px; width:100px; height:100px;">
        <br>
        <h1 class="text-center">Set Target Value</h1>
        <table id="instruction">
          <tr>
            <td>Instructions-</td>
          </tr>
          <tr>
            <td>
              <ul>
                <li>You need to select Target value for corresponding LO.</li><br>
                <li>The target value is calculated in Percentage. Once selected, the values will remain constant.</li><br>
            </td>
            </ul>
          </tr>
        </table>
        <br>
        <table>
          <tr>
            <th>Select Subject</th>
          </tr>
          <tr>
            <td>
              <?php
                $batch_id = $_REQUEST['batch_id'];
                $marks_id = $_REQUEST['marks_id'];
                echo "<input type='hidden' name='batch_id' value=$batch_id />";
                echo "<input type='hidden' name='marks_id' value=$marks_id />";
                $sql = "SELECT * FROM batch WHERE batch_id=$batch_id";
                $result = mysqli_query($conn, $sql);
                while($row = $result-> fetch_array()) {
                  echo "<label>$row[1]</label>";
                }
              ?>
            </td>
          </tr>
        </table><br>
        <div class="input-field">
          <table id="customers">
            <br>
            <tr>
              <th></th>
              <?php
                $lo_list = Array();
                $query1 = "SELECT * FROM lo_list";
                $result1 = $conn-> query($query1);
                while($row1 = $result1-> fetch_array()) {
                  echo "<th>$row1[1]</th>";
                  array_push($lo_list, $row1[1]);
                }
              ?>
            </tr>
            <tr>
              <td>Target Value:</td>
              <?php
                for ($i=0; $i<count($lo_list); $i++) {
                  echo "<td>";
                    echo "<select name='target_value[]' class='mySelect'>";
                      echo "<option value=0>Select Target Value</option>";
                      for ($j=40; $j<=100; $j=$j+10) {
                        echo"<option value=$j>$j</option>";
                      }
                    echo "</select><br>";
                  echo "</td>";
                }
              ?>
            </tr>
          </table><br>
          <table id="customers">
            <tr>
              <th></th>
              <th>Lower range</th>
              <th>Upper range</th>
            </tr>
            <tr>
              <td>Range for Attainment Level:</td>
              <td>
                <select name="lower_range" class="mySelect">
                  <option value=0>Select Percentage</option>
                  <option value="40">40</option>
                  <option value="50">50</option>
                  <option value="60">60</option>
                  <option value="70">70</option>
                  <option value="80">80</option>
                  <option value="90">90</option>
                  <option value="100">100</option>
                </select><br>
              </td>
              <td>
                <select name="upper_range" class="mySelect">
                  <option value=0>Select Percentage</option>
                  <option value="50">50</option>
                  <option value="60">60</option>
                  <option value="70">70</option>
                  <option value="80">80</option>
                  <option value="90">90</option>
                  <option value="100">100</option>
                </select>
              </td>
            </tr>
          </table><br>
          <div><button onClick="window.print()"><b>Print</b></button>
            <input type="submit" value="Submit">
            <!-- <a href="exitcal.php" class="link-btn">Next</a> -->
          </div><br>
        </div>
      </div>
    </form>
  </center>
</body>
</html>