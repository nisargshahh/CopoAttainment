<!-- practical -->
<?php
    $batch_id = $_REQUEST['batch_id'];

    $practical_marks = 0;
    $mini_project_marks = 0;
    $target_value = 0;
    $lower_range = 0;
    $upper_range = 0;
    $number_exps = 0;
    $lo_mapped = Array();
    $lo_array = Array();
    $marks_array = Array();
    $marks_id = 0;

    $query3 = "SELECT * FROM practical_marks";
    $result3 = $conn-> query($query3);
    while($row3 = $result3-> fetch_array()) {
        $practical_marks = $row3[1];
    }

    $query1 = "SELECT * FROM practical_mapping WHERE batch_id=$batch_id";
    $result1 = $conn-> query($query1);
    while($row1 = $result1-> fetch_array()) {
        $number_exps = $row1[1];
        $target_value = json_decode($row1[7], true);
        $lower_range = $row1[8];
        $upper_range = $row1[9];
        $lo_mapped = json_decode($row1[2], true);
        $mini_project_marks = $row1[11];
        $marks_id = $row1[10];
    }

    $query = "SELECT * FROM marks WHERE marks_id=$marks_id";
    $result = $conn-> query($query);
    while($row = $result-> fetch_array()) {
        $marks_array = json_decode($row[1], true);
    }


    $final_practical_marks = $practical_marks - $mini_project_marks;

    $los_array = Array();
    $lo_occurance_array = Array();
    $lo_total_marks = Array();
    $lo_attainment_array = Array();

    $query2 = "SELECT * FROM lo_list";
    $result2 = $conn-> query($query2);
    while($row2 = $result2-> fetch_array()) {
        $lo_attainment_array[$row2[1]] = Array(
            'greater_count' => 0,
            'lower_count' => 0,
        );
        $los_array[$row2[1]] = Array();
        $lo_occurance_array[$row2[1]] = 0;
        $lo_total_marks[$row2[1]] = 0;
        array_push($lo_array, $row2[1]);
    }

    $target_value = array_values($target_value);
    $target_value = $target_value[0];

    $temp_array = array_values($lo_mapped);
    $lo_mapped_array = Array();
    $target_lo_value_marks = Array();
    $lo_count_array = Array();

    for($i=0; $i<count($temp_array); $i++) {
        $some_array = array_values($temp_array[$i]);
        array_push($lo_mapped_array, $some_array[0]);
        $target_value_marks = $final_practical_marks/count($some_array[0]);
        array_push($lo_count_array, count($some_array[0]));
        array_push($target_lo_value_marks, $target_value_marks);

        $temp_array2 = Array();
        for ($j=0; $j<count($lo_array); $j++) {
            if(in_array($lo_array[$j], $some_array[0])) {
                $target_marks = ($target_value[$j] * $target_value_marks)/100;
                array_push($los_array[$lo_array[$j]],$target_marks);
                $lo_occurance_array[$lo_array[$j]] = $lo_occurance_array[$lo_array[$j]] + 1;
                $lo_total_marks[$lo_array[$j]] = $lo_total_marks[$lo_array[$j]] + $target_value_marks;
            } else {
                array_push($los_array[$lo_array[$j]],0);
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
            $inidividual_lo_marks = $temp_array1[$j]/$lo_count_array[$j];
            // echo $inidividual_lo_marks."<br>";
            for ($k=0; $k<count($lo_array); $k++) {
                if (in_array($lo_array[$k], $lo_mapped_array[$j])) {
                    if ($inidividual_lo_marks >= $los_array[$lo_array[$k]][$j]) {
                        $lo_attainment_array[$lo_array[$k]]['greater_count'] = $lo_attainment_array[$lo_array[$k]]['greater_count'] + 1;
                    } else {
                        $lo_attainment_array[$lo_array[$k]]['lower_count'] = $lo_attainment_array[$lo_array[$k]]['lower_count'] + 1;
                    }
                }
            }
        }
    }

    for ($j=0; $j<count($lo_attainment_array); $j++) {
        $cal = 0;
        $cal = ($lo_occurance_array[$lo_array[$j]]*count($marks_array)) - $lo_attainment_array[$lo_array[$j]]['greater_count'];
        if (abs($cal)>0) {
            $lo_attainment_array[$lo_array[$j]]['greater_count'] = count($marks_array) - abs($cal);
        } else {
            $lo_attainment_array[$lo_array[$j]]['greater_count'] = count($marks_array);
        }
    }

    // var_dump($lo_attainment_array);

    echo "<tr>";
    for ($j=0; $j<count($lo_array); $j++) {
        echo "<th>";
            echo "<label>LO".($j+1)."</label>";
        echo "</th>";
    }
    echo "</tr>";

    echo "<tr>";
    for ($j=0; $j<count($lo_array); $j++) {

        $percentage = ($lo_attainment_array[$lo_array[$j]]['greater_count']/count($marks_array)) * 100;
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

<!-- orals -->

<?php
  $marks_array = Array();
  $target_value = 0;
  $marks_id = 0;
  $lower_range = 0;
  $upper_range = 0;

  $query2 = "SELECT * FROM oral_mapping WHERE batch_id=$batch_id";
  $result2 = $conn-> query($query2);
  while($row2 = $result2-> fetch_array()) {
    $target_value = $row2[3];
    $lower_range = $row2[4];
    $upper_range = $row2[5];
    $marks_id = $row2[6];
  }

  $query1 = "SELECT * FROM marks WHERE marks_id=$marks_id";
  $result1 = $conn-> query($query1);
  while($row1 = $result1-> fetch_array()) {
    $marks_array = json_decode($row1[1], true);
  }

  $target_marks_value = ($target_value * 25) / 100;

  $upper_count = 0;
  $lower_count = 0;

  $new_marks_array = array_values($marks_array);

  for ($i=0; $i<count($marks_array); $i++) {
    $temp_array = array_values($new_marks_array[$i]);
    // echo $temp_array[0][0]."<br>";
    if ($temp_array[0][0] >= $target_marks_value) {
      $upper_count = $upper_count + 1;
    } else {
      $lower_count = $lower_count + 1;
    }
  }

  $percentage_upper_count = ($upper_count / count($marks_array)) * 100;
  $attainment = 0;

  if ($percentage_upper_count > $upper_range) {
    $attainment = 3;
  } elseif ($percentage_upper_count <= $upper_range && $percentage_upper_count > $lower_range){
    $attainment = 2;
  } else {
    $attainment = 1;
  }
  echo "<tr>";
    echo "<td>Percentage</td>";
    echo "<td>$percentage_upper_count%</td>";
  echo "</tr>";
  echo "<tr>";
    echo "<td>Level</td>";
    echo "<td>$attainment</td>";
  echo "</tr>";
?>