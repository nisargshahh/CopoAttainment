<?php
  include('../../assets/copo_config.php');
  session_start();
  if (!isset($_SESSION["uname"])) {
    header("Location: ../Login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<html>

<head>
  <title>Final Practical Attainment</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/table5.css">
  <script type='text/javascript' src='../../js/jquery-min.js'></script>
</head>
<body>
  <?php include('../../assets/header.html'); ?>
  <center><br>
    <img src="../../assets/somaiya100.png" class="logo" style="position:absolute; left:20px; top:60px; width:100px; height:100px;"><br>&nbsp

    <br>
    <h1>Practical With Orals Attainment</h1>

    <table id="instruction">
      <tr>
        <td>Instructions-</td>
      </tr>
      <tr>
        <td>
          <ul>
            <li>Please Print this file for your reference to prevent any further problems</li><br>
        </td>
        </ul>
      </tr>
    </table>
    <div class="container">
      <form class="insert-form" id="viewPracticalFinalAttainment" method="POST" action="ViewPracticalWithOralAttainment.php">
        <div class="input-field">
          <div class=box>
            <div style=border:solid 5px rgb(0, 0, 0); padding:10px; margin-left: auto;margin-right: auto;><br>
              <h2>Select Subject</h2><br>
                <?php
                  $user_id = $_SESSION['uid'];
                  $query = "SELECT * FROM batch WHERE created_by=$user_id";
                  $result = $conn-> query($query);
                  echo "<select name='batch_id' id='batch_id'></BR>";
                  echo "<option value=0>Select Subject</option>";
                  while ($row = $result-> fetch_array()) {
                    echo "<option value=" . $row[0] . ">" . $row[1] . "</option>";
                  }
                  echo "</select><BR>";
                ?>
                <BR><input type=submit class='button'><BR>&nbsp
            </div>
          </div><br>&nbsp
          <div class="imgBox">
            <img src="../../assets/prac.jpg">
          </div>
        </div>
      </form><br>&nbsp
    </div>
  </center>
</body>
<script type='text/javascript'>
  $(document).ready(function(){
    $('#viewPracticalFinalAttainment').submit(function(e){
      var batch = document.getElementById('batch_id').value;
      if (parseInt(batch) === 0) {
        alert('Please enter Subject and then try to proceed!!');
        e.preventDefault();
      }
    })
  })
</script>
</html>