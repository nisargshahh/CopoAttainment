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
    <title>SAT Activity Based Attainment</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/table5.css">
    <script type='text/javascript' src='../../js/jquery-min.js'></script>
  </head>

  <body>
    <?php include('../../assets/header.html') ?>
    <center><br>
      <img src="../../assets/somaiya100.png" class="logo" style="position:absolute; left:20px; top:60px; width:100px; height:100px;"><br>&nbsp<br>
      <h1>SAT Attainment (For Activity Based Learning)</h1>
      <table id="instruction">
        <tr>
          <td>Instructions-</td>
        </tr>
        <tr>
          <td>
            <ul>
              <li>Please Print this file for your reference to prevent any further problems</li><br>
            </ul>
          </td>
        </tr>
      </table>
      <?php
        $user_id = $_SESSION['uid'];
      ?>
      <div class="container">
        <center>
          <div class=box>
            <div style=border:solid 5px rgb(0, 0, 0); padding:10px; margin-left: auto;margin-right: auto;>
              <form action='./ViewSATActivityBasedAttainment.php' method=POST id='viewSATActivityBasedAttainment'><BR>
                <h2>Select Subject</h2><br>
                <select name='batch_id' id='batch_id'></BR>
                  <?php
                    $query = "SELECT * FROM batch WHERE batch_id IN (SELECT batch_id FROM sat_mapping WHERE type=5) AND created_by=$user_id";
                    $result = $conn-> query($query);
                    echo "<option value=0>Select Subject</option>"; 
                    while ($row = $result-> fetch_array()) {
                      echo "<option value=" . $row[0] . ">" . $row[1] . "</option>";
                    }
                  ?><br>&nbsp
                </select><BR>
                <BR><input type=submit class='button'><BR>&nbsp
              </form>
            </div>
          </div><br>
        </center>
      </div>
    </center>
  </body>
  <script type='text/javascript'>
    $(document).ready(function(){
      $('#viewSATActivityBasedAttainment').submit(function(e){
        var batch = document.getElementById('batch_id').value;
        if (parseInt(batch) === 0) {
          alert('Please enter Subject and then try to proceed!!');
          e.preventDefault();
        }
      })
    })
  </script>
</html>