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
		<form method=POST method="POST" action="../../returning_apis/CreateCourse.php">
			<div class="container">
				<br><h1 class="text-center">Academic Specifications</h1>
				<h4>Enter all your current subject details</h4>
				<?php 
					$query="SELECT * FROM allbatch ORDER BY doc DESC";
					$result=$conn-> query($query);
				?>
				<h5>Course Code: <input class="insert-form" type="text" name="course_code" style="font-size:20px" required></h5>
				<h5>Subject Name: <input class="insert-form" type="text" name="subname" style="font-size:20px" required></h5>

				<h5>Semester: 
					<select class="mySelect" name="semester">
						<option value=0>Select Option</option>
						<option value=1 >SEM I</option>
						<option value=2 >SEM II</option>
						<option value=3 >SEM III</option>
						<option value=4 >SEM IV</option>
						<option value=5 >SEM V</option>
						<option value=6 >SEM VI</option>
						<option value=7 >SEM VII</option>
						<option value=8 >SEM VIII</option>
					</select><br>
				</h5>

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
				<input type="submit" value="Submit">
			</div>
		</form>
	</body>
</html>

