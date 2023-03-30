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
    <title>CO - PO ATTAINMENT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/table5.css">
    <!-- <script src='https://unpkg.com/axios/dist/axios.min.js'></script> -->
    <script type='text/javascript' src='../../js/jquery-min.js' ></script>
  </head>
  <body>
    <?php include('../../assets/header.html'); ?>
    <center>
    <!-- <form class="insert-form" id="insert_form" method="POST" action="ViewCOPOMapping"> -->
    <img src="../../assets/somaiya100.png" class="logo" style = "position:absolute; left:20px; top:60px; width:100px; height:100px;">    <br><h1>CO - PO ATTAINMENT</h1><br>
    <table id="instruction">
      <tr>
        <td>Instructions-</td>
      </tr>
      <tr>
        <td>
          <ul>
            <li>Course outcome, Statements, PO's-PSO's and Hours are displayed below.</li><br>
            <li>As per the ranges selected in the previous section, levels are displayed.</li><br>
            <li>Addition of the lecture hours will be displayed in hours column.</li><br>
          </ul>
        </td>
      </tr>
    </table><br>
    <center><br>
    <center>
      <div class=box>
        <div style=border:solid 5px rgb(0, 0, 0); padding:10px; margin-left: auto;margin-right: auto;>
          <form action='./ViewCOPOMapping.php' method=POST id='viewCOPOMapping'><br>
            <h2>Select Subject</h2><br>
            <select name=batch id=batch><br>
              <option value=0>Select Subject</option>
              <?php
                $user_id = $_SESSION['uid'];
                $query = "SELECT * FROM batch WHERE batch_id IN (SELECT batch_id FROM co_mapping) AND created_by=$user_id";
                $result = $conn-> query($query);
                while($row = $result-> fetch_array())
                {
                  echo "<option value=".$row[0].">".$row[1]."</option>";
                }
              ?>
            </select><br><br>
            <input type=submit class='button'><br>&nbsp
            <!-- <a href="pofinal.php" class="link-btn">Next</a> -->
          </form>
        </div>
      </div>
    </center>
    <!-- </form></center> -->
</body>
<script>
  $(document).ready(function(){
    $('#viewCOPOMapping').submit(function(e){
      var batch = document.getElementById('batch').value;
      if (parseInt(batch) === 0) {
        alert('Please enter Subject and then try to proceed!!');
        e.preventDefault();
      }
    })
  })
</script>
</html>