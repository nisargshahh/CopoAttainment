<?php
  include('../../assets/copo_config.php');

  session_start();
  if(!isset($_SESSION["uname"]))
  {
    header("Location: ../Login.php");
  }

  $test_id = $_REQUEST['test_val'];
  $batch_id = $_REQUEST['batch'];
  $pattern_id = $_REQUEST['patterns'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Target Value | Test 1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/table5.css">
    <script src='../../js/jquery-min.js'></script>
  </head>
  <body><center>
    <?php include('../../assets/header.html'); ?>
    <form action='../../returning_apis/SetTargetValue.php' method= POST form class="insert-form" id="insert_form" method="POST" action="tv.php">
      <div class="container">
        <img src="../../assets/somaiya100.png" class="logo" style = "position:absolute; left:20px; top:60px; width:100px; height:100px;"><br>
        <h1 class="text-center">SELECT C0, BT Level & Target Value</h1>
        <div class="input-field">
          <table id="instruction">
            <tr>
              <td>Instructions-</td>
            </tr>
            <tr>
              <td>
                <ul>
                  <li>You need to select CO, BT level and Target value for each question.</li><br>
                  <li>The target value is calculated in Percentage. Once selected, the values will remain constant.</li><br>
                  <li>Each question may or may not have the same CO's.</li><br>
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
              <th>
                Subject Name
              </th>
              <th>
                Test Name
              </th>
            </tr>
            <tr>
              <td>
                <?php
                  $user_id = $_SESSION['uid'];

                  echo "<input type='hidden' name='user_id' id='user_id' value=$user_id />";

                  $marks_id = 0;

                  $query = "SELECT marks_id FROM marks WHERE batch_id=$batch_id AND pattern_id=$pattern_id";
                  $result = $conn-> query($query);
                  while($row = $result-> fetch_array()) {
                    $marks_id = $row[0];
                  }

                  $query2 = "SELECT batch_name FROM batch WHERE batch_id=$batch_id";
                  $result2 = $conn-> query($query2);
                  if($row2 = $result2-> fetch_array())
                  {
                    echo $row2[0];
                  }
                  echo "<input type='hidden' name='batch_id' id='batch_id' value=$batch_id />";
                ?>
              </td>
              <td>
                <?php
                  $query3 = "SELECT test_name FROM test WHERE test_id=$test_id";
                  $result3 = $conn-> query($query3);
                  if($row3 = $result3-> fetch_array()) {
                    echo $row3[0];
                    echo "<input type='hidden' name='test_id' id='test_id' value=$test_id />";
                  }
                ?>
              </td>
            </tr>
          </table><br>
          <table id="customers">
            <tr>
              <?php
                $no_main_quests = 0;
                $sub_quests_array = array();

                $query4 = "SELECT * FROM pattern WHERE pattern_id=$pattern_id";
                $result4 = $conn-> query($query4);
                if($row4 = $result4-> fetch_array()) {
                  $sub_quests_array = $row4[5];
                  echo "<input type='hidden' name='pattern_id' id='pattern_id' value=$pattern_id />";
                }

                $co_array = array();
                $query6 = "SELECT * FROM co_list";
                $result6 = $conn-> query($query6);
                while($row6 = $result6-> fetch_array()){
                  array_push($co_array, $row6[1]);
                }

                $query7 = "SELECT * FROM test_mapping WHERE marks_id=$marks_id";
                $result7 = $conn-> query($query7);
                while($row7 = $result7-> fetch_array()) {

                }

                $sub_quests_array = json_decode($sub_quests_array, true);
                $number_quests = 0;
                for($i=0; $i<count($sub_quests_array); $i++) {
                  if ($sub_quests_array[$i] == 0) {
                    echo "<td>";
                      echo "<label>Q".strval($i+1)." CO : </label>";
                      echo "<select name='co_name[]' id='co_name'>";
                        echo "<option value=0>Select CO</option>";
                        for ($k=0; $k<count($co_array); $k++) {
                          echo "<option value=$co_id_array[$k]>$co_array[$k]</option>";
                        }
                      echo "</select>";
                    echo "</td>";
                  } else {
                    for ($j=0; $j<$sub_quests_array[$i]; $j++) {
                      echo "<td>";
                        echo "<label>Q".strval($i+1)." - ".($j+1)." CO : </label>";
                        echo "<select name='co_name[]' id='co_name'>";
                          echo "<option value=0>Select CO</option>";
                          for ($k=0; $k<count($co_array); $k++) {
                            echo "<option value=$co_id_array[$k]>$co_array[$k]</option>";
                          }
                        echo "</select>";
                      echo "</td>";
                    }
                  }
                }
              ?>
            </tr>
          </table><br>
          <table id="customers">
            <tr>
              <?php
                $query5 = "SELECT * FROM bt";
                $result5 = $conn-> query($query5);
                while($row5 = $result5-> fetch_array()) {
                  array_push($bt_array, $row5[1]);
                  array_push($bt_id_array, $row5[0]);
                }

                for($i=0; $i<count($sub_quests_array); $i++) {
                  if ($sub_quests_array[$i] == 0) {
                    echo "<td>";
                      echo "<label>Q".strval($i+1)." BT level : </label>";
                      echo "<select name=bt_levels[]>";
                        echo "<option value=0>Select BT Level</option>";
                        for ($j=0; $j<count($bt_array); $j++) {
                          echo "<option value=$bt_id_array[$j]>$bt_array[$j]</option>";
                        }
                      echo "</select>";
                    echo "</td>";
                  } else {
                    for ($j=0; $j<$sub_quests_array[$i]; $j++) {
                      echo "<td>";
                        echo "<label>Q".strval($i+1)." - ".($j+1)." BT level : </label>";
                        echo "<select name=bt_levels[]>";
                          echo "<option value=0>Select BT Level</option>";
                          for ($k=0; $k<count($bt_array); $k++) {
                            echo "<option value=$bt_id_array[$k]>$bt_array[$k]</option>";
                          }
                        echo "</select>";
                      echo "</td>";
                    }
                  }
                }
              ?>
            </tr>
          </table><br>
        </div>
        <div class="input-field">
          <table id="customers">
            <tr>
              <th></th>
              <th>Lower range</th>
              <th>Upper range</th>
            </tr>
            <?php
              for($i=0; $i<count($sub_quests_array); $i++) {
                if ($sub_quests_array[$i] == 0) {
                  echo "<tr>";
                    echo "<td>Range for Q".strval($i+1).":</td>";
                    echo "<td>";
                      echo '<select name="quests_min_levels[]" class="mySelect">';
                        echo '<option value=0>Select lower range</option>';
                        for ($j=40; $j<=100; $j+=10) {
                          echo '<option value='.$j.'>'.$j.'%</option>';
                        }
                      echo '</select>';
                    echo '</td>';
                    echo "<td>";
                      echo '<select name="quests_max_levels[]" class="mySelect">';
                        echo '<option value=0>Select upper range</option>';
                        for ($j=50; $j<=100; $j+=10) {
                          echo '<option value='.$j.'>'.$j.'%</option>';
                        }
                      echo '</select>';
                    echo '</td>';
                  echo "</tr>";
                } else {
                  for ($k=0; $k<((int)$sub_quests_array[$i]); $k++) {
                    echo "<tr>";
                      echo "<td>Range for Q".strval($i+1)." - ".($k+1).":</td>";
                      echo "<td>";
                        echo '<select name="quests_min_levels[]" class="mySelect">';
                          echo '<option value=0>Select lower range</option>';
                          for ($j=40; $j<=100; $j+=10) {
                            echo '<option value='.$j.'>'.$j.'%</option>';
                          }
                        echo '</select>';
                      echo '</td>';
                      echo "<td>";
                        echo '<select name="quests_max_levels[]" class="mySelect">';
                          echo '<option value=0>Select upper range</option>';
                          for ($j=50; $j<=100; $j+=10) {
                            echo '<option value='.$j.'>'.$j.'%</option>';
                          }
                        echo '</select>';
                      echo '</td>';
                    echo "</tr>";
                  }
                }
              }
            ?>
          </table><br>
        </div>
      </div>
      <div class="container">
        <input type='hidden' name='co_array[]' value=0 id='co_array' />
        <div>
          <input type="submit" value="Submit">
          <button onClick="window.print()"><b>Print</b></button>
          <!-- <a href="TargetValueRangeSelection.php" class="link-btn">Next</a> -->
        </div>
      </div>
    </form><br>&nbsp
  </body>
</html>
