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
  <title>Theory Attainment Closure</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/table5.css">
</head>

<body>
  <?php include('../../assets/header.html'); ?>
  <center><br>
    <img src="../../assets/somaiya100.png" class="logo" style="position:absolute; left:20px; top:60px; width:100px; height:100px;"><br>&nbsp
    <h1>Closure of the Quality Loop</h1><br>
    <div class="container">
      <form class="insert-form" id="insert_form" method="POST" action="closure2.php">
        <div class="input-field">
          <table>
            <tr>
              <th>Select Batch</th>
            </tr>
            <tr>
              <td>
                <?php
                  $user_id = $_SESSION['uid'];
                  $query = "SELECT * FROM batch WHERE created_by=$user_id";
                  $result = $conn-> query($query);
                  echo "<select name=batch>";
                    echo "<option value=0>Select Batch</option>";
                    while ($row = $result-> fetch_array()) {
                      echo "<option value=" . $row[0] . ">" . $row[1] . "</option>";
                    }
                  echo "</select>";
                ?>
              </td>
            </tr>
          </table><br>
          <table id="customers">
            <tr>
              <th></th>
              <th> CO1</th>
              <th> CO2</th>
              <th> CO3</th>
              <th> CO4</th>
              <th> CO5</th>
              <th> CO6</th>
            </tr>
            <?php
              $gco1 = "";
              $gco2 = "";
              $gco3 = "";
              $gco4 = "";
              $gco5 = "";
              $gco6 = "";

              $acco1 = "";
              $acco2 = "";
              $acco3 = "";
              $acco4 = "";
              $acco5 = "";
              $acco6 = "";

              $mco1 = "";
              $mco2 = "";
              $mco3 = "";
              $mco4 = "";
              $mco5 = "";
              $mco6 = "";
              if (isset($_POST["batch"])) {
                $u = $_POST["batch"];
                $gco1 = $_POST['gco1'];
                $gco2 = $_POST['gco2'];
                $gco3 = $_POST['gco3'];
                $gco4 = $_POST['gco4'];
                $gco5 = $_POST['gco5'];
                $gco6 = $_POST['gco6'];
                $acco1 = $_POST['acco1'];
                $acco2 = $_POST['acco2'];
                $acco3 = $_POST['acco3'];
                $acco4 = $_POST['acco4'];
                $acco5 = $_POST['acco5'];
                $acco6 = $_POST['acco6'];
                $mco1 = $_POST['mco1'];
                $mco2 = $_POST['mco2'];
                $mco3 = $_POST['mco3'];
                $mco4 = $_POST['mco4'];
                $mco5 = $_POST['mco5'];
                $mco6 = $_POST['mco6'];
                $sql = "insert into th_closure(uname,gco1,gco2,gco3,gco4,gco5,gco6,acco1,acco2,acco3,acco4,acco5,acco6,mco1,mco2,mco3,mco4,mco5,mco6,batch) VALUES('" . $_SESSION["uname"] . "','$gco1','$gco2','$gco3','$gco4','$gco5','$gco6','$acco1','$acco2','$acco3','$acco4','$acco5','$acco6','$mco1','$mco2','$mco3','$mco4','$mco5','$mco6','$u')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                  echo "<h3>Data entered successfully</h3>";
                } else {
                  echo "Error entering data";
                }
              }
            ?>
            <tr>
              <td>Gap</td>
              <td><input type=text name='gco1'></td>
              <td><input type=text name='gco2'></td>
              <td><input type=text name='gco3'></td>
              <td><input type=text name='gco4'></td>
              <td><input type=text name='gco5'></td>
              <td><input type=text name='gco6'></td>
            </tr>
            <tr>
              <td>Action proposed to bridge the gap</td>
              <td><input type=text name='acco1'></td>
              <td><input type=text name='acco2'></td>
              <td><input type=text name='acco3'></td>
              <td><input type=text name='acco4'></td>
              <td><input type=text name='acco5'></td>
              <td><input type=text name='acco6'></td>
            </tr>
            <tr>
              <td>
                Modify of target where achieved gap
              </td>
              <td><input type=text name='mco1'></td>
              <td><input type=text name='mco2'></td>
              <td><input type=text name='mco3'></td>
              <td><input type=text name='mco4'></td>
              <td><input type=text name='mco5'></td>
              <td><input type=text name='mco6'></td>
            </tr>
          </table><br>
            <button onClick="window.print()"><b>Print</b></button>
            <input type="submit" value="Submit">
            <a href="dca.php" class="link-btn">Previous</a>
            <a href="final_th.php" class="link-btn">Next</a>
        </div><br><br><br>
      </form>
    </div>
  </center>
</body>
</html>