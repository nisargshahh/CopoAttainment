<?php
	include('../../assets/copo_config.php');

	session_start();
	if(!isset($_SESSION["uname"]))
	{
		header("Location: ../Login.php");
	}
	$batch_id = $_REQUEST['batch_id'];
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Target Value CO</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../../css/table5.css">
		<script src='../../js/jquery-min.js'></script>
	</head>
	<body><center>
		<?php include('../../assets/header.html'); ?>
		<form action='../../returning_apis/EditCOTargetValue.php' method= POST form class="insert-form" id="insert_form" method="POST" action="tv.php">
			<div class="container">
				<img src="../../assets/somaiya100.png" class="logo" style = "position:absolute; left:20px; top:60px; width:100px; height:100px;"><br>
				<h1 class="text-center">SELECT C0, BT Level & Target Value</h1>
				<div class="input-field">
					<table id="instruction">
						<tr>
							<td>Instructions-</td>
						</tr>
						<tr>
							<td>
								<ul>
									<li>You need to select CO, BT level and Target value for each question.</li><br>
									<li>The target value is calculated in Percentage. Once selected, the values will remain constant.</li><br>
									<li>Each question may or may not have the same CO's.</li><br>
									<li>Levels can be determined by upper and lower ranges.</li><br>
									<li>The minimum range cannot be less than 40.</li><br>
									<li>If the selected value is greater than upper range, it will be addressed as Level 3.</li><br>
									<li>If the selected value lies between the upper range and the lower range, it will be addressed as Level 2.</li><br>
									<li>If the selected value is less than lower range, it will be addressed as Level 1.</li><br>
								</ul>
							</td>
						</tr>
					</table><br>
					<table>
						<tr>
							<th>
								Subject Name
							</th>
						</tr>
						<tr>
							<td>
								<?php
									$user_id = $_SESSION['uid'];

									$query2 = "SELECT batch_name FROM batch WHERE batch_id=$batch_id";
									$result2 = $conn-> query($query2);
									if($row2 = $result2-> fetch_array())
									{
										echo $row2[0];
									}
									echo "<input type='hidden' name='batch_id' id='batch_id' value=$batch_id />";
								?>
							</td>
						</tr>
					</table><br>
				</div>
			</div>
			<div class="container">
				<div class="input-field">
					<table id="customers"><br>
						<?php
							$co_list = Array();
							$query3 = "SELECT * FROM co_list";
							$result3 = $conn-> query($query3);
							while($row3 = $result3-> fetch_array()) {
								array_push($co_list, $row3[1]);
							}
							echo "<tr>";
							echo "<th></th>";
							for ($i=0; $i<count($co_list); $i++) {
								echo "<th>".$co_list[$i]."</th>";
							}
							echo "</tr>";
							$get_value_query = "SELECT * FROM co_target_value WHERE batch_id=$batch_id";
							$get_result = $conn-> query($get_value_query);
							while($row = $get_result-> fetch_array()) {
								$co_array = json_decode($row[1], true);
								echo "<tr>";
									echo "<td>Target Value in Percentage:</td>";
									for ($i=0; $i<count($co_list); $i++) {
										echo "<td>";
											echo "<select name='target_value[]' id='target_value'>";
												echo "<option value=0>Select Percentage</option>";
												for ($j=40; $j<=100; $j+=10){
														if ($co_array[$i] == $j) {
															echo "<option value=$j selected>$j%</option>";
														} else {
															echo "<option value=$j>$j%</option>";
														}
												}
											echo "</select>";
										echo "</td>";
									}
								echo "</tr>";
							}
						?>
					</table><br>
					<input type='hidden' name='co_array[]' value=0 id='co_array' />
					<div>
						<input type="submit" value="Submit">
						<!-- <a href="TargetValueRangeSelection.php" class="link-btn">Next</a> -->
					</div>
				</div><br>
			</div>
		</form><br>&nbsp
	</body>
</html>
