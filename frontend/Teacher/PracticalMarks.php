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
      <form action='../../returning_apis/ImportPracticalData.php' method=POST enctype=multipart/form-data>
        <label><h3>Select Practical Type</h3></label>
        <select name='prac_type' id='prac_type'>
          <option value=0> Select Practical Type </option>
          <option value=1> With Orals </option>
          <option value=2> Without Orals </option>
        </select>
        <?php

          echo "<input type='hidden' id='teacher_id' value=".$_SESSION['uid']." />";
          $user_id = $_SESSION['uid'];

          echo "<label><h3>Select batch</h3></label><select name='batch' id='batch'>";
            echo "<option value=0>Select Subject</option>";

            $query = "SELECT * FROM batch WHERE created_by=$user_id";
            $result = $conn-> query($query);
            while($row = $result-> fetch_array()) {
              $query1 = "SELECT * FROM practical_mapping WHERE batch_id=$row[0]";
              $result1 = $conn-> query($query1);
              if ($result1-> fetch_array()) {
                continue;
              }
              echo "<option value=$row[0]>$row[1]</option>";
            }
          echo "</select><br>";

          echo "<label><h3>Select Number of Practicals</h3></label><select name='no_prac' id='no_prac'>";
            echo "<option value=0>Select Number of Practicals</option>";
            for ($i=1; $i<=20; $i++) {
              echo "<option value=$i>$i</option>";
            }
          echo "</select><br><br>";

          echo "<h3>Select if Mini Project</h3>";
          echo "<label>Mini Project - </label>";
          echo "<input type='checkbox' name='mini_proj' id='mini_proj' value='1' />";
        ?>
        <div id='mini_proj_marks'></div>
        <label><h3>Select Excel File</h3></label>
        <input type="file" name="excel" /><br>&nbsp<br><br>
        <input type="submit" name="import" class="button" value="Import" />
      </form>
    </div></center><br><br>
  </body>
  <script>
    $(document).ready(function(){
      $('#mini_proj').change(function(){
        var mini_proj = document.getElementById('mini_proj');
        if(mini_proj.checked) {
          var html = "<h3 id='mini_proj_marks_head'>Enter Marks For Mini Project</h3><input type='number' name='mini_proj_marks' id='mini_proj_marks' placeholder='Enter Here' />";
          $('#mini_proj_marks').replaceWith(html);
        } else {
          var html = "<div id='mini_proj_marks'></div>";
          $('#mini_proj_marks').replaceWith(html);
          $('#mini_proj_marks_head').replaceWith('');
        }
      });
    })
  </script>
</html>
