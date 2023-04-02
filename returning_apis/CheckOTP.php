<?php
	include("../assets/copo_config.php");

	
	$otp = $_REQUEST['otp'];
	$password = $_REQUEST['password'];
	$user_id = $_REQUEST['uid'];

	$current_time = date("Y-m-d H:i:s");
	$ten_min_time = date("Y-m-d H:i:s", strtotime("-10 minutes"));

	$final_current_time = str_replace(": ", ":", $current_time);
	$final_min_time = str_replace(": ", ":", $ten_min_time);

	$query = "SELECT * FROM otp WHERE teacher_id='$user_id'";
	$result = $conn-> query($query);
	if($row = $result-> fetch_array()) {
		if ($row[2] == $otp) {
			if ($row[3]>$final_min_time) {
				$query2 = "UPDATE teacher SET password='$password' WHERE teacher_id=$user_id";
				if ($conn-> query($query2)) {
					$query3 = "DELETE FROM otp WHERE teacher_id='$user_id'";
					$conn-> query($query3);
					echo "<script>
						alert('Password reset successful!!');
						window.location.href='../';
						</script>";
					die();
				} else {
					$query3 = "DELETE FROM otp WHERE teacher_id='$user_id'";
					$conn-> query($query3);
					echo "<script>
						alert('Some error occured please try again after some time!!');
						window.location.href='../';
						</script>";
					die();
				}
			} else {
				echo "<script>
                    alert('OTP expired please try again later!!');
                    window.location.href='../';
                    </script>";
                die();
			}
		} else {
			$query3 = "DELETE FROM otp WHERE teacher_id='$user_id'";
			$conn-> query($query3);
			echo "<script>
				alert('Invalid OTP please try again later!!');
				window.location.href='../';
				</script>";
			die();
		}
	}
?>