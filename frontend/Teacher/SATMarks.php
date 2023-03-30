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
  <title>SAT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='../../js/jquery-min.js'></script>
  </head>
  <body><center>
    <?php include('../../assets/header.html'); ?>
    <div class="container box">
      <img src="../../assets/somaiya100.png" class="logo" style = "position:absolute; left:20px; top:60px; width:100px; height:100px;">
      <h2 align="center">Select SAT Excel file to import</h2>
      <form action='../../returning_apis/ImportSATData.php' method=POST enctype=multipart/form-data>
        <label><h3>Select SAT Type</h3></label>
        <select name='prac_type' id='prac_type' onchange="ifskill(this.value)">
          <option value=0> Select SAT Type </option>
          <option value=4> Skill Based </option>
          <option value=5> Activity Technology Based </option>
        </select>
      
        <?php
          
          echo "<input type='hidden' id='teacher_id' value=".$_SESSION['uid']." />";
          $user_id = $_SESSION['uid'];

          echo "<label><h3>Select Subject</h3></label><select name='batch' id='batch'>";
            echo "<option value=0>Select Subject</option>";
            $query = "SELECT * FROM batch WHERE created_by=$user_id";
            $result = $conn-> query($query);
            while($row = $result-> fetch_array()) {
              echo "<option value=$row[0]>$row[1]</option>";
            }
          echo "</select><br>";

          echo "<div id='newCode'></div>";
          echo "<div id='number_of_sat'></div>";

          // echo "<h3>Select if Mini Project</h3>";
          // echo "<label>Mini Project - </label>";
          // echo "<input type='checkbox' name='mini_proj' id='mini_proj' value='1' />";
        ?>
        
        <label><h3>Select Excel File</h3></label>
        <input type="file" name="excel" /><br>&nbsp<br><br>
        <input type="submit" name="import" class="button" value="Import" />
      </form>
    </div></center><br><br>
  </body>
  <script>

    function ifskill(data){
      const ajaxreq = new XMLHttpRequest();
      ajaxreq.open(POST,);

    }
    
    $(document).ready(function(){
    
      $("#prac_type").change(function() {
				var sat_type = document.getElementById('prac_type').value;
				var html = "<div id='newCode'>";
        var number_of_sat_html = "<div id='number_of_sat'>"
        if(sat_type == '4') {
          html = html + "<h3>Select if Mini Project</h3><label>Mini Project - </label> <input type='checkbox' name='mini_proj' id='mini_proj' value='1' /> <br> <div id='mini_proj_marks'></div>";
          number_of_sat_html = number_of_sat_html + "<label><h3>Select Number of SATs</h3> <select name='no_prac' id='no_prac'>";
          number_of_sat_html = number_of_sat_html + "<option value=0>Select Number of SAT Practicals</option>";
          for(var i = 1; i < 21; i++){
            number_of_sat_html = number_of_sat_html + "<option value="+i+">"+i+"</option>";
          }
          number_of_sat_html = number_of_sat_html + "</select>"
        }
				$(document.getElementById("newCode")).replaceWith(html);
				$(document.getElementById("number_of_sat")).replaceWith(number_of_sat_html);
        $('#mini_proj').change(function(){
        var mini_proj = document.getElementById('mini_proj');
        if(mini_proj.checked) {
          var html = "<h3 id='mini_proj_marks_head'>Enter Marks For Mini Project</h3><input type='number' name='mini_proj_marks' id='mini_proj_marks' placeholder='Enter Here'/>";
          $('#mini_proj_marks').replaceWith(html);
        } else {
          var html = "<div id='mini_proj_marks'></div>";
          $('#mini_proj_marks').replaceWith(html);
          $('#mini_proj_marks_head').replaceWith('');
        }
      });
			})
    })

  </script>
</html>
