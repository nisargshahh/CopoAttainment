<?php

	session_start();
	if (isset($_SESSION['uname'])) {
		include('../assets/copo_config.php');

		$batch_id = $_REQUEST["batch_id"];
        $marks_id = $_REQUEST['marks_id'];
		
		$sum_array = Array();
		$attainment_array = Array();
		$co_list = Array();

		$query3 = "SELECT * FROM co_list";
		$result3 = $conn-> query($query3);
		while($row3 = $result3-> fetch_array()) {
			$sum_array[$row3[1]] = 0;
			$attainment_array[$row3[1]] = 0;
			array_push($co_list, $row3[1]);
		}

		$marks_array = Array();

		$query1 = "SELECT * FROM marks WHERE marks_id=$marks_id";
		$result1 = $conn-> query($query1);
		while($row1 = $result1-> fetch_array()) {
			$marks_array = json_decode($row1[1], true);
		}

		for ($i=0; $i<count($marks_array); $i++) {
			$temp_array = array_values($marks_array[$i]);
			for ($j=0; $j<count($sum_array); $j++) {
				$sum_array[$co_list[$j]] = $sum_array[$co_list[$j]] + $temp_array[0][$j];
			}
		}

		for ($j=0; $j<count($sum_array); $j++) {
			$attainment_array[$co_list[$j]] = (int)($sum_array[$co_list[$j]]/count($marks_array));
		}

		$attainment_array = json_encode($attainment_array);

		$insert_query = "INSERT INTO course_exit_attainment (batch_id, attainment_levels) VALUES ($batch_id, '$attainment_array')";
		if ($conn-> query($insert_query)) {
			echo "<script>
				alert('Data Inserted Successfully!!');
				window.location.href='../frontend/Teacher/CourseExitAttainment.php';
				</script>";
			die();
		} else {
			echo "<script>
				alert('Some error has occured, please try again!!');
				window.location.href='../frontend/Teacher/CourseExitAttainment.php';
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