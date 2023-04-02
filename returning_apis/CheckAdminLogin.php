<?php
    session_start();
	if(isset($_POST["uname"])) {
        include ('../assets/copo_config.php');
        $flag = 0;
		$uname = $_REQUEST["uname"];
		$password = $_REQUEST["pwd"];
		$query = "SELECT * FROM teacher";
		$result = $conn-> query($query);
		while ($row = $result-> fetch_array()) {
            if (strcmp($row['teacher_email'], $uname) == 0 && strcmp($row['password'], $password)==0) {
                if ($row['type']) {
                    $_SESSION["uname"]=$uname;
                    $_SESSION["uid"] = $row[0];
                    $_SESSION["dept"] = $row[3];
                    header("Location: ../frontend/Admin/Dashboard.php");
                    die();
                } else {
                    echo "<script>
                        alert('Please don't try to access admin pages without rights!!');
                        window.location.href='../';
                        </script>";
                    die();
                }
            } else {
                echo "<script>
                    alert('Invalid Username or password!!');
                    window.location.href='../';
                    </script>";
                die();
            }
		}
	} else {
        echo "<script>
            alert('Please enter Username and then try to login!!');
            window.location.href='../';
            </script>";
        die();
    }
?>