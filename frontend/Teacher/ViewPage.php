<?php
	session_start();
	if(!isset($_SESSION["uname"])) {
		header("Location: ../Login.php");
	}
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
	<?php include("../../assets/header.html") ?>
	<center>
        <img src="../../assets/somaiya100.png" class="logo" style="width:100px; height:100px; margin-bottom: 50px; margin-top: 30px;">
        <h3>Theory</h3><br>
        <a href="./ViewCOTargetValue.php" class="link-btn" >View Target Value of CO for Subject</a>
        <a href="./TestTargetValue.php" class="link-btn" >View Target Value for Subject</a>
        <a href="./COAttainmentIndex.php" class="link-btn" >CO Attainment Level</a><br><br>
        <a href="./ViewIndividualTargetValueIndex.php" class="link-btn" >View Target Value of Individual Test</a>
        <a href="./IAAttainment.php" class="link-btn" >View IA Attainment</a>
        <a href="./CourseExitAttainment.php" class="link-btn" >Course Exit Attainment Level</a>
        <a href="./COAttainmentIndividual.php" class="link-btn" >Individual CO Attainment Level</a><br><br>
        <h3>Practical</h3><br>
        <a href="./PracticalAttainment.php" class="link-btn" >Practical Attainment</a>
        <a href="./OralsAttainment.php" class="link-btn" >Orals Attainment</a>
        <a href="./LabExitAttainment.php" class="link-btn" >Lab Exit Attainment</a><br><br>
        <!-- <a href="./ChangePracticalMarks.php" class="link-btn">Change Practical Marks</a>
        <a href="./ViewCourses.php" class="link-btn">View Courses</a>
        <a href="./ViewBatches.php" class="link-btn">View Batches</a> -->
    </center>
    <section>
      <div class="footer">
        <center>Guided By: Dr. Namrata Ansari<br> Developed By: Kashyap Kotak, Prince Karania</center>
      </div>
    </section>
</body>
</html>