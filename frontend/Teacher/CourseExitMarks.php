<?php
  include('../../assets/copo_config.php');
  session_start();
  if (!isset($_SESSION["uname"])) {
    header("Location: ../Login.php");
  }
?>
<html>

<head>
  <title>Course Exit</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/table5.css">
</head>

<body>
  <?php include('../../assets/header.html'); ?>
  <center>
    <div class="container box">
      <img src="../../assets/somaiya100.png" class="logo" style="position:absolute; left:20px; top:60px; width:100px; height:100px;"><br>&nbsp
      <h2 align="center">Select Course Exit Excel file which you want to import</h2><br>
      <form action='../../returning_apis/ImportCourseExitData.php' method='POST' enctype='multipart/form-data'>
        <label><h3>Select Subject</h3></label><br>
        <?php
          $user_id = $_SESSION['uid'];
          $query = "SELECT * FROM batch WHERE created_by=$user_id";
          $result = $conn-> query($query);
          echo "<select name='batch_id'>";
          echo "<option value=0>Select Subject</option>";
          while ($row = $result-> fetch_array()) {
            echo "<option value=" . $row[0] . ">" . $row[1] . "</option>";
          }
          echo "</select><br>";
        ?><BR>
        <label>
          <h3>Select Excel File</h3>
        </label><br>
        <input type="file" name="excel" /><br>&nbsp<br>
        <input type="submit" name="import" class="button" value="Import" />
      </form><br><br>
    </div>
  </center>
</body>
</html>