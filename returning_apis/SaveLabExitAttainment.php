<?php

	session_start();
	if (isset($_SESSION['uname'])) {
		include('../assets/copo_config.php');
		$batch_id = $_REQUEST["batch_id"];
		
		$sum_array = Array();
		$attainment_array = Array();
		$lo_list = Array();

		$query3 = "SELECT * FROM lo_list";
		$result3 = $conn-> query($query3);
		while($row3 = $result3-> fetch_array()) {
			$sum_array[$row3[1]] = 0;
			$attainment_array[$row3[1]] = 0;
			array_push($lo_list, $row3[1]);
		}

		$marks_array = Array();
		$marks_id = 0;

		$query2 = "SELECT * FROM lab_exit_mapping WHERE batch_id=$batch_id";
		$result2 = $conn-> query($query2);
		while($row2 = $result2-> fetch_array()) {
			$marks_id = $row2[5];
		}

		$query1 = "SELECT * FROM marks WHERE marks_id=$marks_id";
		$result1 = $conn-> query($query1);
		while($row1 = $result1-> fetch_array()) {
			$marks_array = json_decode($row1[1], true);
		}

		for ($i=0; $i<count($marks_array); $i++) {
			$temp_array = array_values($marks_array[$i]);
			for ($j=0; $j<count($sum_array); $j++) {
				$sum_array[$lo_list[$j]] = $sum_array[$lo_list[$j]] + $temp_array[0][$j];
			}
		}

		for ($j=0; $j<count($sum_array); $j++) {
			$attainment_array[$lo_list[$j]] = (int)($sum_array[$lo_list[$j]]/count($marks_array));
		}

		$attainment_array = json_encode($attainment_array);

		$insert_query = "INSERT INTO lab_exit_attainment (batch_id, attainment_levels) VALUES ($batch_id, '$attainment_array')";
		if ($conn-> query($insert_query)) {
			echo "<script>
				alert('Data Inserted Successfully!!');
				window.location.href='../frontend/Teacher/LabExitAttainment.php';
				</script>";
			die();
		} else {
			echo "<script>
				alert('Some error has occured, please try again!!');
				window.location.href='../frontend/Teacher/LabExitAttainment.php';
				</script>";
			die();
		}
	} else {
		echo "<script>
			alert('Please Login and try to access the page!!');
			window.location.href='../frontend/Login.php';
			</script>";
		die();
	}

?>