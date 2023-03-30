<?php
  include ('../../assets/copo_config.php');
  session_start();
  if(!isset($_SESSION["uname"]))
  {
    header("Location: ../Login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="table5.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>SAT TYPE</title>
  </head>
  <body>
    <?php include('../../assets/header.html'); ?>
    <div class="container">
        <a href="sat_p.php" style="top:50%; position:absolute; left:25%"><button id="btn"> SKILL <br> BASED </button></a>
    </div>
    <div class="container">
        <a href="ActivityTechnologyMarks.php" style="top:50%; left:53%; position:absolute"><button id="btn"> ACTIVITY/TECHNOLOGY <br> BASED </button></a>
    </div>
  </body>
</html>