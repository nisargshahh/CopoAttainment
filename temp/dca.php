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
  <title>Direct Course Attainment</title>
  <meta name="viewport" content="width=device-width, initlvl-scale=1">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/table5.css">
</head>

<body>
  <?php include('../../assets/header.html'); ?>
  <form action='dca.php' method=POST class="insert-form" id="insert_form" method="POST" action="dca.php">
    <div class="container">
      <center><br>
        <h1 class="text-center">Direct Course Attainment</h1><br>
        <table id="instruction">
          <tr>
            <td>Instructions-</td>
          </tr>
          <tr>
            <td>
              <ul>
                <li>Please Print this file for your reference to prevent any further problems</li><br>
            </td>
            </ul>
          </tr>
        </table><br>&nbsp
        <?php
          if (isset($_POST["batch"])) {
            $uu = $_POST["batch"];
        ?>
          <table class="table table-bordered" id="customers">
            <tr>
              <th></th>
              <th>CO1</th>
              <th>CO2</th>
              <th>CO3</th>
              <th>CO4</th>
              <th>CO5</th>
              <th>co6</th>
            </tr>


            <?php //T1 Levels - For CO1
            echo "<tr><td>Test 1</td>";
            $sql = "select ROUND((lvl*0.096),2) from t1final where cos='CO1' and batch='$uu' ";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $a = $row['ROUND((lvl*0.096),2)'];
              echo "<td>" . $a . "</td>";
            }


            $sql = "select ROUND((lvl*0.096),2) from t1final where cos='CO2' and batch='$uu'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $b = $row['ROUND((lvl*0.096),2)'];
              echo "<td>" . $b . "</td>";
            }

            $sql = "select ROUND((lvl*0.096),2) from t1final where cos='CO3' and batch='$uu'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $c = $row['ROUND((lvl*0.096),2)'];
              echo "<td>" . $c . "</td>";
            }
            $sql = "select ROUND((lvl*0.096),2) from t1final where cos='CO4' and batch='$uu'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $d = $row['ROUND((lvl*0.096),2)'];
              echo "<td>" . $d . "</td>";
            }


            $sql = "select ROUND((lvl*0.096),2) from t1final where cos='CO5' and batch='$uu'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $e = $row['ROUND((lvl*0.096),2)'];
              echo "<td>" . $e . "</td>";
            }

            $sql = "select ROUND((lvl*0.096),2) from t1final where cos='CO6' and batch='$uu'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $f = $row['ROUND((lvl*0.096),2)'];
              echo "<td>" . $f . "</td></tr>";
            }

            //T2 Marks
            if ($conn->connect_error)
              die("Connection failed:" . $conn->connect_error);
            echo "<tr><td>Test 2</td>";
            $sql = "select ROUND((lvl*0.096),2) from t2final where cos='CO1' and batch='$uu'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $g = $row['ROUND((lvl*0.096),2)'];
              echo "<td>" . $g . "</td>";
            }


            $sql = "select ROUND((lvl*0.096),2) from t2final where cos='CO2' and batch='$uu'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $h = $row['ROUND((lvl*0.096),2)'];
              echo "<td>" . $h . "</td>";
            }

            $sql = "select ROUND((lvl*0.096),2) from t2final where cos='CO3' and batch='$uu'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $i = $row['ROUND((lvl*0.096),2)'];
              echo "<td>" . $i . "</td>";
            }
            $sql = "select ROUND((lvl*0.096),2) from t2final where cos='CO4' and batch='$uu'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $j = $row['ROUND((lvl*0.096),2)'];
              echo "<td>" . $j . "</td>";
            }


            $sql = "select ROUND((lvl*0.096),2) from t2final where cos='CO5' and batch='$uu'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $k = $row['ROUND((lvl*0.096),2)'];
              echo "<td>" . $k . "</td>";
            }

            $sql = "select ROUND((lvl*0.096),2) from t2final where cos='CO6' and batch='$uu'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $l = $row['ROUND((lvl*0.096),2)'];
              echo "<td>" . $l . "</td></tr>";
            }


            //Course Exit
            echo "<tr><td>Course Exit</td>";
            $sql = "select ROUND((co1l*0.08),2) from ce_total where batch='$uu'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $m = $row['ROUND((co1l*0.08),2)'];
              echo "<td>" . $m . "</td>";
            }


            $sql = "select ROUND((co2l*0.08),2) from ce_total  where batch='$uu'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $n = $row['ROUND((co2l*0.08),2)'];
              echo "<td>" . $n . "</td>";
            }

            $sql = "select ROUND((co3l*0.08),2) from ce_total  where batch='$uu'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $o = $row['ROUND((co3l*0.08),2)'];
              echo "<td>" . $o . "</td>";
            }

            $sql = "select ROUND((co4l*0.08),2) from ce_total  where batch='$uu'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $p = $row['ROUND((co4l*0.08),2)'];
              echo "<td>" . $p . "</td>";
            }

            $sql = "select ROUND((co5l*0.08),2) from ce_total  where batch='$uu'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $q = $row['ROUND((co5l*0.08),2)'];
              echo "<td>" . $q . "</td>";
            }

            $sql = "select ROUND((co6l*0.08),2) from ce_total  where batch='$uu'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $r = $row['ROUND((co6l*0.08),2)'];
              echo "<td>" . $r . "</td></tr>";
            }

            echo "<tr><td>Internal Assessment</td>";
            $sql = "select ROUND((lvl*0.128),2) as s from ia_total where cos='CO1' and batch='$uu'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $s = $row['s'];
              echo "<td>" . $s . "</td>";
            }

            $sql = "select ROUND((lvl*0.128),2) as t from ia_total where cos='CO2' and batch='$uu'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $t = $row['t'];
              echo "<td>" . $t . "</td>";
            }

            $sql = "select ROUND((lvl*0.128),2) as u from ia_total where cos='CO3' and batch='$uu'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $u = $row['u'];
              echo "<td>" . $u . "</td>";
            }

            $sql = "select ROUND((lvl*0.128),2) as v from ia_total where cos='CO4' and batch='$uu'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $v = $row['v'];
              echo "<td>" . $v . "</td>";
            }


            $sql = "select ROUND((lvl*0.128),2) as w from ia_total where cos='CO5' and batch='$uu'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $w = $row['w'];
              echo "<td>" . $w . "</td>";
            }

            $sql = "select ROUND((lvl*0.128),2) as x from ia_total where cos='CO6' and batch='$uu'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $x = $row['x'];
              echo "<td>" . $x . "</td>";
            }



            //ESE Marks
            echo "<tr><td>End Semester Exam</td>";
            $sql = "select ROUND((AVG(lvl)*0.6),2) from esetotal where cos='CO1' and batch='$uu' ";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $c1 = $row['ROUND((AVG(lvl)*0.6),2)'];
              echo "<td>" . $c1 . "</td>";
            }

            $sql = "select ROUND((AVG(lvl)*0.6),2) from esetotal where cos='CO2' and batch='$uu'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $c2 = $row['ROUND((AVG(lvl)*0.6),2)'];
              echo "<td>" . $c2 . "</td>";
            }

            $sql = "select ROUND((AVG(lvl)*0.6),2) from esetotal where cos='CO3' and batch='$uu'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $c3 = $row['ROUND((AVG(lvl)*0.6),2)'];
              echo "<td>" . $c3 . "</td>";
            }

            $sql = "select ROUND((AVG(lvl)*0.6),2) from esetotal where cos='CO4' and batch='$uu'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $c4 = $row['ROUND((AVG(lvl)*0.6),2)'];
              echo "<td>" . $c4 . "</td>";
            }

            $sql = "select ROUND((AVG(lvl)*0.6),2) from esetotal where cos='CO5' and batch='$uu'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $c5 = $row['ROUND((AVG(lvl)*0.6),2)'];
              echo "<td>" . $c5 . "</td>";
            }

            $sql = "select ROUND((AVG(lvl)*0.6),2) from esetotal where cos='CO6' and batch='$uu'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
              $c6 = $row['ROUND((AVG(lvl)*0.6),2)'];
              echo "<td>" . $c6 . "</td>";
            }



            ?>
            <tr>
              <td>Total (in percentage)</td>
              <?php
                $sql = "insert into th_total(uname,t1c1,t1c2,t1c3,t1c4,t1c5,t1c6,t2c1,t2c2,t2c3,t2c4,t2c5,t2c6,cec1,cec2,cec3,cec4,cec5,cec6,iac1,iac2,iac3,iac4,iac5,iac6,ec1,ec2,ec3,ec4,ec5,ec6,batch) VALUES('" . $_SESSION["uname"] . "','$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$u','$v','$w','$x','$c1','$c2','$c3','$c4','$c5','$c6','$uu')";
                $result = mysqli_query($conn, $sql);
                $sql = "Select ROUND((((t1c1+t2c1+cec1+iac1+ec1)/3)*100),2) as total from th_total where uname='" . $_SESSION["uname"] . "' and batch='$uu'";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                  $bb = $row['total'];
                  echo "<td>" . $bb . "</td>";
                }

                $sql = "Select ROUND((((t1c2+t2c2+cec2+iac2+ec2)/3)*100),2) as total2 from th_total where uname='" . $_SESSION["uname"] . "' and batch='$uu'";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                  $cc = $row['total2'];
                  echo "<td>" . $cc . "</td>";
                }
                $sql = "Select ROUND((((t1c3+t2c3+cec3+iac3+ec3)/3)*100),2) as total3 from th_total where uname='" . $_SESSION["uname"] . "' and batch='$uu'";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                  $dd = $row['total3'];
                  echo "<td>" . $dd . "</td>";
                }

                $sql = "Select ROUND((((t1c4+t2c4+cec4+iac4+ec4)/3)*100),2) as total4 from th_total where uname='" . $_SESSION["uname"] . "' and batch='$uu'";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                  $ee = $row['total4'];
                  echo "<td>" . $ee . "</td>";
                }

                $sql = "Select ROUND((((t1c5+t2c5+cec5+iac5+ec5)/3)*100),2) as total5 from th_total where uname='" . $_SESSION["uname"] . "' and batch='$uu'";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                  $ff = $row['total5'];
                  echo "<td>" . $ff . "</td>";
                }

                $sql = "Select ROUND((((t1c6+t2c6+cec6+iac6+ec6)/3)*100),2) as total6 from th_total where uname='" . $_SESSION["uname"] . "' and batch='$uu'";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                  $gg = $row['total6'];
                  echo "<td>" . $gg . "</td></tr>";
                }
                $sql = "insert into thtotal_perc(uname,per1,per2,per3,per4,per5,per6,batch) VALUES('" . $_SESSION["uname"] . "','$bb','$cc','$dd','$ee','$ff','$gg','$uu')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                  echo "<h3>Data entered successfully</h3>";
                } else {
                  echo "Error Entering Data<BR>";
                }
              ?>
          </table><br>&nbsp<br>
          <button onClick="window.print()"><b>Print</b></button>
          <!-- <input type="submit" value="Submit"> -->
          <a href="closure21.php" class="link-btn">Next</a>
        <?php
          } else {
            $sql = "select * from allbatch ORDER BY doc DESC";
            $result = mysqli_query($conn, $sql);
            echo "<center>   <div class=box><div style=border:solid 5px rgb(0, 0, 0); padding:10px; margin-left: auto;margin-right: auto;><form action='dca.php' method=POST><BR><h2>Select Batch</h2><select name=batch></BR>";

            while ($row = mysqli_fetch_assoc($result)) {
              echo "<option value=" . $row["batch"] . ">" . $row["batch"];
            }
            echo "</select><BR>";
            echo "<BR><input type=submit class='button'><BR>&nbsp</form></div></div> </center>";
          }
        ?>
        <br>&nbsp<div class="imgBox">
          <img src="../../assets/theory.jpg">
        </div>
  </form>
  </div><br><br><br>
  </center>
  <br>&nbsp<section>
    <div class="footer">
      <center>Developed By:Electronics and Telecommunication Department.</center>
    </div>
  </section>
</body>

</html>