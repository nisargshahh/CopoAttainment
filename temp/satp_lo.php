<?php
  include('../../assets/copo_config.php');
  session_start();
  if (!isset($_SESSION["uname"])) {
    header("Location: ../Login.php");
  }
?>

<html>
  <head>
    <title>LO Mapping | SAT Practicals</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/table5.css">
  </head>
  <body>
    <?php include('../../assets/header.html'); ?>
    <center>
    <form class="insert-form" id="insert_form" method="POST" action="satp_lo.php">
      <img src="../../assets/somaiya100.png" class="logo" style="position:absolute; left:20px; top:60px; width:100px; height:100px;"><br>
      <h1 class="text-center">Enter Experiment Name and Select LO</h1>
      <?php
      $sql = "select max(subname) from faculty_data where uname='" . $_SESSION["uname"] . "' ";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<h2 style=font-size:25px>" . $row['max(subname)'] . "</h2><br>";
      }
      ?>
      <table id="instruction">
        <tr>
          <td>Instructions-</td>
        </tr>
        <tr>
          <td>
            <ul>
              <li>Write Experiment name and Miniproject in the respective text box.</li><br>
              <li>Corresponding to the Experiment and Miniproject, select the LO's which are supposed to be mapped.</li><br>
              <li>Since LO-5 and LO-6 will be mapped for each experiment; hence they are selected as default.</li><br>
            </ul>
          </td>
        </tr>
      </table><br>
      <table>
        <tr>
          <th>Select Batch</th>
        </tr>
        <tr>
          <td>
            <?php
              $sql = "select * from allbatch ORDER BY doc DESC";
              $result = mysqli_query($conn, $sql);
              echo "<select name=batch>";
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value=" . $row["batch"] . ">" . $row["batch"];
              }
              echo "</select>";
            ?>
          </td>
        </tr>
      </table><br>
      <div class="input-field">
        <table id="customers">
          <tr>
            <th>Experiments</th>
            <th>Experiment Name</th>
            <th>LO Mapped</th>
          </tr>
          <tr>
            <td>Experiment 1</td>
            <td><input class="form-control" type="text" name="ex1" value="<?php echo $ex1; ?>" required=""></td>
            <td>
              <input type="checkbox" name="loexp1[]" value="LO1">LO1
              <input type="checkbox" name="loexp1[]" value="LO2">LO2
              <input type="checkbox" name="loexp1[]" value="LO3">LO3
              <input type="checkbox" name="loexp1[]" value="LO4">LO4
              <input type="checkbox" name="loexp1[]" value="LO5" checked>LO5
              <input type="checkbox" name="loexp1[]" value="LO6" checked>LO6
            </td>
          </tr>
          <tr>
            <td>Experiment 2</td>
            <td><input class="form-control" type="text" name="ex2" value="<?php echo $ex2; ?>" required=""></td>
            <td>
              <input type="checkbox" name="loexp2[]" value="LO1">LO1
              <input type="checkbox" name="loexp2[]" value="LO2">LO2
              <input type="checkbox" name="loexp2[]" value="LO3">LO3
              <input type="checkbox" name="loexp2[]" value="LO4">LO4
              <input type="checkbox" name="loexp2[]" value="LO5" checked>LO5
              <input type="checkbox" name="loexp2[]" value="LO6" checked>LO6
            </td>
          </tr>
          <tr>
            <td>Experiment 3</td>
            <td><input class="form-control" type="text" name="ex3" value="<?php echo $ex3; ?>" required=""></td>
            <td>
              <input type="checkbox" name="loexp3[]" value="LO1">LO1
              <input type="checkbox" name="loexp3[]" value="LO2">LO2
              <input type="checkbox" name="loexp3[]" value="LO3">LO3
              <input type="checkbox" name="loexp3[]" value="LO4">LO4
              <input type="checkbox" name="loexp3[]" value="LO5" checked>LO5
              <input type="checkbox" name="loexp3[]" value="LO6" checked>LO6
            </td>
          </tr>
          <tr>
            <td>Experiment 4</td>
            <td><input class="form-control" type="text" name="ex4" value="<?php echo $ex4; ?>" required=""></td>
            <td>
              <input type="checkbox" name="loexp4[]" value="LO1">LO1
              <input type="checkbox" name="loexp4[]" value="LO2">LO2
              <input type="checkbox" name="loexp4[]" value="LO3">LO3
              <input type="checkbox" name="loexp4[]" value="LO4">LO4
              <input type="checkbox" name="loexp4[]" value="LO5" checked>LO5
              <input type="checkbox" name="loexp4[]" value="LO6" checked>LO6
            </td>
          </tr>
          <tr>
            <td>Experiment 5</td>
            <td><input class="form-control" type="text" name="ex5" value="<?php echo $ex5; ?>" required=""></td>
            <td>
              <input type="checkbox" name="loexp5[]" value="LO1">LO1
              <input type="checkbox" name="loexp5[]" value="LO2">LO2
              <input type="checkbox" name="loexp5[]" value="LO3">LO3
              <input type="checkbox" name="loexp5[]" value="LO4">LO4
              <input type="checkbox" name="loexp5[]" value="LO5" checked>LO5
              <input type="checkbox" name="loexp5[]" value="LO6" checked>LO6
            </td>
          </tr>
          <tr>
            <td>Experiment 6</td>
            <td><input class="form-control" type="text" name="ex6" value="<?php echo $ex6; ?>" required=""></td>
            <td>
              <input type="checkbox" name="loexp6[]" value="LO1">LO1
              <input type="checkbox" name="loexp6[]" value="LO2">LO2
              <input type="checkbox" name="loexp6[]" value="LO3">LO3
              <input type="checkbox" name="loexp6[]" value="LO4">LO4
              <input type="checkbox" name="loexp6[]" value="LO5" checked>LO5
              <input type="checkbox" name="loexp6[]" value="LO6" checked>LO6
            </td>
          </tr>
          <tr>
            <td>Experiment 7</td>
            <td><input class="form-control" type="text" name="ex7" value="<?php echo $ex7; ?>" required=""></td>
            <td>
              <input type="checkbox" name="loexp7[]" value="LO1">LO1
              <input type="checkbox" name="loexp7[]" value="LO2">LO2
              <input type="checkbox" name="loexp7[]" value="LO3">LO3
              <input type="checkbox" name="loexp7[]" value="LO4">LO4
              <input type="checkbox" name="loexp7[]" value="LO5" checked>LO5
              <input type="checkbox" name="loexp7[]" value="LO6" checked>LO6
            </td>
          </tr>
          <tr>
            <td>Experiment 8</td>
            <td><input class="form-control" type="text" name="ex8" value="<?php echo $ex8; ?>" required=""></td>
            <td>
              <input type="checkbox" name="loexp8[]" value="LO1">LO1
              <input type="checkbox" name="loexp8[]" value="LO2">LO2
              <input type="checkbox" name="loexp8[]" value="LO3">LO3
              <input type="checkbox" name="loexp8[]" value="LO4">LO4
              <input type="checkbox" name="loexp8[]" value="LO5" checked>LO5
              <input type="checkbox" name="loexp8[]" value="LO6" checked>LO6
            </td>
          </tr>
          <tr>
            <td>Experiment 9</td>
            <td><input class="form-control" type="text" name="ex9" value="<?php echo $ex9; ?>" required=""></td>
            <td>
              <input type="checkbox" name="loexp9[]" value="LO1">LO1
              <input type="checkbox" name="loexp9[]" value="LO2">LO2
              <input type="checkbox" name="loexp9[]" value="LO3">LO3
              <input type="checkbox" name="loexp9[]" value="LO4">LO4
              <input type="checkbox" name="loexp9[]" value="LO5" checked>LO5
              <input type="checkbox" name="loexp9[]" value="LO6" checked>LO6
            </td>
          </tr>
          <tr>
            <td>Experiment 10</td>
            <td><input class="form-control" type="text" name="ex10" value="<?php echo $ex10; ?>" required=""></td>
            <td>
              <input type="checkbox" name="loexp10[]" value="LO1">LO1
              <input type="checkbox" name="loexp10[]" value="LO2">LO2
              <input type="checkbox" name="loexp10[]" value="LO3">LO3
              <input type="checkbox" name="loexp10[]" value="LO4">LO4
              <input type="checkbox" name="loexp10[]" value="LO5" checked>LO5
              <input type="checkbox" name="loexp10[]" value="LO6" checked>LO6
            </td>
          </tr>
          <tr>
            <td>Experiment 11</td>
            <td><input class="form-control" type="text" name="ex11" value="<?php echo $ex11; ?>" required=""></td>
            <td>
              <input type="checkbox" name="loexp11[]" value="LO1">LO1
              <input type="checkbox" name="loexp11[]" value="LO2">LO2
              <input type="checkbox" name="loexp11[]" value="LO3">LO3
              <input type="checkbox" name="loexp11[]" value="LO4">LO4
              <input type="checkbox" name="loexp11[]" value="LO5" checked>LO5
              <input type="checkbox" name="loexp11[]" value="LO6" checked>LO6
            </td>
          </tr>
          <tr>
            <td>Experiment 12</td>
            <td><input class="form-control" type="text" name="ex12" value="<?php echo $ex12; ?>" required=""></td>
            <td>
              <input type="checkbox" name="loexp12[]" value="LO1">LO1
              <input type="checkbox" name="loexp12[]" value="LO2">LO2
              <input type="checkbox" name="loexp12[]" value="LO3">LO3
              <input type="checkbox" name="loexp12[]" value="LO4">LO4
              <input type="checkbox" name="loexp12[]" value="LO5" checked>LO5
              <input type="checkbox" name="loexp12[]" value="LO6" checked>LO6
            </td>
          </tr>
          <tr>
            <td>Experiment 13</td>
            <td><input class="form-control" type="text" name="ex13" value="<?php echo $ex13; ?>" required=""></td>
            <td>
              <input type="checkbox" name="loexp13[]" value="LO1">LO1
              <input type="checkbox" name="loexp13[]" value="LO2">LO2
              <input type="checkbox" name="loexp13[]" value="LO3">LO3
              <input type="checkbox" name="loexp13[]" value="LO4">LO4
              <input type="checkbox" name="loexp13[]" value="LO5" checked>LO5
              <input type="checkbox" name="loexp13[]" value="LO6" checked>LO6
            </td>
          </tr>
          <td>Experiment 14</td>
          <td><input class="form-control" type="text" name="ex14" value="<?php echo $ex14; ?>" required=""></td>
          <td>
            <input type="checkbox" name="loexp14[]" value="LO1">LO1
            <input type="checkbox" name="loexp14[]" value="LO2">LO2
            <input type="checkbox" name="loexp14[]" value="LO3">LO3
            <input type="checkbox" name="loexp14[]" value="LO4">LO4
            <input type="checkbox" name="loexp14[]" value="LO5" checked>LO5
            <input type="checkbox" name="loexp14[]" value="LO6" checked>LO6
          </td>
          </tr>
          <td>Experiment 15</td>
          <td><input class="form-control" type="text" name="ex15" value="<?php echo $ex15; ?>" required=""></td>
          <td>
            <input type="checkbox" name="loexp15[]" value="LO1">LO1
            <input type="checkbox" name="loexp15[]" value="LO2">LO2
            <input type="checkbox" name="loexp15[]" value="LO3">LO3
            <input type="checkbox" name="loexp15[]" value="LO4">LO4
            <input type="checkbox" name="loexp15[]" value="LO5" checked>LO5
            <input type="checkbox" name="loexp15[]" value="LO6" checked>LO6
          </td>
          </tr>
          <tr>
            <td>Miniproject(if any)</td>
            <td><input class="form-control" type="text" name="mi" value="<?php echo $mi; ?>" required=""></td>
            <td>
              <input type="checkbox" name="lomini[]" value="LO1">LO1
              <input type="checkbox" name="lomini[]" value="LO2">LO2
              <input type="checkbox" name="lomini[]" value="LO3">LO3
              <input type="checkbox" name="lomini[]" value="LO4">LO4
              <input type="checkbox" name="lomini[]" value="LO5" checked>LO5
              <input type="checkbox" name="lomini[]" value="LO6" checked>LO6
            </td>
          </tr>
        </table>
        <center>
          <br><button onClick="window.print()"><b>Print</b></button>
          <input type="submit" value="Submit">
          <a href="sat_p.php" class="link-btn">Previous</a>
          <a href="tvsatp.php" class="link-btn">Next</a>
        </center>
      </div><br>
    </form>
    <table id="customers">
      <tr>
        <th>Experiments</th>
        <th>LO Mapped</th>
      </tr>
      <?php
        if (isset($_POST["batch"])) {
          $u = $_POST["batch"];
          $select = "SELECT DISTINCT loexp1, loexp2, loexp3, loexp4, loexp5, loexp6, loexp7, loexp8, loexp9, loexp10, loexp11, loexp12, loexp13, loexp14, loexp15, lomini FROM sat_p where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
          $result = mysqli_query($conn, "$select");
          while ($row = mysqli_fetch_assoc($result)) {

            echo "<tr>";
            echo "<tr><td>Experiment 1</td>";
            echo "<td>" . $row['loexp1'] . "</td></tr>";
            echo "<tr><td>Experiment 2</td>";
            echo "<td>" . $row['loexp2'] . "</td></tr>";
            echo "<tr><td>Experiment 3</td>";
            echo "<td>" . $row['loexp3'] . "</td></tr>";
            echo "<tr><td>Experiment 4</td>";
            echo "<td>" . $row['loexp4'] . "</td></tr>";
            echo "<tr><td>Experiment 5</td>";
            echo "<td>" . $row['loexp5'] . "</td></tr>";
            echo "<tr><td>Experiment 6</td>";
            echo "<td>" . $row['loexp6'] . "</td></tr>";
            echo "<tr><td>Experiment 7</td>";
            echo "<td>" . $row['loexp7'] . "</td></tr>";
            echo "<tr><td>Experiment 8</td>";
            echo "<td>" . $row['loexp8'] . "</td></tr>";
            echo "<tr><td>Experiment 9</td>";
            echo "<td>" . $row['loexp9'] . "</td></tr>";
            echo "<tr><td>Experiment 10</td>";
            echo "<td>" . $row['loexp10'] . "</td></tr>";
            echo "<tr><td>Experiment 11</td>";
            echo "<td>" . $row['loexp11'] . "</td></tr>";
            echo "<tr><td>Experiment 12</td>";
            echo "<td>" . $row['loexp12'] . "</td></tr>";
            echo "<tr><td>Experiment 13</td>";
            echo "<td>" . $row['loexp13'] . "</td></tr>";
            echo "<tr><td>Experiment 14</td>";
            echo "<td>" . $row['loexp14'] . "</td></tr>";
            echo "<tr><td>Experiment 15</td>";
            echo "<td>" . $row['loexp15'] . "</td></tr>";
            echo "<tr><td>Miniproject(if any)</td>";
            echo "<td>" . $row['lomini'] . "</td></tr>";
            echo "</tr>";
          }
        }
      ?>
    </table><br>
    <table id="customers">
      <tr>
        <th>Experiment Name</th>
        <th>LO Mapped</th>
      </tr>
      <?php
        if (isset($_POST["batch"])) {
          $u = $_POST["batch"];
          $select = "SELECT * FROM sat_exp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
          $result = mysqli_query($conn, "$select");
          while ($row = mysqli_fetch_assoc($result)) {

            echo "<tr>";
            echo "<tr><td>Experiment 1</td>";
            echo "<td>" . $row['ex1'] . "</td></tr>";
            echo "<tr><td>Experiment 2</td>";
            echo "<td>" . $row['ex2'] . "</td></tr>";
            echo "<tr><td>Experiment 3</td>";
            echo "<td>" . $row['ex3'] . "</td></tr>";
            echo "<tr><td>Experiment 4</td>";
            echo "<td>" . $row['ex4'] . "</td></tr>";
            echo "<tr><td>Experiment 5</td>";
            echo "<td>" . $row['ex5'] . "</td></tr>";
            echo "<tr><td>Experiment 6</td>";
            echo "<td>" . $row['ex6'] . "</td></tr>";
            echo "<tr><td>Experiment 7</td>";
            echo "<td>" . $row['ex7'] . "</td></tr>";
            echo "<tr><td>Experiment 8</td>";
            echo "<td>" . $row['ex8'] . "</td></tr>";
            echo "<tr><td>Experiment 9</td>";
            echo "<td>" . $row['ex9'] . "</td></tr>";
            echo "<tr><td>Experiment 10</td>";
            echo "<td>" . $row['ex10'] . "</td></tr>";
            echo "<tr><td>Experiment 11</td>";
            echo "<td>" . $row['ex11'] . "</td></tr>";
            echo "<tr><td>Experiment 12</td>";
            echo "<td>" . $row['ex12'] . "</td></tr>";
            echo "<tr><td>Experiment 13</td>";
            echo "<td>" . $row['ex13'] . "</td></tr>";
            echo "<tr><td>Experiment 14</td>";
            echo "<td>" . $row['ex14'] . "</td></tr>";
            echo "<tr><td>Experiment 15</td>";
            echo "<td>" . $row['ex15'] . "</td></tr>";
            echo "<tr><td>Miniproject(if any)</td>";
            echo "<td>" . $row['mi'] . "</td></tr>";
            echo "</tr>";
          }
        }
      ?>
    </table>
    </div><br>&nbsp
  </body>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
  <script>
    $(document).ready(function() {
      var html = '<tr><td><input class="form-control" type="text" name="rollno" value="<?php echo $txtRollno; ?>"required=""></td><td><input class="form-control" type="text" name="fullname" value="<?php echo $txtFullname; ?>" required=""></td><td><input class="form-control" type="text" name="q1" value="<?php echo $txtQ1; ?>" required=""></td><BR><td><input class="form-control" type="text" name="q2" value="<?php echo $txtQ2; ?>" required=""></td><td><input class="form-control" type="text" name="q3" value="<?php echo $txtQ3; ?>" required=""></td></tr>';
      var x = 1;
      $("#add").click(function() {
        $("#table_field").append(html);
      });
      $("#table_field").on('click', '#remove', function() {
        $(this).closest('tr').remove();
      });
    });
  </script>
</html>