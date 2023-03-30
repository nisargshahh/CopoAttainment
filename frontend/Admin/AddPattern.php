<?php
	include('../../assets/copo_config.php');
	session_start();
	if (!isset($_SESSION["uname"])) {
		header("Location: ../Login.php");
	}
	include('../../returning_apis/CheckForAdmin.php');
?>
<html>
	<head>
		<title>Add Pattern</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src='../../js/jquery-min.js'></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<?php include('../../assets/header.html') ?>
		<center><div class="container box">
			<img src="../../assets/somaiya100.png" class="logo" style = "position:absolute; left:20px; top:60px; width:100px; height:100px;">
			<?php
					$query = "SELECT * FROM test";
					$result = $conn-> query($query);
					echo "<form action='../../returning_apis/AddPattern.php' method=POST enctype=multipart/form-data>";

					echo "<br><label>Select Test: </label><select name='test'>";
						echo "<option value=0>Select Test</option>";
						while($row = $result-> fetch_array()) {
							echo "<option value=$row[0]>$row[1]</option>";
						}
					echo "</select><br>";

					echo "<label>Pattern Name: </label>";
					echo "<input style='margin-top: 30;' type='text' name='pattern_name' id='pattern_name' /><br>";

					echo "<label>Total number of main questions: </label>";
					echo "<input style='margin-top: 30;' type='number' name='no_main_questions' id='no_main_questions' />";

					echo "<div id='newCode'></div>";

					echo "<label>Total Marks: </label>";
					echo "<input style='margin-top: 30;' type='number' name='marks' id='marks' /><br>";
			?>
				<input style='margin-top: 30;' type="submit" name="import" class="button" value="Submit"/>
				<!-- <a href="TargetValue.php" class="link-btn">Next</a>   -->
			</form><br /><br />
		</div>
	</body>
	<script type='text/javascript'>
		$(document).ready(function(){
			$("#no_main_questions").keyup(function() {
				var number_quests = document.getElementById('no_main_questions').value;
				var count = 1;
				var name = "";
				var html = "<div id='newCode'>";
				while(count <= number_quests) {
					html = html + "<label style='margin-top: 30; color: red'>Sub Questions For main Question "+count+": </label>" +
					"<input style='margin-top: 30;' type='number' name='sub_quests_"+count+"' id='sub_quests_"+count+"' /><br>" +
					"<div id='subNewCode"+count+"'></div>" +
					"<label style='margin-top: 30;'>Marks For main Question "+count+": </label>" +
					"<input style='margin-top: 30;' type='number' name='sub_marks[]' /><br>";
					count = count + 1;
				}
				html = html + "</div>";
				for (var i=0; i<number_quests; i++) {
					html = html + "<script>"+
						"$(document).ready(function(){"+
							"$('#sub_quests_"+(i+1)+"').keyup(function(){"+
								"var sub_questions = document.getElementById('sub_quests_"+(i+1)+"').value;"+
								"var sub_count = 1;" +
								"var sub_html = '<div id=\"subNewCode"+(i+1)+"\">';"+
								"while(sub_count<=sub_questions) {" +
									"sub_html = sub_html + '<label style=\"margin-top: 30; color: blue;\">Marks for Sub Question '+sub_count+': </label>';" +
									"sub_html = sub_html + '<input style=\"margin-top: 30;\" type=\"number\" name=\"sub_quests_marks_"+(i+1)+"[]\" id=\"sub_quests_marks_"+(i+1)+"\" /><br>';"+
									"sub_count = sub_count + 1;" +
								"}" +
								"sub_html = sub_html + '</div>';" +
								"$(document.getElementById('subNewCode"+(i+1)+"')).replaceWith(sub_html);" +
							"})"+
						"})";
					html = html + "</scr" +
					"ipt>";
				}
				$(document.getElementById("newCode")).replaceWith(html);
			});
		});
	</script>
</html>
