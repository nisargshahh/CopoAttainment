<?php
    include "../../assets/copo_config.php";
    session_start();
    if (!isset($_SESSION["uname"])) {
        header("Location: ../Login.php");
    }
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
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
            <img src="../../assets/somaiya100.png" class="logo" style="position:absolute; left:20px; top:60px; width:100px; height:100px;">
            <br>
            <h1 class="text-center">Practicals Attainment Level - </h1>
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
                <table id="customers">
                    <?php
                        $batch_id = $_REQUEST['batch_id'];

                        $practical_marks = 0;
                        $mini_project_marks = 0;
                        $target_value = 0;
                        $lower_range = 0;
                        $upper_range = 0;
                        $number_exps = 0;
                        $so_mapped = Array();
                        $so_array = Array();
                        $marks_array = Array();

                        $query3 = "SELECT * FROM practical_marks";
                        $result3 = $conn-> query($query3);
                        while($row3 = $result3-> fetch_array()) {
                            $practical_marks = $row3[1];
                        }

                        $query = "SELECT * FROM marks WHERE batch_id=$batch_id AND type=4";
                        $result = $conn-> query($query);
                        while($row = $result-> fetch_array()) {
                            $marks_array = json_decode($row[1], true);
                        }

                        $query1 = "SELECT * FROM sat_mapping WHERE batch_id=$batch_id";
                        $result1 = $conn-> query($query1);
                        while($row1 = $result1-> fetch_array()) {
                            $number_exps = $row1[1];
                            $target_value = json_decode($row1[7], true);
                            $lower_range = $row1[8];
                            $upper_range = $row1[9];
                            $so_mapped = json_decode($row1[2], true);
                            $mini_project_marks = $row1[11];
                        }

                        $final_practical_marks = $practical_marks - $mini_project_marks;

                        $los_array = Array(); 
                        $lo_occurance_array = Array();
                        $lo_total_marks = Array();
                        $so_attainment_array = Array();

                        $query2 = "SELECT * FROM so_list";
                        $result2 = $conn-> query($query2);
                        while($row2 = $result2-> fetch_array()) {
                            $so_attainment_array[$row2[1]] = Array(
                                'greater_count' => 0,
                                'lower_count' => 0,
                            );
                            $los_array[$row2[1]] = Array();
                            $lo_occurance_array[$row2[1]] = 0;
                            $lo_total_marks[$row2[1]] = 0;
                            array_push($so_array, $row2[1]);
                        }

                        $target_value = array_values($target_value);
                        $target_value = $target_value[0];

                        $temp_array = array_values($so_mapped);
                        $so_mapped_array = Array();
                        $target_lo_value_marks = Array();
                        $lo_count_array = Array();

                        for($i=0; $i<count($temp_array); $i++) {
                            $some_array = array_values($temp_array[$i]);
                            array_push($so_mapped_array, $some_array);
                            $target_value_marks = $final_practical_marks/count($some_array);
                            array_push($lo_count_array, count($some_array));
                            array_push($target_lo_value_marks, $target_value_marks);

                            $temp_array2 = Array();
                            for ($j=0; $j<count($so_array); $j++) {
                                if(in_array($so_array[$j], $some_array)) {
                                    $target_marks = ($target_value[$j] * $target_value_marks)/100;
                                    array_push($los_array[$so_array[$j]],$target_marks);
                                    $lo_occurance_array[$so_array[$j]] = $lo_occurance_array[$so_array[$j]] + 1;
                                    $lo_total_marks[$so_array[$j]] = $lo_total_marks[$so_array[$j]] + $target_value_marks;
                                }
                            }
                        }


                        $lo_value_student = Array();
                        $temp_array1 = Array();
                        $attainment_array = Array();
                        for ($i=0; $i<count($marks_array); $i++) {
                            $temp_array1 = array_values($marks_array[$i]);
                            $temp_array1 = $temp_array1[0];
                            for ($j=0; $j<$number_exps; $j++) {
                                $individual_lo_marks = $temp_array1[$j]/$lo_count_array[$j];
                                for ($k=0; $k<count($so_array); $k++) {
                                    // echo var_dump($so_mapped_array[$j])."<br>";
                                    if (in_array($so_array[$k], $so_mapped_array[$j])) {
                                        // echo "inside if";
                                        if ($individual_lo_marks >= $los_array[$so_array[$k]][$j]) {
                                            $so_attainment_array[$so_array[$k]]['greater_count'] = $so_attainment_array[$so_array[$k]]['greater_count'] + 1;
                                        } else {
                                            $so_attainment_array[$so_array[$k]]['lower_count'] = $so_attainment_array[$so_array[$k]]['lower_count'] + 1;
                                        }
                                    }
                                }
                            }
                        }

                        for ($j=0; $j<count($so_attainment_array); $j++) {
                            $cal = 0;
                            $cal = $so_attainment_array[$so_array[$j]]['greater_count'] - ($lo_occurance_array[$so_array[$j]]*count($marks_array));
                            if (abs($cal)>0) {
                                $so_attainment_array[$so_array[$j]]['greater_count'] = count($marks_array) - abs($cal);
                            } else {
                                $so_attainment_array[$so_array[$j]]['greater_count'] = count($marks_array);
                            }
                        }

                        // var_dump($so_attainment_array);
                        echo "<tr>";
                        for ($j=0; $j<count($so_array); $j++) {
                            echo "<th>";
                                echo "<label>LO".($j+1)."</label>";
                            echo "</th>";
                        }
                        echo "</tr>";

                        echo "<tr>";
                        for ($j=0; $j<count($so_array); $j++) {

                            $percentage = ($so_attainment_array[$so_array[$j]]['greater_count']/count($marks_array)) * 100;
                            $attainment_level = 0;

                            if ($percentage >= (int)$upper_range) {
                                $attainment_level = 3;
                            } elseif($percentage >= (int)$lower_range && $percentage < (int)$upper_range) {
                                $attainment_level = 2;
                            } else {
                                $attainment_level = 1;
                            }

                            echo "<td>";
                                echo "<label>".$attainment_level."</label>";
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