<?php
  include ('../../assets/copo_config.php');
  session_start();
  if(!isset($_SESSION["uname"]))
  {
    header("Location: ../Login.php");
  }
?>

<html>
  <head>
      <title>Marks | SAT Practicals</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <?php include('../../assets/header.html'); ?>
    <center>
      <div class="container box">
        <form action='sat_p.php' method=POST enctype=multipart/form-data>
          <img src="../../assets/somaiya100.png" class="logo" style = "position:absolute; left:20px; top:60px; width:100px; height:100px;">
          <h2 align="center">Select SAT Practical Excel file which you want to import</h2>
          <?php
            $user_id = $_SESSION['uid'];
            $query = "SELECT * FROM batch WHERE created_by=$user_id";
            $result = $conn-> query($query);
            echo "<h3>Select batch</h3></label><select name=batch>";
              echo "<option value=0>Select Batch</option>";
              while($row = $result-> fetch_array())
              {
                echo "<option value=".$row[0].">".$row[1];
              }
            echo "</select>";
          ?>
          <BR><label><h3>Select Excel File</h3></label>
          <input type="file" name="excel" /><br>&nbsp<br>
          <input type="submit" name="import" class="button" value="Import" />
          <a href="satp_lo.php" class="link-btn">Next</a> 
        </form><br><br>
     </div>
    </center>
  </body>
</html>