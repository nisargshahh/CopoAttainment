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
    <title>Orals Attainment</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="table5.css">
    <script type='text/javascript' src='../../js/jquery-min.js'></script>
  </head>
  <body>
    <?php include('../../assets/header.html'); ?>
    <center><br>
      <img src="../../assets/somaiya100.png" class="logo" style="position:absolute; left:20px; top:60px; width:100px; height:100px;"><br>
      <h1>Orals Attainment</h1>
      <?php
        $user_id = $_SESSION['uid'];
      ?>
      <div class="container">
        <form class="insert-form" method="POST" action="ViewOralsAttainment.php" id='viewOralsAttainment'>
          <div class="input-field">
            <div class=box>
              <div style=border:solid 5px rgb(0, 0, 0); padding:10px; margin-left: auto;margin-right: auto;><BR>
                <h2>Select Subject</h2>
                <select name=batch id=batch><br>
                <?php
                  $query = "SELECT * FROM batch WHERE batch_id IN (SELECT batch_id FROM oral_mapping) AND created_by=$user_id";
                  $result = $conn-> query($query);
                    echo "<option value=0>Select Subject</option>";
                    while ($row = $result-> fetch_array()) {
                      echo "<option value=" . $row[0] . ">" . $row[1] . "</option>";
                    }
                  echo "";
                ?>
                </select><BR>
                <BR><input type=submit class='button'><BR>&nbsp
              </div>
            </div>
          </div>
        </form><br>&nbsp
      </div>
    </center>
  </body>
  <script type='text/javascript'>
    $(document).ready(function(){
      $('#viewOralsAttainment').submit(function(e){
        var batch = document.getElementById('batch').value;
        if (parseInt(batch) === 0) {
          alert('Please enter Subject and then try to proceed!!');
          e.preventDefault();
        }
      })
    })
  </script>
</html>