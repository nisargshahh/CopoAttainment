<?php
  include('../../assets/copo_config.php');
  session_start();
  if(!isset($_SESSION["uname"]))
  {
    header("Location: ../Login.php");
  }
?>

<html>
  <head>
    <title>IA Mapping</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/table5.css">
  </head>
  <body><center>
    <?php include "../../assets/header.html"; ?>
    <form class="insert-form" id="insert_form" method="POST" action="../../returning_apis/SetIAMapping.php">
      <img src="../../assets/somaiya100.png" class="logo" style = "position:absolute; left:20px; top:60px; width:100px; height:100px;"><br>
      <h1 class="text-center">Select IA Target Value</h1>
      <table id="instruction">
        <tr>
          <td>Instructions-</td>
        </tr>
        <tr>
          <td>
            <ul>
                <li>You need to select Target value.</li><br>
                <li>The target value is calculated in Percentage. Once selected, the values will remain constant.</li><br>
                <li>From the target value selected, enter Corresponding value in marks below.</li>
                <li>Levels can be determined by upper and lower ranges.</li><br>
                <li>The minimum range cannot be less than 40.</li><br>
                <li>If the selected value is greater than upper range, it will be addressed as Level 3.</li><br>
                <li>If the selected value lies between the upper range and the lower range, it will be addressed as Level 2.</li><br>
                <li>If the selected value is less than lower range, it will be addressed as Level 1.</li><br>
            </ul>
          </td>
        </tr>
      </table><br>
      <table>
        <tr>
          <th>Subject Name</th>
        </tr>
        <tr>
          <td>
            <?php
              $batch_id = $_REQUEST['batch_id'];
              echo "<input type='hidden' name='batch_id' value=$batch_id />";
              $query = "SELECT * FROM batch WHERE batch_id=$batch_id";
              $result = $conn-> query($query);
              if ($row = $result-> fetch_row()) {
                echo '<label>'.$row[1].'</label>';
              }
              $marks_id = $_REQUEST['marks_id'];
              echo "<input type='hidden' name='marks_id' id='marks_id' value=$marks_id />";
            ?>
          </td>
        </tr>
      </table><br>
      <div class="input-field">
        <table id="customers">
          <br>
          <tr>
            <th></th>
            <th>Marks</th>
          </tr>
          <tr>
            <td>Target Value:</td>
            <td><select name="target_value" class="mySelect">
                <option value=0>Select Target Value</option>
                <option value="40">40%</option>
                <option value="50">50%</option>
                <option value="60">60%</option>
                <option value="70">70%</option>
                <option value="80">80%</option>
                <option value="90">90%</option>
                <option value="100">100%</option>
              </select><br></td>
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
              <select name="ia_lower_range" class="mySelect">
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
              <select name="ia_upper_range" class="mySelect">
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
        <center><br>
          <button onClick="window.print()"><b>Print</b></button>
          <input type="submit" value="Submit">
        </center>
      </div><br>
    </form>
  </body>
</html>