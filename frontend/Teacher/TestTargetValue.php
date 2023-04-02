<?php
  include('../../assets/copo_config.php');
  session_start();
  if (!isset($_SESSION["uname"]))
  {
    header("Location: ../Login.php");
  }
?>
<html>
  <head>
    <title>Marks | Test 1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='../../js/jquery-min.js'></script>
  </head>
  <body>
    <?php include('../../assets/header.html') ?><center>
      <div class="container box">
        <img src="../../assets/somaiya100.png" class="logo" style = "position:absolute; left:20px; top:60px; width:100px; height:100px;">
        <?php

          echo "<form action='./ViewTestTargetValue.php' method=POST enctype=multipart/form-data>";
          echo "<label><h3>Select Test </h3></label>";
          $query2 = "SELECT * FROM test";
          $result2 = $conn-> query($query2);
          echo "<select name='test_val' id='test_val'>";
            echo "<option value=0>Select Test</option>";
            while($row2 = $result2-> fetch_array()) {
              echo "<option value=$row2[0]> $row2[1] </option>";
            }
          echo "</select>";

          echo "<label><h3>Select Paper Pattern </h3></label>";

          $query1 = "SELECT * FROM pattern WHERE test_id=(SELECT test_id FROM test WHERE test_name='Test 1')";
          $result1 = $conn-> query($query1);
          echo "<select name='patterns' id='patterns' disabled>";
            echo "<option value=0>Select Pattern</option>";
            while($row1 = $result1-> fetch_array()) {
              echo "<option value=$row1[0]> $row1[4] </option>";
            }
          echo "</select>";

          echo "<label><h3>Select Subject (e.g 2020-2021)</h3></label><select name=batch>";
          $user_id = $_SESSION['uid'];
          $query = "SELECT * FROM batch WHERE batch_id IN (SELECT batch_id FROM marks) AND created_by=$user_id";
          $result = $conn-> query($query);
          echo "<option value=0>Select Subject</option>";
          while($row = $result-> fetch_array()) {
            echo "<option value=".$row[0].">".$row[1]."</option>";
          }
          echo "</select>";
      ?>
        <br><br><input type="submit" name="import" class="button" value="View" />
      </form>
    </div>
  </body>
  <script>
    $(document).ready(function(){
      $("#test_val").change(function(){
        var test_val = document.getElementById("test_val").value;
        var url = document.URL;
        url = url.replace("/frontend/Teacher/TestMarks", "/returning_apis/GetPatterns");
        if(!(test_val === "0")) {
          $.ajax({
            url: url,
            method: "POST",
            data: {"test_id": test_val},
            success: function(data, status) {
              var final_data = jQuery.parseJSON(data);
              var html = "<select name='patterns' id='patterns'><option value=0>Select Pattern</option>";
              $(final_data).each(function(index, value){
                html = html + "<option value="+value.pattern_id+">"+value.pattern_name+"</option>";
              });
              html = html + "</select>";
              $(document.getElementById('patterns')).replaceWith(html);
            },
            error: function(error) {
              // code
            }
          })
        }
      })
    })
  </script>
</html>
