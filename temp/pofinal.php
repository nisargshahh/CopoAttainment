<?php
include('../../assets/copo_config.php');
session_start();
if (!isset($_SESSION["uname"])) {
    header("Location: ../Login.php");
}
?>
<html>

<head>
    <title>PO/PSO Mapping - Theory(Direct)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/table5.css">
    <link rel="stylesheet" type="text/css" href="../../css/table.css">
</head>

<body>
    <?php include('../../assets/header.html'); ?>
    <center>
        <form action='pofinal.php' method=POST>
            <img src="../../assets/somaiya100.png" class="logo" style="position:absolute; left:20px; top:60px; width:100px; height:100px;">
            <h1>PO/PSO Mapping</h1>
            <table>
                <tr>
                    <td>INSTRUCTIONS</td>
                </tr>

                <tr>
                    <td><b>A simple method is to relate the level of PO with the number of hours devoted to the Cos which address the given PO.</b></td>
                </tr>
                <tr>
                    <td><b>
                <tr>
                    <td><b>If >40% of classroom sessions/tutorials/lab hours addressing a particular PO, it is considered that PO is addressed at Level 3.</b></td>
                </tr>
                <tr>
                    <td><b>If 25 to 40% of classroom sessions addressing a particular PO, it is considered that PO is addressed at Level 2.</b></td>
                </tr>
                <tr>
                    <td><b>If 5 to 25% of classroom sessions addressing a particular PO, it is considered that PO is addressed at Level 1.</b></td>
                </tr>
                <tr>
                    <td><b>If < 5% of classroom sessions TPO Particular PO, it is considered that PO is not-addressed.</b>
                    </td>
                </tr>
            </table>
            <br>&nbsp
            <?php
                $user_id = $_SESSION['uid'];
                if (isset($_POST["batch"])) {
                    $u = $_POST["batch"];
            ?>
            <table id="customers">
                <tr>
                    <th>Course C302</th>
                    <th>PO1</th>
                    <th>PO2</th>
                    <th>PO3</th>
                    <th>PO4</th>
                    <th>PO5</th>
                    <th>PO6</th>
                    <th>PO7</th>
                    <th>PO8</th>
                    <th>PO9</th>
                    <th>PO10</th>
                    <th>PO11</th>
                    <th>PO12</th>
                    <th>PSO1</th>
                    <th>PSO2</th>
                    <th>PSO3</th>
                </tr>
                <tr>
                    <?php
                        $sql = "SELECT SUM(po1) FROM `general2` WHERE uname='" . $_SESSION["uname"] . "' and batch='$u'  ";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo "<td><b>Strength of Mapping</b></td><td>";
                        if ($row['SUM(po1)'] >= 16.8) {
                            echo "3";
                        } else {
                            if ($row['SUM(po1)'] >= 10.5) {
                                echo "2";
                            } else {
                                if ($row['SUM(po1)'] >= 2.1) {
                                    echo "1";
                                } else {
                                    if (2.1 > $row['SUM(po1)']) {
                                        echo "0";
                                    }
                                }
                            }
                        }
                        echo "</td>";

                        $sql = "SELECT SUM(po2) FROM `general2` WHERE uname='" . $_SESSION["uname"] . "'  and batch='$u' ";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo "<td>";
                        if ($row['SUM(po2)'] >= 16.8) {
                            echo "3";
                        } else {
                            if ($row['SUM(po2)'] >= 10.5) {
                                echo "2";
                            } else {
                                if ($row['SUM(po2)'] >= 2.1) {
                                    echo "1";
                                } else {
                                    if (2.1 > $row['SUM(po2)']) {
                                        echo "0";
                                    }
                                }
                            }
                        }
                        echo "</td>";

                        $sql = "SELECT SUM(po3) FROM `general2` WHERE uname='" . $_SESSION["uname"] . "'  and batch='$u' ";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo "<td>";
                        if ($row['SUM(po3)'] >= 16.8) {
                            echo "3";
                        } else {
                            if ($row['SUM(po3)'] >= 10.5) {
                                echo "2";
                            } else {
                                if ($row['SUM(po3)'] >= 2.1) {
                                    echo "1";
                                } else {
                                    if (2.1 > $row['SUM(po3)']) {
                                        echo "0";
                                    }
                                }
                            }
                        }
                        echo "</td>";

                        $sql = "SELECT SUM(po4) FROM `general2` WHERE uname='" . $_SESSION["uname"] . "'  and batch='$u' ";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo "<td>";
                        if ($row['SUM(po4)'] >= 16.8) {
                            echo "3";
                        } else {
                            if ($row['SUM(po4)'] >= 10.5) {
                                echo "2";
                            } else {
                                if ($row['SUM(po4)'] >= 2.1) {
                                    echo "1";
                                } else {
                                    if (2.1 > $row['SUM(po4)']) {
                                        echo "0";
                                    }
                                }
                            }
                        }
                        echo "</td>";

                        $sql = "SELECT SUM(po5) FROM `general2` WHERE uname='" . $_SESSION["uname"] . "'  and batch='$u' ";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo "<td>";
                        if ($row['SUM(po5)'] >= 16.8) {
                            echo "3";
                        } else {
                            if ($row['SUM(po5)'] >= 10.5) {
                                echo "2";
                            } else {
                                if ($row['SUM(po5)'] >= 2.1) {
                                    echo "1";
                                } else {
                                    if (2.1 > $row['SUM(po5)']) {
                                        echo "0";
                                    }
                                }
                            }
                        }
                        echo "</td>";

                        $sql = "SELECT SUM(po6) FROM `general2` WHERE uname='" . $_SESSION["uname"] . "'  and batch='$u' ";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo "<td>";
                        if ($row['SUM(po6)'] >= 16.8) {
                            echo "3";
                        } else {
                            if ($row['SUM(po6)'] >= 10.5) {
                                echo "2";
                            } else {
                                if ($row['SUM(po6)'] >= 2.1) {
                                    echo "1";
                                } else {
                                    if (2.1 > $row['SUM(po6)']) {
                                        echo "0";
                                    }
                                }
                            }
                        }
                        echo "</td>";

                        $sql = "SELECT SUM(po7) FROM `general2` WHERE uname='" . $_SESSION["uname"] . "'  and batch='$u' ";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo "<td>";
                        if ($row['SUM(po7)'] >= 16.8) {
                            echo "3";
                        } else {
                            if ($row['SUM(po7)'] >= 10.5) {
                                echo "2";
                            } else {
                                if ($row['SUM(po7)'] >= 2.1) {
                                    echo "1";
                                } else {
                                    if (2.1 > $row['SUM(po7)']) {
                                        echo "0";
                                    }
                                }
                            }
                        }
                        echo "</td>";

                        $sql = "SELECT SUM(po8) FROM `general2` WHERE uname='" . $_SESSION["uname"] . "'  and batch='$u' ";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo "<td>";
                        if ($row['SUM(po8)'] >= 16.8) {
                            echo "3";
                        } else {
                            if ($row['SUM(po8)'] >= 10.5) {
                                echo "2";
                            } else {
                                if ($row['SUM(po8)'] >= 2.1) {
                                    echo "1";
                                } else {
                                    if (2.1 > $row['SUM(po8)']) {
                                        echo "0";
                                    }
                                }
                            }
                        }
                        echo "</td>";

                        $sql = "SELECT SUM(po9) FROM `general2` WHERE uname='" . $_SESSION["uname"] . "'  and batch='$u' ";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo "<td>";
                        if ($row['SUM(po9)'] >= 16.8) {
                            echo "3";
                        } else {
                            if ($row['SUM(po9)'] >= 10.5) {
                                echo "2";
                            } else {
                                if ($row['SUM(po9)'] >= 2.1) {
                                    echo "1";
                                } else {
                                    if (2.1 > $row['SUM(po9)']) {
                                        echo "0";
                                    }
                                }
                            }
                        }
                        echo "</td>";

                        $sql = "SELECT SUM(po10) FROM `general2` WHERE uname='" . $_SESSION["uname"] . "'  and batch='$u' ";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo "<td>";
                        if ($row['SUM(po10)'] >= 16.8) {
                            echo "3";
                        } else {
                            if ($row['SUM(po10)'] >= 10.5) {
                                echo "2";
                            } else {
                                if ($row['SUM(po10)'] >= 2.1) {
                                    echo "1";
                                } else {
                                    if (2.1 > $row['SUM(po10)']) {
                                        echo "0";
                                    }
                                }
                            }
                        }
                        echo "</td>";

                        $sql = "SELECT SUM(po11) FROM `general2` WHERE uname='" . $_SESSION["uname"] . "'  and batch='$u' ";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo "<td>";
                        if ($row['SUM(po11)'] >= 16.8) {
                            echo "3";
                        } else {
                            if ($row['SUM(po11)'] >= 10.5) {
                                echo "2";
                            } else {
                                if ($row['SUM(po11)'] >= 2.1) {
                                    echo "1";
                                } else {
                                    if (2.1 > $row['SUM(po11)']) {
                                        echo "0";
                                    }
                                }
                            }
                        }
                        echo "</td>";

                        $sql = "SELECT SUM(po12) FROM `general2` WHERE uname='" . $_SESSION["uname"] . "'  and batch='$u' ";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo "<td>";
                        if ($row['SUM(po12)'] >= 16.8) {
                            echo "3";
                        } else {
                            if ($row['SUM(po12)'] >= 10.5) {
                                echo "2";
                            } else {
                                if ($row['SUM(po12)'] >= 2.1) {
                                    echo "1";
                                } else {
                                    if (2.1 > $row['SUM(po12)']) {
                                        echo "0";
                                    }
                                }
                            }
                        }
                        echo "</td>";

                        $sql = "SELECT SUM(pso1) FROM `general2` WHERE uname='" . $_SESSION["uname"] . "'  and batch='$u' ";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo "<td>";
                        if ($row['SUM(pso1)'] >= 16.8) {
                            echo "3";
                        } else {
                            if ($row['SUM(pso1)'] >= 10.5) {
                                echo "2";
                            } else {
                                if ($row['SUM(pso1)'] >= 2.1) {
                                    echo "1";
                                } else {
                                    if (2.1 > $row['SUM(pso1)']) {
                                        echo "0";
                                    }
                                }
                            }
                        }
                        echo "</td>";

                        $sql = "SELECT SUM(pso2) FROM `general2` WHERE uname='" . $_SESSION["uname"] . "'  and batch='$u' ";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo "<td>";
                        if ($row['SUM(pso2)'] >= 16.8) {
                            echo "3";
                        } else {
                            if ($row['SUM(pso2)'] >= 10.5) {
                                echo "2";
                            } else {
                                if ($row['SUM(pso2)'] >= 2.1) {
                                    echo "1";
                                } else {
                                    if (2.1 > $row['SUM(pso2)']) {
                                        echo "0";
                                    }
                                }
                            }
                        }
                        echo "</td>";

                        $sql = "SELECT SUM(pso3) FROM `general2` WHERE uname='" . $_SESSION["uname"] . "'  and batch='$u' ";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        echo "<td>";
                        if ($row['SUM(pso3)'] >= 16.8) {
                            echo "3";
                        } else {
                            if ($row['SUM(pso3)'] >= 10.5) {
                                echo "2";
                            } else {
                                if ($row['SUM(pso3)'] >= 2.1) {
                                    echo "1";
                                } else {
                                    if (2.1 > $row['SUM(pso3)']) {
                                        echo "0";
                                    }
                                }
                            }
                        }
                        echo "</td>";
                    ?>
                </tr>
            </table>
            <center><br>
                <div>
                    <button onClick="window.print()"><b>Print</b></button>
                    <input type="reset" value="Reset">
                    <a href="indirect.php" class="link-btn">Next(Course Exit)</a>
                <?php
                    } else {
                        $query = "SELECT * FROM batch WHERE created_by=$user_id";
                        $result = $conn-> query($query);
                        echo "<center><div class=box><div style=border:solid 5px rgb(0, 0, 0); padding:10px; margin-left: auto;margin-right: auto;><form action='pofinal.php' method=POST><BR><h2>Select Batch</h2><br><select name=batch>";
                        echo "<option value=0>Select Batch</option>";
                        while ($row = $result-> fetch_array()) {
                            echo "<option value=" . $row[0] . ">" . $row[1] . "</option>";
                        }
                        echo "</select><BR>";
                        echo "<BR><input type=submit class='button'><BR>&nbsp</form></div></div> </center>";
                    }
                ?>
            </center>
        </form>
    </body>
</html>