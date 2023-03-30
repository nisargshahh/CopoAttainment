<?php
    include "../../assets/copo_config.php";
    session_start();
    if (!isset($_SESSION["uname"])) {
        header("Location: ../Login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Levels | Practicals</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/table5.css">
    </head>
    <body>
        <?php include "../../assets/header.html"; ?>
        <center>
        <div class="container">
            <form class="insert-form" id="insert_form" method="POST" action="pcal.php">
                <img src="../../assets/somaiya100.png" class="logo" style="position:absolute; left:20px; top:60px; width:100px; height:100px;">
                <br>
                <h1 class="text-center">Practicals Attainment Level - </h1>
                <?php
                    if (isset($_POST["batch_id"])) {
                        $u = $_POST["batch_id"];
                ?>
                <table id="instruction">
                    <tr>
                        <td>Instructions-</td>
                    </tr>
                    <tr>
                        <td>
                            <ul>
                                <li>Levels of a particular experiments and miniproject are displayed below.</li><br>
                                <li>As per the ranges selected in the previous section, levels are displayed.</li><br>
                            </ul>
                        </td>
                    </tr>
                </table><br>
                <div class="input-field">
                    <form action='pcal.php' method=POST>
                        <table id="customers">
                            <?php
                                $batch_id = $_REQUEST['batch_id'];
                                $no_pracs = 0;
                                $mini_proj = 0;
                                $los = Array();
                                $percentages = Array();
                                $type = 0;
                                $lower_range = 0;
                                $upper_range = 0;

                                echo "<tr>";
                                    echo "<th></th>";
                                    $query = "SELECT * FROM practical_mapping WHERE batch_id=$batch_id";
                                    $result = $conn-> query($query);
                                    while ($row = $result-> fetch_array()) {
                                        $no_pracs = $row[1];
                                        $los = json_decode($row[2], true);
                                        $mini_proj = $row[4];
                                        $type = $row[6];
                                        $percentages = json_decode($row[7], true);
                                        $lower_range = $row[8];
                                        $upper_range = $row[9];
                                    }

                                    // $final_no_pracs = 0;
                                    // if ($mini_proj == 1) {
                                    //     $final_no_pracs = $no_pracs + 1;
                                    // }

                                    for ($i=0; $i<$no_pracs; $i++) {
                                        echo "<th>Exp ".($i+1)."</th>";
                                    }
                                    if ((int)$mini_proj == 1) {
                                        echo "<th>Mini Project</th>";
                                    }
                                echo "</tr>";
                                $sql = "select COUNT(*) from pracs where exp1>=tv1 and uname='" . $_SESSION["uname"] . "'  and batch='$u'";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc1 = $row['COUNT(*)'];
                                }

                                $sql = "select COUNT(*) from pracs where uname='" . $_SESSION["uname"] . "'  and batch='$u'";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc21 = $row['COUNT(*)'];
                                }

                                echo "<tr>";
                                if (isset($abc1, $abc21)) {
                                    $abc3c1 = ($abc1 / $abc21) * 100;
                                    echo "<td>Percentage</td>";
                                    echo "<td>" . $abc3c1 . "</td>";
                                }

                                $sql = "select COUNT(*) from pracs where exp2>=tv2 and uname='" . $_SESSION["uname"] . "' and batch='$u'";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc2 = $row['COUNT(*)'];
                                }

                                $sql = "select COUNT(*) from pracs where uname='" . $_SESSION["uname"] . "'  and batch='$u'";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc22 = $row['COUNT(*)'];
                                }

                                if (isset($abc2, $abc22)) {
                                    $abc3c2 = ($abc2 / $abc22) * 100;
                                    echo "<td>" . $abc3c2 . "</td>";
                                }


                                $sql = "select COUNT(*) from pracs where exp3>=tv3 and uname='" . $_SESSION["uname"] . "' and batch='$u'";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc3 = $row['COUNT(*)'];
                                }

                                $sql = "select COUNT(*) from pracs where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc23 = $row['COUNT(*)'];
                                }

                                if (isset($abc3, $abc23)) {
                                    $abc3c3 = ($abc3 / $abc23) * 100;
                                    echo "<td>" . $abc3c3 . "</td>";
                                }


                                $sql = "select COUNT(*) from pracs where exp4>=tv4 and uname='" . $_SESSION["uname"] . "' and batch='$u'";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc4 = $row['COUNT(*)'];
                                }

                                $sql = "select COUNT(*) from pracs where uname='" . $_SESSION["uname"] . "'  and batch='$u'";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc24 = $row['COUNT(*)'];
                                }

                                if (isset($abc4, $abc24)) {
                                    $abc3c4 = ($abc4 / $abc24) * 100;
                                    echo "<td>" . $abc3c4 . "</td>";
                                }


                                $sql = "select COUNT(*) from pracs where exp5>=tv5 and uname='" . $_SESSION["uname"] . "' and batch='$u'";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc5 = $row['COUNT(*)'];
                                }

                                $sql = "select COUNT(*) from pracs where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc25 = $row['COUNT(*)'];
                                }

                                if (isset($abc5, $abc25)) {
                                    $abc3c5 = ($abc5 / $abc25) * 100;
                                    echo "<td>" . $abc3c5 . "</td>";
                                }


                                $sql = "select COUNT(*) from pracs where exp6>=tv6 and uname='" . $_SESSION["uname"] . "' and batch='$u'";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc6 = $row['COUNT(*)'];
                                }

                                $sql = "select COUNT(*) from pracs where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc26 = $row['COUNT(*)'];
                                }

                                if (isset($abc6, $abc26)) {
                                    $abc3c6 = ($abc6 / $abc26) * 100;
                                    echo "<td>" . $abc3c6 . "</td>";
                                }


                                $sql = "select COUNT(*) from pracs where exp7>=tv7 and uname='" . $_SESSION["uname"] . "' and batch='$u'";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc7 = $row['COUNT(*)'];
                                }

                                $sql = "select COUNT(*) from pracs where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc27 = $row['COUNT(*)'];
                                }

                                if (isset($abc7, $abc27)) {
                                    $abc3c7 = ($abc7 / $abc27) * 100;
                                    echo "<td>" . $abc3c7 . "</td>";
                                }

                                $sql = "select COUNT(*) from pracs where exp8>=tv8 and uname='" . $_SESSION["uname"] . "' and batch='$u'";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc8 = $row['COUNT(*)'];
                                }

                                $sql = "select COUNT(*) from pracs where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc28 = $row['COUNT(*)'];
                                }

                                if (isset($abc8, $abc28)) {
                                    $abc3c8 = ($abc8 / $abc28) * 100;
                                    echo "<td>" . $abc3c8 . "</td>";
                                }

                                $sql = "select COUNT(*) from pracs where exp9>=tv9 and uname='" . $_SESSION["uname"] . "' and batch='$u'";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc9 = $row['COUNT(*)'];
                                }

                                $sql = "select COUNT(*) from pracs where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc29 = $row['COUNT(*)'];
                                }

                                if (isset($abc9, $abc29)) {
                                    $abc3c9 = ($abc9 / $abc29) * 100;
                                    echo "<td>" . $abc3c9 . "</td>";
                                }

                                $sql = "select COUNT(*) from pracs where exp10>=tv10 and uname='" . $_SESSION["uname"] . "' and batch='$u'";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc10 = $row['COUNT(*)'];
                                }

                                $sql = "select COUNT(*) from pracs where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc210 = $row['COUNT(*)'];
                                }

                                if (isset($abc10, $abc210)) {
                                    $abc3c10 = ($abc10 / $abc210) * 100;
                                    echo "<td>" . $abc3c10 . "</td>";
                                }

                                $sql = "select COUNT(*) from pracs where exp11>=tv11 and uname='" . $_SESSION["uname"] . "' and batch='$u'";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc11 = $row['COUNT(*)'];
                                }

                                $sql = "select COUNT(*) from pracs where uname='" . $_SESSION["uname"] . "'  and batch='$u'";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc211 = $row['COUNT(*)'];
                                }

                                if (isset($abc11, $abc211)) {
                                    $abc3c11 = ($abc11 / $abc211) * 100;
                                    echo "<td>" . $abc3c11 . "</td>";
                                }


                                $sql = "select COUNT(*) from pracs where exp12>=tv12 and uname='" . $_SESSION["uname"] . "' and batch='$u'";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc12 = $row['COUNT(*)'];
                                }

                                $sql = "select COUNT(*) from pracs where uname='" . $_SESSION["uname"] . "'  and batch='$u'";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc212 = $row['COUNT(*)'];
                                }

                                if (isset($abc12, $abc212)) {
                                    $abc3c12 = ($abc12 / $abc212) * 100;
                                    echo "<td>" . $abc3c12 . "</td>";
                                }

                                $sql = "select COUNT(*) from pracs where exp13>=tv13 and uname='" . $_SESSION["uname"] . "' and batch='$u'";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc13 = $row['COUNT(*)'];
                                }

                                $sql = "select COUNT(*) from pracs where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc213 = $row['COUNT(*)'];
                                }

                                if (isset($abc13, $abc213)) {
                                    $abc3c13 = ($abc13 / $abc213) * 100;
                                    echo "<td>" . $abc3c13 . "</td>";
                                }

                                $sql = "select COUNT(*) from pracs where exp14>=tv14 and uname='" . $_SESSION["uname"] . "' and batch='$u'";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc14 = $row['COUNT(*)'];
                                }

                                $sql = "select COUNT(*) from pracs where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc214 = $row['COUNT(*)'];
                                }

                                if (isset($abc14, $abc214)) {
                                    $abc3c14 = ($abc14 / $abc214) * 100;
                                    echo "<td>" . $abc3c14 . "</td>";
                                }

                                $sql = "select COUNT(*) from pracs where exp15>=tv15 and uname='" . $_SESSION["uname"] . "' and batch='$u'";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc15 = $row['COUNT(*)'];
                                }

                                $sql = "select COUNT(*) from pracs where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc215 = $row['COUNT(*)'];
                                }

                                if (isset($abc15, $abc215)) {
                                    $abc3c15 = ($abc15 / $abc215) * 100;
                                    echo "<td>" . $abc3c15 . "</td>";
                                }

                                $sql = "select COUNT(*) from pracs where mini>=tvmin and uname='" . $_SESSION["uname"] . "' and batch='$u'";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcm = $row['COUNT(*)'];
                                }

                                $sql = "select COUNT(*) from pracs where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abc2m = $row['COUNT(*)'];
                                }

                                if (isset($abcm, $abc2m)) {
                                    $abc3cm = ($abcm / $abc2m) * 100;
                                    echo "<td>" . $abc3cm . "</td>";
                                }


                                $sql = "update pracs set exp1p='$abc3c1', exp2p='$abc3c2', exp3p='$abc3c3',exp4p='$abc3c4', exp5p='$abc3c5', exp6p='$abc3c6', exp7p='$abc3c7', exp8p='$abc3c8', exp9p='$abc3c9',exp10p='$abc3c10', exp10p='$abc3c10', exp11p='$abc3c11',exp12p='$abc3c12', exp13p='$abc3c13', exp14p='$abc3c14',exp15p='$abc3c15', minip='$abc3cm' where uname='" . $_SESSION["uname"] . "' and batch='$u'";
                                $result = mysqli_query($conn, $sql);

                                echo "<tr><td>Level</td>";
                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";

                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcde = $row['ulp'];
                                }

                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "'  and batch='$u'";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcd2 = $row['llp'];
                                }
                                if ($abc3c1 >= $abcde) {
                                    echo "<td>3</td>";
                                    $sql = "update pracs set exp1l='3' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                    $result = mysqli_query($conn, $sql);
                                } else {
                                    if ($abcde > $abc3c1 && $abc3c1 >= $abcd2) {
                                        echo "<td>2</td>";
                                        $sql = "update pracs set exp1l='2' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                        $result = mysqli_query($conn, $sql);
                                    } else {
                                        if ($abcd2 > $abc3c1 && $abc3c1 > 0) {
                                            echo "<td>1</td>";
                                            $sql = "update pracs set exp1l='1' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                            $result = mysqli_query($conn, $sql);
                                        } else {
                                            if ($abc3c1 == 0) {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As you CO level is 0, your attainment is very low. Please do the needful to increase your attainment</b></p><br>";
                                            } else {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As your percentage is very less, your attainment is very less. Please increase you attainment</b></p>";
                                            }
                                        }
                                    }
                                }

                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcde = $row['ulp'];
                                }

                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcd2 = $row['llp'];
                                }
                                if ($abc3c2 >= $abcde) {
                                    echo "<td>3</td>";
                                    $sql = "update pracs set exp2l='3' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                    $result = mysqli_query($conn, $sql);
                                } else {
                                    if ($abcde > $abc3c2 && $abc3c2 >= $abcd2) {
                                        echo "<td>2</td>";
                                        $sql = "update pracs set exp2l='2' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                        $result = mysqli_query($conn, $sql);
                                    } else {
                                        if ($abcd2 > $abc3c2 && $abc3c2 > 0) {
                                            echo "<td>1</td>";
                                            $sql = "update pracs set exp2l='1' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                            $result = mysqli_query($conn, $sql);
                                        } else {
                                            if ($abc3c2 == 0) {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As you CO level is 0, your attainment is very low. Please do the needful to increase your attainment</b></p><br>";
                                            } else {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As your percentage is very less, your attainment is very less. Please increase you attainment</b></p>";
                                            }
                                        }
                                    }
                                }

                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcde = $row['ulp'];
                                }

                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcd2 = $row['llp'];
                                }
                                if ($abc3c3 >= $abcde) {
                                    echo "<td>3</td>";
                                    $sql = "update pracs set exp3l='3' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                    $result = mysqli_query($conn, $sql);
                                } else {
                                    if ($abcde > $abc3c3 && $abc3c3 >= $abcd2) {
                                        echo "<td>2</td>";
                                        $sql = "update pracs set exp3l='2' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                        $result = mysqli_query($conn, $sql);
                                    } else {
                                        if ($abcd2 > $abc3c3 && $abc3c3 > 0) {
                                            echo "<td>1</td>";
                                            $sql = "update pracs set exp3l='1' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                            $result = mysqli_query($conn, $sql);
                                        } else {
                                            if ($abc3c3 == 0) {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As you CO level is 0, your attainment is very low. Please do the needful to increase your attainment</b></p><br>";
                                            } else {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As your percentage is very less, your attainment is very less. Please increase you attainment</b></p>";
                                            }
                                        }
                                    }
                                }
                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcde = $row['ulp'];
                                }
                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcd2 = $row['llp'];
                                }
                                if ($abc3c4 >= $abcde) {
                                    echo "<td>3</td>";
                                    $sql = "update pracs set exp4l='3' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                    $result = mysqli_query($conn, $sql);
                                } else {
                                    if ($abcde > $abc3c4 && $abc3c4 >= $abcd2) {
                                        echo "<td>2</td>";
                                        $sql = "update pracs set exp4l='2' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                        $result = mysqli_query($conn, $sql);
                                    } else {
                                        if ($abcd2 > $abc3c4 && $abc3c4 > 0) {
                                            echo "<td>1</td>";
                                            $sql = "update pracs set exp4l='1' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                            $result = mysqli_query($conn, $sql);
                                        } else {
                                            if ($abc3c4 == 0) {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As you CO level is 0, your attainment is very low. Please do the needful to increase your attainment</b></p><br>";
                                            } else {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As your percentage is very less, your attainment is very less. Please increase you attainment</b></p>";
                                            }
                                        }
                                    }
                                }

                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcde = $row['ulp'];
                                }

                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcd2 = $row['llp'];
                                }
                                if ($abc3c5 >= $abcde) {
                                    echo "<td>3</td>";
                                    $sql = "update pracs set exp5l='3' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                    $result = mysqli_query($conn, $sql);
                                } else {
                                    if ($abcde > $abc3c5 && $abc3c5 >= $abcd2) {
                                        echo "<td>2</td>";
                                        $sql = "update pracs set exp5l='2' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                        $result = mysqli_query($conn, $sql);
                                    } else {
                                        if ($abcd2 > $abc3c5 && $abc3c5 > 0) {
                                            echo "<td>1</td>";
                                            $sql = "update pracs set exp5l='1' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                            $result = mysqli_query($conn, $sql);
                                        } else {
                                            if ($abc3c5 == 0) {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As you CO level is 0, your attainment is very low. Please do the needful to increase your attainment</b></p><br>";
                                            } else {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As your percentage is very less, your attainment is very less. Please increase you attainment</b></p>";
                                            }
                                        }
                                    }
                                }


                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcde = $row['ulp'];
                                }

                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcd2 = $row['llp'];
                                }
                                if ($abc3c6 >= $abcde) {
                                    echo "<td>3</td>";
                                    $sql = "update pracs set exp6l='3' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                    $result = mysqli_query($conn, $sql);
                                } else {
                                    if ($abcde > $abc3c6 && $abc3c6 >= $abcd2) {
                                        echo "<td>2</td>";
                                        $sql = "update pracs set exp6l='2' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                        $result = mysqli_query($conn, $sql);
                                    } else {
                                        if ($abcd2 > $abc3c6 && $abc3c6 > 0) {
                                            echo "<td>1</td>";
                                            $sql = "update pracs set exp6l='1' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                            $result = mysqli_query($conn, $sql);
                                        } else {
                                            if ($abc3c6 == 0) {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As you CO level is 0, your attainment is very low. Please do the needful to increase your attainment</b></p><br>";
                                            } else {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As your percentage is very less, your attainment is very less. Please increase you attainment</b></p>";
                                            }
                                        }
                                    }
                                }

                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcde = $row['ulp'];
                                }

                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcd2 = $row['llp'];
                                }
                                if ($abc3c7 >= $abcde) {
                                    echo "<td>3</td>";
                                    $sql = "update pracs set exp7l='3' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                    $result = mysqli_query($conn, $sql);
                                } else {
                                    if ($abcde > $abc3c7 && $abc3c7 >= $abcd2) {
                                        echo "<td>2</td>";
                                        $sql = "update pracs set exp7l='2' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                        $result = mysqli_query($conn, $sql);
                                    } else {
                                        if ($abcd2 > $abc3c7 && $abc3c7 > 0) {
                                            echo "<td>1</td>";
                                            $sql = "update pracs set exp7l='1' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                            $result = mysqli_query($conn, $sql);
                                        } else {
                                            if ($abc3c7 == 0) {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As you CO level is 0, your attainment is very low. Please do the needful to increase your attainment</b></p><br>";
                                            } else {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As your percentage is very less, your attainment is very less. Please increase you attainment</b></p>";
                                            }
                                        }
                                    }
                                }
                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcde = $row['ulp'];
                                }

                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcd2 = $row['llp'];
                                }
                                if ($abc3c8 >= $abcde) {
                                    echo "<td>3</td>";
                                    $sql = "update pracs set exp8l='3' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                    $result = mysqli_query($conn, $sql);
                                } else {
                                    if ($abcde > $abc3c8 && $abc3c8 >= $abcd2) {
                                        echo "<td>2</td>";
                                        $sql = "update pracs set exp8l='2' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                        $result = mysqli_query($conn, $sql);
                                    } else {
                                        if ($abcd2 > $abc3c8 && $abc3c8 > 0) {
                                            echo "<td>1</td>";
                                            $sql = "update pracs set exp8l='1' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                            $result = mysqli_query($conn, $sql);
                                        } else {
                                            if ($abc3c8 == 0) {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As you CO level is 0, your attainment is very low. Please do the needful to increase your attainment</b></p><br>";
                                            } else {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As your percentage is very less, your attainment is very less. Please increase you attainment</b></p>";
                                            }
                                        }
                                    }
                                }
                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcde = $row['ulp'];
                                }

                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcd2 = $row['llp'];
                                }
                                if ($abc3c9 >= $abcde) {
                                    echo "<td>3</td>";
                                    $sql = "update pracs set exp9l='3' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                    $result = mysqli_query($conn, $sql);
                                } else {
                                    if ($abcde > $abc3c9 && $abc3c9 >= $abcd2) {
                                        echo "<td>2</td>";
                                        $sql = "update pracs set exp9l='2' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                        $result = mysqli_query($conn, $sql);
                                    } else {
                                        if ($abcd2 > $abc3c9 && $abc3c9 > 0) {
                                            echo "<td>1</td>";
                                            $sql = "update pracs set exp9l='1' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                            $result = mysqli_query($conn, $sql);
                                        } else {
                                            if ($abc3c9 == 0) {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As you CO level is 0, your attainment is very low. Please do the needful to increase your attainment</b></p><br>";
                                            } else {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As your percentage is very less, your attainment is very less. Please increase you attainment</b></p>";
                                            }
                                        }
                                    }
                                }
                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";

                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcde = $row['ulp'];
                                }

                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "'  and batch='$u'";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcd2 = $row['llp'];
                                }
                                if ($abc3c10 >= $abcde) {
                                    echo "<td>3</td>";
                                    $sql = "update pracs set exp10l='3' where uname='" . $_SESSION["uname"] . "'  and batch='$u'";
                                    $result = mysqli_query($conn, $sql);
                                } else {
                                    if ($abcde > $abc3c10 && $abc3c10 >= $abcd2) {
                                        echo "<td>2</td>";
                                        $sql = "update pracs set exp6l='2' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                        $result = mysqli_query($conn, $sql);
                                    } else {
                                        if ($abcd2 > $abc3c10 && $abc3c10 > 0) {
                                            echo "<td>1</td>";
                                            $sql = "update pracs set exp10l='1' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                            $result = mysqli_query($conn, $sql);
                                        } else {
                                            if ($abc3c10 == 0) {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As you CO level is 0, your attainment is very low. Please do the needful to increase your attainment</b></p><br>";
                                            } else {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As your percentage is very less, your attainment is very less. Please increase you attainment</b></p>";
                                            }
                                        }
                                    }
                                }
                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcde = $row['ulp'];
                                }

                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcd2 = $row['llp'];
                                }
                                if ($abc3c11 >= $abcde) {
                                    echo "<td>3</td>";
                                    $sql = "update pracs set exp11l='3' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                    $result = mysqli_query($conn, $sql);
                                } else {
                                    if ($abcde > $abc3c11 && $abc3c11 >= $abcd2) {
                                        echo "<td>2</td>";
                                        $sql = "update pracs set exp11l='2' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                        $result = mysqli_query($conn, $sql);
                                    } else {
                                        if ($abcd2 > $abc3c11 && $abc3c11 > 0) {
                                            echo "<td>1</td>";
                                            $sql = "update pracs set exp11l='1' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                            $result = mysqli_query($conn, $sql);
                                        } else {
                                            if ($abc3c11 == 0) {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As you CO level is 0, your attainment is very low. Please do the needful to increase your attainment</b></p><br>";
                                            } else {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As your percentage is very less, your attainment is very less. Please increase you attainment</b></p>";
                                            }
                                        }
                                    }
                                }
                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcde = $row['ulp'];
                                }

                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcd2 = $row['llp'];
                                }
                                if ($abc3c12 >= $abcde) {
                                    echo "<td>3</td>";
                                    $sql = "update pracs set exp12l='3' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                    $result = mysqli_query($conn, $sql);
                                } else {
                                    if ($abcde > $abc3c12 && $abc3c12 >= $abcd2) {
                                        echo "<td>2</td>";
                                        $sql = "update pracs set exp12l='2' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                        $result = mysqli_query($conn, $sql);
                                    } else {
                                        if ($abcd2 > $abc3c12 && $abc3c12 > 0) {
                                            echo "<td>1</td>";
                                            $sql = "update pracs set exp12l='1' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                            $result = mysqli_query($conn, $sql);
                                        } else {
                                            if ($abc3c12 == 0) {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As you CO level is 0, your attainment is very low. Please do the needful to increase your attainment</b></p><br>";
                                            } else {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As your percentage is very less, your attainment is very less. Please increase you attainment</b></p>";
                                            }
                                        }
                                    }
                                }
                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcde = $row['ulp'];
                                }

                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcd2 = $row['llp'];
                                }
                                if ($abc3c13 >= $abcde) {
                                    echo "<td>3</td>";
                                    $sql = "update pracs set exp13l='3' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                    $result = mysqli_query($conn, $sql);
                                } else {
                                    if ($abcde > $abc3c6 && $abc3c6 >= $abcd2) {
                                        echo "<td>2</td>";
                                        $sql = "update pracs set exp13l='2' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                        $result = mysqli_query($conn, $sql);
                                    } else {
                                        if ($abcd2 > $abc3c13 && $abc3c13 > 0) {
                                            echo "<td>1</td>";
                                            $sql = "update pracs set exp13l='1' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                            $result = mysqli_query($conn, $sql);
                                        } else {
                                            if ($abc3c13 == 0) {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As you CO level is 0, your attainment is very low. Please do the needful to increase your attainment</b></p><br>";
                                            } else {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As your percentage is very less, your attainment is very less. Please increase you attainment</b></p>";
                                            }
                                        }
                                    }
                                }
                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcde = $row['ulp'];
                                }

                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcd2 = $row['llp'];
                                }
                                if ($abc3c14 >= $abcde) {
                                    echo "<td>3</td>";
                                    $sql = "update pracs set exp14l='3' where uname='" . $_SESSION["uname"] . "'  and batch='$u'";
                                    $result = mysqli_query($conn, $sql);
                                } else {
                                    if ($abcde > $abc3c14 && $abc3c14 >= $abcd2) {
                                        echo "<td>2</td>";
                                        $sql = "update pracs set exp14l='2' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                        $result = mysqli_query($conn, $sql);
                                    } else {
                                        if ($abcd2 > $abc3c14 && $abc3c14 > 0) {
                                            echo "<td>1</td>";
                                            $sql = "update pracs set exp14l='1' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                            $result = mysqli_query($conn, $sql);
                                        } else {
                                            if ($abc3c14 == 0) {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As you CO level is 0, your attainment is very low. Please do the needful to increase your attainment</b></p><br>";
                                            } else {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As your percentage is very less, your attainment is very less. Please increase you attainment</b></p>";
                                            }
                                        }
                                    }
                                }
                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u'";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcde = $row['ulp'];
                                }

                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcd2 = $row['llp'];
                                }
                                if ($abc3c15 >= $abcde) {
                                    echo "<td>3</td>";
                                    $sql = "update pracs set exp15l='3' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                    $result = mysqli_query($conn, $sql);
                                } else {
                                    if ($abcde > $abc3c15 && $abc3c15 >= $abcd2) {
                                        echo "<td>2</td>";
                                        $sql = "update pracs set exp15l='2' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                        $result = mysqli_query($conn, $sql);
                                    } else {
                                        if ($abcd2 > $abc3c15 && $abc3c15 > 0) {
                                            echo "<td>1</td>";
                                            $sql = "update pracs set exp15l='1' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                            $result = mysqli_query($conn, $sql);
                                        } else {
                                            if ($abc3c15 == 0) {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As you CO level is 0, your attainment is very low. Please do the needful to increase your attainment</b></p><br>";
                                            } else {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As your percentage is very less, your attainment is very less. Please increase you attainment</b></p>";
                                            }
                                        }
                                    }
                                }
                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcde = $row['ulp'];
                                }

                                $sql = "select * from lvlp where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $abcd2 = $row['llp'];
                                }
                                if ($abc3cm >= $abcde) {
                                    echo "<td>3</td>";
                                    $sql = "update pracs set minil='3' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                    $result = mysqli_query($conn, $sql);
                                } else {
                                    if ($abcde > $abc3cm && $abc3cm >= $abcd2) {
                                        echo "<td>2</td>";
                                        $sql = "update pracs set minil='2' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                        $result = mysqli_query($conn, $sql);
                                    } else {
                                        if ($abcd2 > $abc3cm && $abc3cm > 0) {
                                            echo "<td>1</td>";
                                            $sql = "update pracs set minil='1' where uname='" . $_SESSION["uname"] . "' and batch='$u' ";
                                            $result = mysqli_query($conn, $sql);
                                        } else {
                                            if ($abc3cm == 0) {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As you CO level is 0, your attainment is very low. Please do the needful to increase your attainment</b></p><br>";
                                            } else {
                                                echo "<td>NA</td>";
                                                echo "<p><b>As your percentage is very less, your attainment is very less. Please increase you attainment</b></p>";
                                            }
                                        }
                                    }
                                }
                            ?>
                        </table>
                    </form>
                </div><br>
                <div>
                    <button onClick="window.print()"><b>Print</b></button>
                    <a href="tvpr.php" class="link-btn">Previous</a>
                    <a href="prac_level.php" class="link-btn">Next</a>
                </div><br><br>
                <?php
                    } else {
                        $sql = "select * from allbatch ORDER BY doc DESC";
                        $result = mysqli_query($conn, $sql);
                        echo "<center>   <div class=box><div style=border:solid 5px rgb(0, 0, 0); padding:10px; margin-left: auto;margin-right: auto;><form action='pcal.php' method=POST><BR><h2>Select Batch</h2><select name=batch></BR>";

                        while ($row = mysqli_fetch_assoc($result)) {

                            echo "<option value=" . $row["batch"] . ">" . $row["batch"];
                        }

                        echo "</select><BR>";
                        echo "<BR><input type=submit class='button'><BR>&nbsp</form></div></div> </center>";
                    }
                ?><br>&nbsp<br>&nbsp
            </form>
        </div>
    </body>
</html>