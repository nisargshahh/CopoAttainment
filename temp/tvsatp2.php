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
    <title>Target Value | SAT Practicals(Acitivity/Technolgy Based Learning)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/table5.css">
  </head>
  <body>
    <?php include ("../../assets/header.html"); ?>
    <?php
      if(isset($_POST["tvas"])) {
        $tvas = $_POST["tvas"];
        $sql="update sat_p2 set tvas='$tvas'/100*25 where uname='".$_SESSION["uname"]."' ";
        $result=mysqli_query($conn,$sql);
        if($result)
        {
          echo "<div class=fixed>Data entered successfully</div>";
          
        }
        else
        {
          echo "<div class=fixed2>Error Entering Data</div>";
        }
      }
    ?>
    <center>
    <form action= 'tvsatp2.php' method= POST form class="insert-form" id="insert_form" method="POST" action="tvsatp2.php">
      <div class="container">
        <img src="../../assets/somaiya100.png" class="logo" style = "position:absolute; left:20px; top:60px; width:100px; height:100px;"><br>&nbsp<br>&nbsp
        <h1>Target Value for (Activity/Technology Based Learning)</h1>
        <div class="input-field">
          <table>
            <tr>
              <th>Select Batch</th>
            </tr>
            <tr>
              <td>
                <?php
                  $sql="select * from allbatch ORDER BY doc DESC";
                  $result=mysqli_query($conn,$sql);
                  echo "<select name=batch>";
                  while($row=mysqli_fetch_assoc($result))
                  {
                    echo "<option value=".$row["batch"].">".$row["batch"];
                  }
                  echo "</select>";
                ?>
              </td>
            </tr>
          </table><br>
          <table id="customers"><br>
            <tr>
              <th></th>
              <th>Acitivty</th>
            </tr>
            <tr><td>Target Value:</td>
              <td>
                <select name="tvas" class="mySelect">
                  <option value="40">40</option>
                  <option value="50">50</option>
                  <option value="60">60</option>
                  <option value="70">70</option>
                  <option value="80">80</option>
                  <option value="90">90</option>
                  <option value="100">100</option>
                </select><br>
              </td>
            </tr>
          </table><br>
          <div>
            <button onClick="window.print()"><b>Print</b></button>
            <input type="submit" value="Submit">
            <a href="at_lo.php" class="link-btn">Previous</a>
            <a href="tvsatr2.php" class="link-btn">Next</a>
          </div><br>
          <table id="customers">
            <tr>
              <th>Roll No</th>
              <th>Full Name</th>
              <th>Activity</th>
            </tr>
            <?php
              if(isset($_POST["batch"])) {
                $u=$_POST["batch"];
                $select = "SELECT * FROM sat_p2 where uname='".$_SESSION["uname"]."' and batch='$u' ORDER BY rollno ASC ";
                $result = mysqli_query($conn,"$select");
                while ($row = mysqli_fetch_assoc($result)) { 
                  echo "<tr>";
                    echo "<td>".$row['rollno']."</td>";
                    echo "<td>".$row['fullname']."</td>";
                    echo "<td>".$row['as1']."</td>";
                  echo "</tr>";
                }
              }
            ?><br>
          </table>
        </div>
      </div>
    </form>
  </body>
</html>
