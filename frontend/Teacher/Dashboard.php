<?php
  session_start();
  if(!isset($_SESSION["uname"]))
  {
    header("Location: ../Login.php");
  }
?>

<html>
  <head>
    <title>Home Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <?php include('../../assets/header.html'); ?><br>
    <center>
      <img src="../../assets/somaiya100.png" class="logo" style="width:100px; height:100px;">
      <h1>Attainment of Course Outcome</h1>
      <h3>Developed by Computer Engineering | Electronics & Telecommunications Department</h3></p><br>
      <a href="./CreateBatch.php" class="link-btn">Create Subject</a>
    </center>
    <section>
      <div class="footer">
        <center>Guided By: Dr. Namrata Ansari<br> Developed By: Kashyap Kotak, Prince Karania</center>
      </div>
    </section>
  </body>
</html>
