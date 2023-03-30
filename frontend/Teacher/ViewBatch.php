<?php
	include('../../assets/copo_config.php');
	session_start();
	if (!isset($_SESSION["uname"])) {
		header("Location: ../Login.php");
	}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title>View Subject</title>
		<link rel="stylesheet" type="text/css" href="../../css/table.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../../css/table5.css">
	</head>
	<body>
		<?php include('../../assets/header.html') ?>
		<center>
		<form action='../../returning_apis/DeleteBatch.php' method=POST><br><br>
			<h1>List of created Batches</h1>
			<table>
			<tr><br>
				<th>Check</th>
				<th>Subject Name</th>
				<th>Course Name</th>
                <th>Course Code</th>
                <th>Academic Year</th>
			<tr>
			<?php
                $user_id = $_SESSION['uid'];
                $query = "SELECT * FROM batch WHERE created_by=$user_id";
                $result = $conn-> query($query);
				while($row = $result-> fetch_row())
				{
					$query1 = "SELECT * FROM course WHERE course_id=$row[5]";
					$result1 = $conn-> query($query1);
					while($row1 = $result1-> fetch_row()) {
                        echo "<tr>";
                        echo "<td><input type='checkbox' name='chk[]' value=".$row[0]."></td>";
                        echo "<td>".$row[1]."</td>";
                        echo "<td>".$row1[1]."</td>";
                        echo "<td>".$row1[2]."</td>";
                        echo "<td>".$row[2]."</td>";
                        echo "</tr>";
                    }
				}
			?>
			</table><br>
			<input type="submit" name="submit" value='Delete' />
		</form></center>
	</body>
</html>