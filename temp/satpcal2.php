<?php
  include('../../assets/copo_config.php');
  session_start();
  if(!isset($_SESSION["login"])||$_SESSION["login"]==0)
  {
    header("Location:Admin.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<html>
  <head>
    <title>Levels | SAT (Activity/Technology Based)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/table5.css">
  </head>
  <body>
    <?php include('../../assets/header.html'); ?>
    <center>
      <div class="container">
        <form class="insert-form" id="insert_form" method="POST" action="satpcal2.php">
          <img src="../../assets/somaiya100.png" class="logo" style = "position:absolute; left:20px; top:60px; width:100px; height:100px;"><br>&nbsp<br><br>&nbsp<br>&nbsp<br>&nbsp
          <h1 class="text-center">SAT (Activity/Technology Based) Attainment Level</h1>
          <?php
            if(isset($_POST["batch"])) {
              $u=$_POST["batch"];
          ?>
          <div class="input-field">
            <form action='satpcal2.php' method=POST>
              <table id="customers">
                <tr>
                  <th></th>
                  <th>EXP 1</th>
                </tr>
                <?php
                  $sql="select COUNT(*) from sat_p2 where as1>=tvas and uname='".$_SESSION["uname"]."' and batch='$u'";
                  $result=mysqli_query($conn,$sql);
                  while ($row=mysqli_fetch_assoc($result)) {
                      $abc1 = $row['COUNT(*)'];
                  }

                  $sql="select COUNT(*) from sat_p2 where uname='".$_SESSION["uname"]."' and batch='$u' ";
                  $result=mysqli_query($conn,$sql);
                  while ($row=mysqli_fetch_assoc($result)) {
                      $abc21 = $row['COUNT(*)'];
                  }

                  if (isset($abc1,$abc21)) {
                      $abc3c1 = ($abc1/$abc21)*100;
                      echo "<tr><td>Percentage</td>";
                      echo "<td>".$abc3c1."</td></tr>";
                  }

                  $sql = "update sat_p2 set as1p='$abc3c1' where uname='".$_SESSION["uname"]."' and batch='$u'";
                  $result=mysqli_query($conn,$sql);
                  echo "<tr><td>Level</td>";
                  $sql="select * from lvlsp2 where uname='".$_SESSION["uname"]."' and batch='$u' ";

                  $result=mysqli_query($conn,$sql);
                  while ($row=mysqli_fetch_assoc($result)) {
                      $abcde = $row['ulp'];
                  }

                  $sql="select * from lvlsp2 where uname='".$_SESSION["uname"]."' and batch='$u' ";
                  $result=mysqli_query($conn,$sql);
                  while ($row=mysqli_fetch_assoc($result)) {
                      $abcd2 = $row['llp'];
                  }
                  if ($abc3c1>=$abcde) {
                      echo "<td>3</td>";
                      $sql = "update sat_p2 set as1l='3' where uname='".$_SESSION["uname"]."' and batch='$u' ";
                      $result=mysqli_query($conn,$sql);
                  } else {
                      if ($abcde>$abc3c1 && $abc3c1>=$abcd2) {
                          echo "<td>2</td>";
                          $sql = "update sat_p2 set as1l='2' where uname='".$_SESSION["uname"]."' and batch='$u' ";
                          $result=mysqli_query($conn,$sql);
                      }
                      else{
                          if ($abcd2>$abc3c1 && $abc3c1>0) {
                              echo "<td>1</td>";
                              $sql = "update sat_p2 set as1l='1' where uname='".$_SESSION["uname"]."' and batch='$u' ";
                              $result=mysqli_query($conn,$sql);

                          } else {
                              if ($abc3c1==0) {
                                  echo "<td>NA</td>";
                                  echo "<p><b>As you CO level is 0, your attainment is very low. Please do the needful to increase your attainment</b></p><br>";
                                  }
                                  else{
                                      echo "<td>NA</td>";
                                      echo"<p><b>As your percentage is very less, your attainment is very less. Please increase you attainment</b></p>";
                                  }
                          }
                      }
                  }
                ?>
              </table>
            </div>
          </div><br>
          <div>
            <button onClick="window.print()"><b>Print</b></button>
            <a href="tvsatr2.php" class="link-btn">Previous</a>
            <a href="satp_level2.php" class="link-btn">Next</a>
          </div>
          <?php
            } else {
              $sql="select * from allbatch ORDER BY doc DESC";
              $result=mysqli_query($conn,$sql);
              echo "<center>   <div class=box><div style=border:solid 5px rgb(0, 0, 0); padding:10px; margin-left: auto;margin-right: auto;><form action='satpcal.php' method=POST><BR><h2>Select Batch</h2><select name=batch></BR>";

              while($row=mysqli_fetch_assoc($result))
              {
                echo "<option value=".$row["batch"].">".$row["batch"];
              }
              echo "</select><BR>";
              echo "<BR><input type=submit class='button'><BR>&nbsp</form></div></div> </center>";
            }
          ?><br>&nbsp<br>&nbsp
        </form>
      </div>
    </center>
  </body>
</html>