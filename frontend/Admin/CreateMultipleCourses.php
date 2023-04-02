<?php
	include("../../assets/copo_config.php");
	session_start();
	if(!isset($_SESSION["uname"])) {
		header("Location: ../Login.php");
	}
	include('../../returning_apis/CheckForAdmin.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Create Course</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<?php include('../../assets/headerAdmin.html') ?>
		<center>
		<form method=POST method="POST" action="../../returning_apis/ImportSubjects.php" enctype='multipart/form-data'>
			<div class="container">
				<div class="box" style=border:solid black>
					<BR><label><h3>Select Excel File</h3></label>
					<input type="file" name="excel" /><br />&nbsp<br>
					<h5>Department: 
						<select class="mySelect" name="department">
						<?php
							$sql = 'select * from department';
							$result = mysqli_query( $conn, $sql );
							while( $row = mysqli_fetch_assoc( $result ) ) 
							{
								echo '<option value='.$row[ 'dept_id' ].'>'.$row[ 'dept_name' ];
							}
						?>
						</select><br>
					</h5>
					<h5>Marks of End Semester Exam:
						<input type="radio" name="esem" value=45>45 Marks
						<input type="radio" name="esem" value=60>60 Marks
					</h5>
					<input type="submit" name="import" class="button" value="Import" /><br><br><br>
				</div>
			</div>
		</form>
	</body>
</html>

