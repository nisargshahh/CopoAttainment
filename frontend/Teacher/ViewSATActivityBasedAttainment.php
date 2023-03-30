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
                        $target_value = 0;
                        $lower_range = 0;
                        $upper_range = 0;
                        $number_exps = 0;
                        $aoto_mapped = Array();
                        $aoto_array = Array();
                        $marks_array = Array();

                        $query3 = "SELECT * FROM practical_marks";
                        $result3 = $conn-> query($query3);
                        while($row3 = $result3-> fetch_array()) {
                            $practical_marks = $row3[1];
                        }

                        $query = "SELECT * FROM marks WHERE batch_id=$batch_id AND type=5";
                        $result = $conn-> query($query);
                        while($row = $result-> fetch_array()) {
                            $marks_array = json_decode($row[1], true);
                        }
                        // echo var_dump(array_values($marks_array[0])[0][0])."<br>";
                        
                        $number_of_students = count($marks_array);

                        $new_marks_array = Array();

                        $sum = 0;

                        
                        
                        $query1 = "SELECT * FROM sat_mapping WHERE batch_id=$batch_id";
                        $result1 = $conn-> query($query1);
                        while($row1 = $result1-> fetch_array()) {
                            $target_value = json_decode($row1[7], true);
                            $lower_range = $row1[8];
                            $upper_range = $row1[9];
                            $aoto_mapped = json_decode($row1[2], true);
                        }

                        
                        $aoto_mapped_count = count($aoto_mapped);
                        echo $aoto_mapped_count;
                        $aoto_marks_calculated = Array();
                        
                        for ($x = 0; $x < $number_of_students; $x++){
                            $val = array_values($marks_array[$x])[0][0]/$aoto_mapped_count."<br>";
                            array_push($new_marks_array,$val);
                        }

                        // echo var_dump($new_marks_array)."<br>";

                        $aotos_array = Array();
                        $aoto_occurance_array = Array();
                        $aoto_total_marks = Array();
                        $aoto_attainment_array = Array();

                        $query2 = "SELECT * FROM aoto_list";
                        $result2 = $conn-> query($query2);
                        while($row2 = $result2-> fetch_array()) {
                            $aoto_attainment_array[$row2[1]] = Array(
                                'greater_count' => 0,
                                'lower_count' => 0,
                            );
                            $aotos_array[$row2[1]] = Array();
                            $aoto_occurance_array[$row2[1]] = 0;
                            $aoto_total_marks[$row2[1]] = 0;
                            array_push($aoto_array, $row2[1]);
                        }
                        
                    ?>
                </table>
            </div><br>
            <div>
                <button onClick="window.print()"><b>Print</b></button>
            </div><br><br>
        </div>
    </body>
</html>