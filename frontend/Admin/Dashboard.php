<?php
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
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="../../css/table5.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<title>Dashboard</title>
	</head>
	<body>
	<?php include("../../assets/headerAdmin.html") ?>
	<center>
      <img src="../../assets/somaiya100.png" class="logo" style="width:100px; height:100px; margin-bottom: 50px; margin-top: 30px">
      <h1 style="margin-bottom: 30px">Attainment of Course Outcome</h1>
      <h3 style="margin-bottom: 50px">Developed by Computer Engineering Department</h3></p>
	  <a href="#" class="link-btn">Add CO</a>
	  <a href="#" class="link-btn">Add LO</a>
	  <a href="#" class="link-btn">Add SO</a>
	  <a href="#" class="link-btn">Add PO</a><br><br>
      <a href="./CreateCourse.php" class="link-btn">Create Course</a>
	  <a href="./AddPattern.php" class="link-btn">Add Pattern</a>
	  <a href="./AddDepartment.php" class="link-btn">Add Department</a>
	  <a href="./AddBt.php" class="link-btn">Add BT</a><br><br>
	  <a href="./ActivateSubAdmin.php" class="link-btn">Activate Sub Admin</a>
	  <a href="./ChangePracticalMarks.php" class="link-btn">Change Practical Marks</a>
    </center>
    <section>
      <div class="footer">
        <center>Guided By: Dr. Namrata Ansari<br> Developed By: Kashyap Kotak, Prince Karania</center>
      </div>
    </section>
</body>
</html>