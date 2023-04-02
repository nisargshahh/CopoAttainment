<?php
	include('../../assets/copo_config.php');
	session_start();
	if (!isset($_SESSION["uname"])) {
		header("Location: ../Login.php");
	}
	include('../../returning_apis/CheckForAdmin.php');
	$query = "SELECT * FROM teacher WHERE status=1 AND type=0 ";
	$result = $conn-> query($query);
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title>Activate Sub Admin</title>
		<link rel="stylesheet" type="text/css" href="../../css/table.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../../css/table5.css">
	</head>
	<body>
		<?php include('../../assets/headerAdmin.html') ?>
		<center>
		<form action='../../returning_apis/ConvertToAdmin.php' method=POST><br><br>
			<h1>Convert Account to Admin</h1>
			<table>
			<tr><br>
				<th>Check</th>
				<th>Name</th>
				<th>Department</th>
			<tr>
			<?php
				while($row = $result-> fetch_row())
				{
					$query1 = "SELECT dept_name FROM department WHERE dept_id=$row[3]";
					$result1 = $conn-> query($query1);
					$department = "";
					while($row1 = $result1-> fetch_row()) {
						$department = $row1[0];
					}
					echo "<tr>";
					echo "<td><input type='checkbox' name='chk[]' value=".$row[0]."></td>";
					echo "<td>".$row[1]."</td>";
					echo "<td>".$department."</td>";
					echo "</tr>";
				}
			?>
			</table><br>
			<input type="submit" name="submit">
		</form></center>
	</body>
</html>