<?php
    include('../../assets/copo_config.php');
    session_start();
    if(!isset($_SESSION["uname"]))
    {
        header("Location: ../Login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CO Attainment Index</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="table5.css">
        <script type='text/javascript' src='../../js/jquery-min.js'></script>
    </head>
    <body>
    <?php include('../../assets/header.html'); ?><center>
    <div class="container box">
      <img src="../../assets/somaiya100.png" class="logo" style = "position:absolute; left:20px; top:60px; width:100px; height:100px;">
      <h2 align="center">Select Batch for CO Attainment Level</h2>
      <form action='./ViewCOAttainment.php' method=POST enctype=multipart/form-data id='viewCOAttainmentLevel'>
        <label><h3>Select Subject</h3></label>
        <?php
          $user_id = $_SESSION['uid'];
          $query = "SELECT * FROM batch WHERE batch_id IN (SELECT batch_id FROM test_mapping) AND created_by=$user_id";
          $result = $conn-> query($query);
          echo "<select name='batch_id' id='batch_id'>";
            echo "<option value=0>Select Subject</option>";
            while($row = $result-> fetch_array()) {
              echo "<option value=$row[0]> $row[1] </option>";
            }
          echo "</select><br><br>";
        ?>
        <input type="submit" name="Submit" class="button" value="Submit" /><br><br>
      </form>
    </div>
  </body>
  <script>
    $(document).ready(function(){
      $('#viewCOAttainmentLevel').submit(function(e){
        var batch = document.getElementById('batch_id').value;
        if (parseInt(batch) === 0) {
          alert('Please enter Subject and then try to proceed!!');
          e.preventDefault();
        }
      })
    });
  </script>
</html>