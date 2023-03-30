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
  <title>Final Theory Attainment</title>
  <meta name="viewport" content="width=device-width, initlvl-scale=1">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/table5.css">
  <script type='text/javascript' src='../../js/jquery-min.js'></script>
</head>

<body>
  <?php include('../../assets/header.html'); ?>
  <center><br>
    <img src="../../assets/somaiya100.png" class="logo" style="position:absolute; left:20px; top:60px; width:100px; height:100px;"><br>&nbsp<br>
    <form action='ViewFinalCourseTheoryAttainment.php' method=POST class="insert-form" id="viewFinalCourseTheoryAttainment" method="POST" action="dca.php">
      <div class="container">
        <h1 class="text-center">Final Theory Attainment</h1><br>
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
        </table><br>&nbsp
        <div class=box>
          <div style=border:solid 5px rgb(0, 0, 0); padding:10px; margin-left: auto;margin-right: auto;><BR>
            <h2>Select Subject</h2><br>
            <select name=batch id=batch></BR>
              <option value=0>Select Subject</option>
              <?php
                $user_id = $_SESSION['uid'];
                $query = "SELECT * FROM batch WHERE batch_id IN (SELECT batch_id FROM test_mapping WHERE test_type=1 AND test_type=2 AND test_type=4) AND batch_id IN (SELECT batch_id FROM ia_mapping) AND batch_id IN (SELECT batch_id FROM course_exit_mapping) AND created_by=$user_id";
                $result = $conn-> query($query);

                while ($row = $result-> fetch_array()) {
                  echo "<option value=" . $row[0] . ">" . $row[1] . "</option>";
                }
              ?>
            </select><BR>
            <BR><input type=submit class='button'><BR>&nbsp
          </div>
        </div><br>&nbsp
        <div class="imgBox">
          <img src="../../assets/theory.jpg">
        </div>
      </div>
    </form>
  </center><br>&nbsp
</body>
<script type='text/javascript'>
  $(document).ready(function(){
    $('#viewFinalCourseTheoryAttainment').submit(function(e){
      var batch = document.getElementById('batch').value;
      if (parseInt(batch) === 0) {
        alert('Please enter Subject and then try to proceed!!');
        e.preventDefault();
      }
    })
  })
</script>
</html>