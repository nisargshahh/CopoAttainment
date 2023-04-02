<?php

    session_start();
	if(isset($_POST["uname"])) {
        include ('../assets/copo_config.php');
        $flag = 0;
		$uname=$_POST["uname"];
		$password=$_POST["pwd"];
		$query = "SELECT * FROM teacher";
		$result = $conn-> query($query);
		while ($row = $result-> fetch_array()) {
            if (strcmp($row['teacher_email'], $uname) == 0 && strcmp($row['password'], $password)==0) {
                if (!$row["status"]) {
                    echo "<script>
                        alert('Account is not activated please try contacting admin!!');
                        window.location.href='../frontend/Login.php';
                        </script>";
                    die();
                }
                else {
                    $_SESSION["uname"]=$uname;
                    $_SESSION["uid"] = $row[0];
                    $_SESSION["dept"] = $row[3];
                    header("Location: ../frontend/Teacher/Dashboard.php");
                    $flag = 1;
                    die();
                }
            }
		}
        if ($flag == 0) {
            echo "<script>
                alert('Invalid Username or password!!');
                window.location.href='../frontend/Login.php';
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