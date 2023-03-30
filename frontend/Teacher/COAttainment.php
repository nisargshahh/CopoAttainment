<?php
  include('../../assets/copo_config.php');

  session_start();
  if(!isset($_SESSION["uname"]))
  {
    header("Location: ../Login.php");
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Levels | CO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/table5.css">
  </head>
  <body>
    <div class="container">
      <form class="insert-form" id="insert_form" method="POST" action="t1cal.php">
        <img src="../../assets/somaiya100.png" class="logo" style = "position:absolute; left:20px; top:60px; width:100px; height:100px;">
        <br><h1 class="text-center">CO Attainment Level</h1>
        <?php
          $sql="select max(subname) from faculty_data where uname='".$_SESSION["uname"]."' ";
          $result=mysqli_query($conn,$sql);
          while($row=mysqli_fetch_assoc($result))
          {
            echo "<h2 style=font-size:25px>".$row['max(subname)']."</h2><br>";
          }
          $u = $_REQUEST["batch"];
        ?>
        <table id="instruction">
          <tr>
            <td>Instructions-</td>
          </tr>
          <tr>
            <td>
              <ul>
                <li>CO's and levels of a particular question are displayed below.</li><br>
                <li>As per the ranges selected in the previous section, levels are displayed.</li><br>
              </ul>
            </td>
          </tr>
        </table><br>
        <div class="input-field">
        <table id="customers">
          <tr>
            <th></th>
            <th> Q1</th>
            <th> Q2</th>
            <th> Q3</th>
          </tr>
          <tr>
            <td>CO</td>
            <?php
              $sql="select DISTINCT coq1 from t1 where uname='".$_SESSION["uname"]."' and batch='$u' ";
              $result=mysqli_query($conn,$sql);
              while($row=mysqli_fetch_assoc($result))
              {
                echo "<td>".$row['coq1']."</td>";
              }

              $sql="select DISTINCT coq2 from t1 where uname='".$_SESSION["uname"]."' and batch='$u' ";
              $result=mysqli_query($conn,$sql);
              while($row=mysqli_fetch_assoc($result))
              {
                echo "<td>".$row['coq2']."</td>";
              }

              $sql="select DISTINCT coq3 from t1 where uname='".$_SESSION["uname"]."' and batch='$u' ";
              $result=mysqli_query($conn,$sql);
              while($row=mysqli_fetch_assoc($result))
              {
                echo "<td>".$row['coq3']."</td>";
              }

              $sql="select COUNT(*) from t1 where q1>=tvt1num1 and uname='".$_SESSION["uname"]."' and batch='$u'";
              $result=mysqli_query($conn,$sql);
              while($row=mysqli_fetch_assoc($result))
              {
                $abc = $row['COUNT(*)'];
              }

              $sql="select COUNT(*) from t1 where uname='".$_SESSION["uname"]."' and batch='$u' ";
              $result=mysqli_query($conn,$sql);
              while($row=mysqli_fetch_assoc($result))
              {
                $abc2 = $row['COUNT(*)'];
              }

              if(isset($abc,$abc2)){
                $abc31 = ($abc/$abc2)*100;
                echo "<tr><td>Percentage</td><td>".$abc31."</td>";
              }

              $sql="select COUNT(*) from t1 where q2>=tvt1num2 and uname='".$_SESSION["uname"]."' and batch='$u'";
              $result=mysqli_query($conn,$sql);
              while($row=mysqli_fetch_assoc($result))
              {
                $abc = $row['COUNT(*)'];
              }

              $sql="select COUNT(*) from t1 where uname='".$_SESSION["uname"]."' and batch='$u' ";
              $result=mysqli_query($conn,$sql);
              while($row=mysqli_fetch_assoc($result))
              {
                $abc2 = $row['COUNT(*)'];
              }

              if(isset($abc,$abc2)){
                $abc32 = ($abc/$abc2)*100;
                echo "<td>".$abc32."</td>";
              }


              $sql="select COUNT(*) from t1 where q3>=tvt1num3 and uname='".$_SESSION["uname"]."' and batch='$u'";
              $result=mysqli_query($conn,$sql);
              while($row=mysqli_fetch_assoc($result))
              {
                  $abc = $row['COUNT(*)'];
              }

              $sql="select COUNT(*) from t1 where uname='".$_SESSION["uname"]."' and batch='$u' ";
              $result=mysqli_query($conn,$sql);
              while($row=mysqli_fetch_assoc($result))
              {
                $abc2 = $row['COUNT(*)'];
              }

              if(isset($abc,$abc2)){
                $abc33 = ($abc/$abc2)*100;
                echo "<td>".$abc33."</td>";
              }

              $sql = "update t1 set coq1p='$abc31', coq2p='$abc32', coq3p='$abc33' where batch='$u'";
              $result=mysqli_query($conn,$sql);
              echo "<tr><td>Level</td>";

              $sql="select * from lvlt1 where uname='".$_SESSION["uname"]."' ";
              $result=mysqli_query($conn,$sql);
              while($row=mysqli_fetch_assoc($result))
              {
                $a1 = $row['lvlu1'];
              }

              $sql="select * from lvlt1 where uname='".$_SESSION["uname"]."' and batch='$u' ";
              $result=mysqli_query($conn,$sql);
              while($row=mysqli_fetch_assoc($result))
              {
                $a2 = $row['lvll1'];
              }

              if ($abc31>=$a1) {
                echo "<td>3</td>";
                $sql = "update t1 set coq1l='3' where uname='".$_SESSION["uname"]."' and batch='$u'";
                $result=mysqli_query($conn,$sql);
              } else {
                if($a1>$abc31 && $abc31>=$a2){
                  echo "<td>2</td>";
                  $sql = "update t1 set coq1l='2' where uname='".$_SESSION["uname"]."' and batch='$u' ";
                  $result=mysqli_query($conn,$sql);
                }
                else{
                  if ($a2>$abc31) {
                    echo "<td>1</td>";
                    $sql = "update t1 set coq1l='1' where uname='".$_SESSION["uname"]."' and batch='$u' ";
                    $result=mysqli_query($conn,$sql);
                  } else {
                    if ($abc31==0) {
                      echo "<td>NA</td>";
                      echo "<p><b>As your CO level is 0, your attainment is very low. Please do the needful to increase your attainment</b></p><br>";
                    } else{
                        echo "<td>NA</td>";
                        echo"<p><b>As your percentage is very less, your attainment is very less. Please increase you attainment</b></p>";
                    }
                  }
                }
              }

              $sql="select * from lvlt1 where uname='".$_SESSION["uname"]."' and batch='$u' ";
              $result=mysqli_query($conn,$sql);
              while($row=mysqli_fetch_assoc($result))
              {
                $a3 = $row['lvlu2'];
              }

              $sql="select * from lvlt1 where uname='".$_SESSION["uname"]."' and batch='$u' ";
              $result=mysqli_query($conn,$sql);
              while($row=mysqli_fetch_assoc($result))
              {
                $a4 = $row['lvll2'];
              }

              if ($abc32>=$a3) {
                echo "<td>3</td>";
                $sql = "update t1 set coq2l='3' where uname='".$_SESSION["uname"]."' and batch='$u' ";
                $result=mysqli_query($conn,$sql);
              } else
              {
                  if($a3>$abc32 && $abc32>=$a4){
                      echo "<td>2</td>";
                      $sql = "update t1 set coq2l='2' where uname='".$_SESSION["uname"]."' and batch='$u'";
                      $result=mysqli_query($conn,$sql);

                  }
                  else{
                      if($a4>$abc32){
                          echo "<td>1</td>";
                          $sql = "update t1 set coq2l='1' where uname='".$_SESSION["uname"]."' and batch='$u'";
                          $result=mysqli_query($conn,$sql);

                      }
                      else{
                          if($abc32==0){
                              echo "<td>NA</td>";
                              echo "<p><b>As your CO level is 0, your attainment is very low. Please do the needful to increase your attainment</b></p><br>";
                              }
                              else{
                                  echo "<td>NA</td>";
                                  echo"<p><b>As your percentage is very less, your attainment is very less. Please increase you attainment</b></p>";
                              }
                      }
                  }
              }

              $sql="select * from lvlt1 where uname='".$_SESSION["uname"]."' and batch='$u'";
              $result=mysqli_query($conn,$sql);
              while($row=mysqli_fetch_assoc($result))
              {
                  $a5 = $row['lvlu3'];
              }

              $sql="select * from lvlt1 where uname='".$_SESSION["uname"]."' and batch='$u'  ";
              $result=mysqli_query($conn,$sql);
              while($row=mysqli_fetch_assoc($result))
              {
                  $a6 = $row['lvll3'];
              }

              if($abc33>=$a5){
                  echo "<td>3</td>";
                  $sql = "update t1 set coq3l='3' where uname='".$_SESSION["uname"]."' and batch='$u'  ";
                  $result=mysqli_query($conn,$sql);
              }else
              {
                  if($a5>$abc33 && $abc33>=$a6){
                      echo "<td>2</td>";
                      $sql = "update t1 set coq3l='2' where uname='".$_SESSION["uname"]."' and batch='$u'  ";
                      $result=mysqli_query($conn,$sql);

                  }
                  else{
                      if($a6>$abc33){
                          echo "<td>1</td>";
                          $sql = "update t1 set coq3l='1' where uname='".$_SESSION["uname"]."' and batch='$u' ";
                          $result=mysqli_query($conn,$sql);

                      }
                      else{
                          if($abc33==0){
                              echo "<td>NA</td>";
                              echo "<p><b>As your CO level is 0, your attainment is very low. Please do the needful to increase your attainment</b></p><br>";
                              }
                              else{
                                  echo "<td>NA</td>";
                                  echo"<p><b>As your percentage is very less, your attainment is very less. Please increase you attainment</b></p>";
                              }
                      }
                  }
              }
            ?>
          </tr>
        </table><br>
        <div><button onClick="window.print()"><b>Print</b></button>
        <a href="tvr.php" class="link-btn">Previous</a>
        <a href="home.php" class="link-btn">Home</a>
        <a href="t1level.php" class="link-btn">Next(T2 Marks)</a>
        </div>
        <br>
        <?php
          $sql="select * from allbatch ORDER BY doc DESC";
          $result=mysqli_query($conn,$sql);
          echo "<center><div class=box><div style=border:solid 5px rgb(0, 0, 0); padding:10px; margin-left: auto;margin-right: auto;><form action='t1cal.php' method=POST><BR><h2>Select Batch</h2><select name=batch></BR>";
          while($row=mysqli_fetch_assoc($result))
          {
            echo "<option value=".$row["batch"].">".$row["batch"];
          }

          echo "</select><BR>";
          echo "<BR><input type=submit class='button'><BR>&nbsp</form></div></div> </center>";
        ?>
  </body>
</html>