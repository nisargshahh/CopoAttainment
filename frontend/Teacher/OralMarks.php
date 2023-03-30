<?php
  include('../../assets/copo_config.php');
  include("../../assets/PHPExcel-1.8/Classes/PHPExcel/IOFactory.php");
  session_start();
  if (!isset($_SESSION["uname"]))
  {
    header("Location: ../Login.php");
  }
?>
<html>
  <head>
  <title>Practical</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='../../js/jquery-min.js'></script>
  </head>
  <body><center>
    <?php include('../../assets/header.html'); ?>
    <div class="container box">
      <img src="../../assets/somaiya100.png" class="logo" style = "position:absolute; left:20px; top:60px; width:100px; height:100px;">
      <h2 align="center">Select Practical Excel file to import</h2>
      <form action='../../returning_apis/ImportOralMarks.php' method=POST enctype=multipart/form-data>
        <?php

          echo "<input type='hidden' id='teacher_id' value=".$_SESSION['uid']." />";
          $user_id = $_SESSION['uid'];

          echo "<label><h3>Select Subject</h3></label><select name='batch' id='batch'>";
            echo "<option value=0>Select Subject</option>";
            $query = "SELECT * FROM batch WHERE created_by=$user_id AND batch_id IN (SELECT batch_id FROM practical_mapping WHERE type=1)";
            $result = $conn-> query($query);
            while($row = $result-> fetch_array()) {
              echo "<option value=$row[0]>$row[1]</option>";
            }
          echo "</select><br>";
        ?>
        <label><h3>Select Excel File</h3></label>
        <input type="file" name="excel" /><br>&nbsp<br><br>
        <input type="submit" name="import" class="button" value="Import" />
      </form>
    </div></center><br><br>
  </body>
</html>
