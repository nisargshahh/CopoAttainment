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
    <title>LO Mapping | Practicals</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/table5.css">
  </head>
  <body><center>
    <?php include "../../assets/header.html"; ?>
    <form class="insert-form" id="insert_form" method="POST" action="../../returning_apis/SetPracticalMapping.php">
      <img src="../../assets/somaiya100.png" class="logo" style = "position:absolute; left:20px; top:60px; width:100px; height:100px;"><br>
      <h1 class="text-center">Select LO Mapped to Practical</h1>
      <table id="instruction">
        <tr>
          <td>Instructions-</td>
        </tr>
        <tr>
          <td>
            <ul>
              <li>Write Experiment name and Miniproject in the respective text box.</li><br>
              <li>Corresponding to the Experiment and Miniproject, select the LO's which are supposed to be mapped.</li><br>
              <li>Since LO-5 and LO-6 will be mapped for each experiment; hence they are selected as default.</li><br>
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
              $marks_id = $_REQUEST['marks_id'];
              $mini_proj_marks = $_REQUEST['mini_proj_marks'];

              echo "<input type='hidden' name='batch_id' value=$batch_id />";
              echo "<input type='hidden' name='marks_id' value=$marks_id />";
              echo "<input type='hidden' name='mini_proj_marks' value=$mini_proj_marks />";

              $query = "SELECT * FROM batch WHERE batch_id=$batch_id";
              $result = $conn-> query($query);
              if ($row = $result-> fetch_row()) {
                echo '<label>'.$row[1].'</label>';
              }
            ?>
          </td>
        </tr>
      </table><br>
      <div class="input-field">
        <table id="customers">
          <tr>
            <th>Experiments</th>
            <th>Experiment Name</th>
            <th>LO Mapped</th>
          </tr>
          <?php
            $no_pracs = $_REQUEST['no_pracs'];
            $mini_proj = $_REQUEST['mini_proj'];
            $prac_type = $_REQUEST['prac_type'];

            echo "<input type='hidden' name='no_pracs' value=$no_pracs />";
            echo "<input type='hidden' name='mini_proj' value=$mini_proj />";
            echo "<input type='hidden' name='prac_type' value=$prac_type />";

            $final_no_pracs = $no_pracs - 2;

            if ((int)$mini_proj == 1) {
              $final_no_pracs = $final_no_pracs - 1;
            } else {
              // code
            }

            $lo_list = Array();

            $query1 = "SELECT * FROM lo_list";
            $result1 = $conn-> query($query1);

            while($row1 = $result1-> fetch_array()) {
              array_push($lo_list, $row1[1]);
            }

            for ($i=0; $i<$final_no_pracs; $i++) {
              echo "<tr>";
                echo "<td>Experiment ".($i+1)."</td>";
                  echo '<td><input class="form-control" type="text" name="exp_name[]" required /></td>';
                  echo "<td>";
                    for ($j=0; $j<count($lo_list); $j++) {
                      if ($j == (count($lo_list)-1) || $j == (count($lo_list)-2)) {
                        echo $lo_list[$j].' - <input type="checkbox" name="los[]" value="'.$lo_list[$j].'" checked/>, ';
                      } else {
                        echo $lo_list[$j].' - <input type="checkbox" name="los[]" value="'.$lo_list[$j].'" />, ';
                      }
                    }
                  echo "</td>";
                echo "</td>";
              echo "</tr>";
            }
            if ($mini_proj == 1) {
              echo "<tr>";
                echo "<td>Mini Project</td>";
                  echo '<td><input class="form-control" type="text" name="mini_proj_name" required /></td>';
                  echo "<td>";
                  echo 'LO1 - <input type="checkbox" name="mini_los[]" value="LO1" />, ';
                  echo 'LO2 - <input type="checkbox" name="mini_los[]" value="LO2" />, ';
                  echo 'LO3 - <input type="checkbox" name="mini_los[]" value="LO3" />, ';
                  echo 'LO4 - <input type="checkbox" name="mini_los[]" value="LO4" />, ';
                  echo 'LO5 - <input type="checkbox" name="mini_los[]" value="LO5" checked />, ';
                  echo 'LO6 - <input type="checkbox" name="mini_los[]" value="LO6" checked />, ';
                  echo "</td>";
                echo "</td>";
              echo "</tr>";
            }
          ?>
        </table><br>
        <table id="customers"><br>
          <?php
            echo "<tr>";
            echo "<th></th>";
            for ($i=0; $i<count($lo_list); $i++) {
              echo "<th>LO".strval($i+1)."</th>";
            }
            echo "</tr>";
            echo "<tr>";
              echo "<td>Target Value in Percentage:</td>";
              for ($i=0; $i<count($lo_list); $i++) {
                echo "<td>";
                  echo "<select name='target_value[]' id='target_value'>";
                    echo "<option value=0>Select Percentage</option>";
                    for ($j=40; $j<=100; $j+=10){
                        echo "<option value=$j>$j%</option>";
                    }
                  echo "</select>";
                echo "</td>";
              }
            echo "</tr>";
          ?>
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
              <select name="practical_lower_range" class="mySelect">
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
              <select name="practical_upper_range" class="mySelect">
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