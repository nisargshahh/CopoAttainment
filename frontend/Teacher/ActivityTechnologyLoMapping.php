<?php
  include('../../assets/copo_config.php');
  session_start();
  if(!isset($_SESSION["uname"]))
  {
    header("Location: ./Login.php");
  }
?>

<html>
  <head>
    <title>SO Mapping | SAT Practicals(Activity/Technology)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/table5.css">
  </head>
  <body>
    <?php include('../../assets/header.html'); ?>
    <center>
      <form class="insert-form" id="insert_form" method="POST" action="../../returning_apis/SetSATActivityMapping.php">
        <img src="../../assets/somaiya100.png" class="logo" style = "position:absolute; left:20px; top:60px; width:100px; height:100px;"><br>&nbsp<br>&nbsp
        <br><h1 class="text-center">Enter Acitivty Name for SAT and Select AO/TO</h1>
        <div class="input-field">
          <table id="customers">
            <tr>
              <th>Activity</th>
              <th>Activity Name</th>
              <th>LO Mapped</th>
            </tr>
            <tr>
              <td>Activity for SAT</td>
              <td><input class="form-control" type="text" name="activity_name" value=""required=""></td>
              <td>
              AO1/TO1 - <input type="checkbox" name="aotos[]" value="AO1/TO1">, 
              AO2/TO2 - <input type="checkbox" name="aotos[]" value="AO2/TO2">, 
              AO3/TO3 - <input type="checkbox" name="aotos[]" value="AO3/TO3">, 
              AO4/TO4 - <input type="checkbox" name="aotos[]" value="AO4/TO4">, 
              AO5/TO5 - <input type="checkbox" name="aotos[]" value="AO5/TO5">, 
              AO6/TO6 - <input type="checkbox" name="aotos[]" value="AO6/TO6">, 
              </td>
            </tr>
          </table><br>
          <table id="customers"><br>
            <tr>
              <th></th>
              <th>Acitivty</th>
            </tr>
            <tr><td>Target Value:</td>
              <td>
                <select name="activity_target_value" class="mySelect">
                  <option value="40">40</option>
                  <option value="50">50</option>
                  <option value="60">60</option>
                  <option value="70">70</option>
                  <option value="80">80</option>
                  <option value="90">90</option>
                  <option value="100">100</option>
                </select><br>
              </td>
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
                    <option value="40">40</option>
                    <option value="50">50</option>
                    <option value="60">60</option>
                    <option value="70">70</option>
                    <option value="80">80</option>
                    <option value="90">90</option>
                    <option value="100">100</option>
                  </select>
                </td>
                <td>
                  <select name="upper_range" class="mySelect">
                    <option value="50">50</option>
                    <option value="60">60</option>
                    <option value="70">70</option>
                    <option value="80">80</option>
                    <option value="90">90</option>
                    <option value="100">100</option>
                  </select><br>
                </td>
          </table><br>
          <center><br>
            <button onClick="window.print()"><b>Print</b></button>
            <input type="submit" value="Submit">
          </center>
        </div><br>
        <?php
            $batch_id = $_REQUEST['batch_id'];
            $prac_type = $_GET['prac_type'];
            $marks_id = $_REQUEST['marks_id'];
            echo "<input type='hidden' name='batch_id' value=$batch_id />";
            echo "<input type='hidden' name='prac_type' value=$prac_type />";
            echo "<input type='hidden' name='marks_id' value=$marks_id />";
        ?>
      </form>
    </center>
  </body>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
</html>