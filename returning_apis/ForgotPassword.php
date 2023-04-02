<?php
    include("../assets/copo_config.php");
    ini_set("SMTP","ssl://smtp.gmail.com");
    ini_set("smtp_port",465);

    function checkOTP($otp, $con) {
		while (true) {
			$query = "SELECT COUNT(id) FROM otp WHERE otp=$otp";
			$result = $con-> query($query);
			$row = $result-> fetch_row();
			if($row[0] > 0) {
				$otp = random_int(100000, 999999);
				checkOTP($otp, $con);
			} else {
				return $otp;
			}
		}
	}

    $otp = random_int(100000, 999999);

    $username = $_REQUEST['uname'];

    $flag = 0;
    $user_id = 0;
    $check_uname_query = "SELECT * FROM teacher";
    $check_uname_result = $conn-> query($check_uname_query);
    while($check_uname_row = $check_uname_result-> fetch_array()) {
        if (strcmp($username, $check_uname_row[2]) == 0) {
            $flag = 1;
            $user_id = $check_uname_row[0];
        }
    }

    if ($flag == 0) {
        echo "<script>
            alert('Invalid username!!');
            window.location.href='../';
            </script>";
        die();
    } else {
        $headers = "From: kjcopo.info@gmail.com";
		$final_otp = checkOTP($otp, $conn);

        $insert_otp_query = "INSERT INTO otp (teacher_id, otp) VALUES ($user_id, $otp)";
        if ($conn-> query($insert_otp_query)) {
            mail($username, "OTP for changing password in COPO app", "Your OTP is $final_otp", $headers);
            // echo "<script>
            //     alert('OTP sent to your mail id, use that to reset your password!!');
            //     window.location.href='../frontend/ResetPassword.php';
            //     </script>";
            // die();
        } else {
            echo "<script>
                alert('Some Error Occured, Please try again!!');
                window.location.href='../';
                </script>";
            die();
        }

    }
?>