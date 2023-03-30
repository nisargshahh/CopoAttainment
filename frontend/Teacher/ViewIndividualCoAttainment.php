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
                        $pattern_id = $_REQUEST['patterns'];
                        $marks_id = 0;

                        $lower_range = 0;
                        $upper_range = 0;
                        $number_quests = 0;
                        $co_mapped = Array();
                        $lo_array = Array();
                        $marks_array = Array();

                        $total_main_marks_array = Array();
                        $total_sub_marks_array = Array();
                        $query = "SELECT * FROM pattern WHERE pattern_id=$pattern_id";
                        $result = $conn-> query($query);
                        while($row = $result-> fetch_array()) {
                            $total_main_marks_array = json_decode($row[4], true);
                            $total_sub_marks_array = json_decode($row[6], true);
                        }

                        $query1 = "SELECT * FROM marks WHERE batch_id=$batch_id AND type=1 AND pattern_id=$pattern_id";
                        $result1 = $conn-> query($query1);
                        while($row1 = $result1-> fetch_array()) {
                            $marks_array = json_decode($row1[1], true);
                            $marks_id = $row1[0];
                        }

                        $query2 = "SELECT * FROM test_mapping WHERE batch_id=$batch_id AND marks_id=$marks_id";
                        $result2 = $conn-> query($query2);
                        while($row2 = $result2-> fetch_array()) {
                            $lower_range = json_decode($row2[3], true);
                            $upper_range = json_decode($row2[4], true);
                            $co_mapped = json_decode($row2[1], true);
                        }

                        $co_percentage_mapping_array = Array();
                        $attainment_level_array = Array();
                        $co_array = Array();

                        $query3 = "SELECT * FROM co_list";
                        $result3 = $conn-> query($query3);
                        while($row3 = $result3-> fetch_array()) {
                            array_push($co_array, $row3[1]);
                            array_push($co_percentage_mapping_array, 0);
                            array_push($attainment_level_array, 0);
                        }

                        $target_value = Array();

                        $query4 = "SELECT * FROM co_target_value WHERE batch_id=$batch_id";
                        $result4 = $conn-> query($query4);
                        while($row4 = $result4-> fetch_array()) {
                            $target_value = json_decode($row4[1], true);
                        }

                        $temp_array = $co_mapped['cos'];
                        $target_value_marks = Array();

                        for($i=0; $i<count($total_main_marks_array); $i++) {
                            if ($total_sub_marks_array[$i] == 0) {
                                $target_marks = ((int)$total_main_marks_array[$i]*$target_value[((int)$temp_array[$i] - 1)])/100;
                                array_push($target_value_marks, $target_marks);
                                $number_quests = $number_quests + 1;
                            } else {
                                for ($j=0; $j<count($total_sub_marks_array[$i]); $j++) {
                                    $target_marks = ($total_sub_marks_array[$i][$j]*$target_value[((int)$temp_array[$i] - 1)])/100;
                                    array_push($target_value_marks, $target_marks);
                                    $number_quests = $number_quests + 1;
                                }
                            }
                        }

                        $marks_temp_array = Array();
                        $attainment_array = Array();

                        $quests_greater_array = [0,0,0,0];
                        $quests_lower_array = [0,0,0,0];

                        for ($i=0; $i<count($marks_array); $i++) {
                            $marks_temp_array = array_values($marks_array[$i])[0];
                            for ($j=0; $j<$number_quests; $j++) {
                                if ($marks_temp_array[$j]>$target_value_marks[$j]) {
                                    $quests_greater_array[$j] = $quests_greater_array[$j] + 1;
                                } else {
                                    $quests_lower_array[$j] = $quests_lower_array[$j] + 1;
                                }
                            }
                        }

                        $quests_percentage_array = Array();
                        $attainment_level = 0;

                        $upper_range = array_values($upper_range)[0];
                        $lower_range = array_values($lower_range)[0];

                        for ($k=0; $k<$number_quests; $k++) {
                            $percentage = ($quests_greater_array[$k]/count($marks_array)) * 100;

                            if ($percentage >= (int)$upper_range[$k]) {
                                $attainment_level = 3;
                            } elseif($percentage >= (int)$lower_range && $percentage < (int)$upper_range) {
                                $attainment_level = 2;
                            } else {
                                $attainment_level = 1;
                            }

                            if ($co_percentage_mapping_array[((int)$temp_array[$k] - 1)] == 0) {
                                $co_percentage_mapping_array[((int)$temp_array[$k] - 1)] = round($percentage, 1);
                                $attainment_level_array[((int)$temp_array[$k] - 1)] = $attainment_level;
                            } else {
                                $co_percentage_mapping_array[((int)$temp_array[$k] - 1)] = round((($co_percentage_mapping_array[((int)$temp_array[$k] - 1)] + $percentage) / 2), 1);
                                $attainment_level_array[((int)$temp_array[$k] - 1)] = round(($attainment_level_array[((int)$temp_array[$k] - 1)] + $attainment_level)/2, 1);
                            }
                            array_push($quests_percentage_array, round($percentage, 1));
                        }

                        echo "<tr>";
                        for ($j=0; $j<count($co_array); $j++) {
                            echo "<th>";
                                echo "<label>CO".($j+1)."</label>";
                            echo "</th>";
                        }
                        echo "</tr>";


                        echo "<tr>";
                        for ($j=0; $j<count($co_array); $j++) {

                            echo "<td>";
                                echo "<label>" . $attainment_level_array[$j] . "</label>";
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