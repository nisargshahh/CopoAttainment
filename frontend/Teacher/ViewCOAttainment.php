<?php
    include "../../assets/copo_config.php";
    session_start();
    if (!isset($_SESSION["uname"])) {
        header("Location: ../Login.php");
    }
    // error_reporting(E_ERROR | E_WARNING | E_PARSE);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Levels | CO</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/table5.css">
    </head>
    <body>
        <?php include "../../assets/header.html"; ?>
        <center>
        <div class="container">
            <img src="../../assets/somaiya100.png" class="logo" style="position:absolute; left:20px; top:60px; width:100px; height:100px;">
            <br>
            <h1 class="text-center">CO Attainment Level - </h1>
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
            <table>
                <tr>
                <th>Subject Name</th>
                </tr>
                <tr>
                <td>
                    <?php
                    $batch_id = $_REQUEST['batch_id'];

                    echo "<input type='hidden' name='batch_id' value=$batch_id />";

                    $query = "SELECT * FROM batch WHERE batch_id=$batch_id";
                    $result = $conn-> query($query);
                    if ($row = $result-> fetch_row()) {
                        echo '<label>'.$row[1].'</label>';
                    }
                    ?>
                </td>
                </tr>
            </table><br>
                <table id="customers">
                    <?php
                        $batch_id = $_REQUEST['batch_id'];

                        $co_array = Array();

                        $query2 = "SELECT * FROM co_list";
                        $result2 = $conn-> query($query2);
                        while($row2 = $result2-> fetch_array()) {
                            array_push($co_array, $row2[1]);
                        }

                        echo "<tr>";
                        for ($j=0; $j<count($co_array); $j++) {
                            echo "<th>";
                                echo "<label>CO".($j+1)."</label>";
                            echo "</th>";
                        }
                        echo "</tr>";

                        $attainment_levels = Array();

                        $query1 = "SELECT * FROM co_attainment WHERE batch_id=$batch_id";
                        $result1 = $conn-> query($query1);
                        while($row1 = $result1-> fetch_array()) {
                            $attainment_levels = json_decode($row1[3], true);
                        }


                        echo "<tr>";
                        for ($j=0; $j<count($co_array); $j++) {

                            echo "<td>";
                                echo "<label>" . $attainment_levels[$j] . "</label>";
                            echo "</td>";
                        }
                        echo "</tr>";

                    ?>
                </table>
            </div><br>
            <div>
                <button onClick="window.print()"><b>Print</b></button>
            </div><br><br>
        </div>
    </body>
</html>