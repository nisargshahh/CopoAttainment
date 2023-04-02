<?php

	session_start();
	if (isset($_SESSION['uname'])) {
		include('../assets/copo_config.php');
		$batch_id = $_REQUEST['batch_id'];
	
		$marks_array = Array();
		$target_value = 0;
		$marks_id = 0;
		$lower_range = 0;
		$upper_range = 0;
	
		$query2 = "SELECT * FROM ia_mapping WHERE batch_id=$batch_id";
		$result2 = $conn-> query($query2);
		while($row2 = $result2-> fetch_array()) {
			$target_value = $row2[4];
			$lower_range = $row2[5];
			$upper_range = $row2[6];
			$marks_id = $row2[2];
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
	
		$insert_query = "INSERT INTO ia_attainment (batch_id, attainment_level, percentage) VALUES ($batch_id, $attainment, $percentage_upper_count)";
		if($conn-> query($insert_query)) {
			echo "<script>
				alert('Data Inserted Successfully!!');
				window.location.href='../frontend/Teacher/IAAttainment.php';
				</script>";
			die();
		} else {
			echo "<script>
				alert('Some error has occured, please try again!!');
				window.location.href='../frontend/Teacher/IAAttainment.php';
				</script>";
			die();
		}
	} else {
		echo "<script>
            alert('Please Login and then try to access the page!!');
            window.location.href='../';
            </script>";
        die();
	}

?>