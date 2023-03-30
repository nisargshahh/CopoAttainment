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
    <title>Range | SAT Practicals(Activity/Technology Based Learning)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/table5.css">
  </head>
  <body>
    <?php include('../../assets/header.html'); ?>
    <?php
      $ulp = "";
      $llp = "";
      if(isset($_POST["batch"]))
      {
        $u=$_POST["batch"];
        $ulp = $_POST['ulp'];
        $llp = $_POST['llp'];
        $save = "INSERT INTO lvlsp2(uname,ulp,llp,batch)VALUES('".$_SESSION["uname"]."','$ulp','$llp','$u')";
        $query = mysqli_query($conn,$save);
        if ($query) {
          echo "<div class=fixed>Data entered successfully</div>";
        } else{
          echo "<div class=fixed2>Error entering data</div>";
        }
      }
    ?>
    <center>
    <form action= 'tvsatr2.php' method= POST form class="insert-form" id="insert_form" method="POST" action="tvsatr2.php">
      <div class="container">
        <img src="../../assets/somaiya100.png" class="logo" style = "position:absolute; left:20px; top:60px; width:100px; height:100px;"><br>&nbsp<br>&nbsp<br>
        <h1 class="text-center">Upper range and lower range for Attainment Level<br>(Activity/Technology Based Learning)</h1>
        <div class="input-field">
          <table>
            <tr><th>Select Batch</tr></th>
            <tr>
              <td>
                <?php
                  $sql="select * from allbatch ORDER BY doc DESC";
                  $result=mysqli_query($conn,$sql);
                  echo "<select name=batch>";
                  while($row=mysqli_fetch_assoc($result)) {
                    echo "<option value=".$row["batch"].">".$row["batch"];
                  }
                  echo "</select>";
                ?>
              </td>
            </tr>
          </table><br>
          <table id="customers">
            <tr>
              <th></th>
              <th>Upper range</th>
              <th>Lower range</th>
            </tr>
              <tr>
                <td>Range for Attainment Level:</td>
                <td>
                  <select name="ulp" class="mySelect">
                    <option value="50">50
                    <option value="60">60
                    <option value="70">70
                    <option value="80">80
                    <option value="90">90
                    <option value="100">100
                  </select><br>
                </td>
                <td>
                  <select name="llp" class="mySelect">
                    <option value="40">40
                    <option value="50">50
                    <option value="60">60
                    <option value="70">70
                    <option value="80">80
                    <option value="90">90
                    <option value="100">100
                  </select>
                </td>
          </table><br>
        </div>
      </div>
      <div>
        <button onClick="window.print()"><b>Print</b></button>
        <input type="submit" value="Submit">
        <a href="tvsatp2.php" class="link-btn">Previous</a>
        <a href="satpcal2.php" class="link-btn">Next</a>
      </div><br><br><br>
    </form>
  </body>
</html>