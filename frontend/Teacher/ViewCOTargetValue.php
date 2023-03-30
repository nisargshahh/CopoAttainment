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
		<title>View CO Target Value</title>
		<link rel="stylesheet" type="text/css" href="../../css/table.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../../css/table5.css">
        <script src='../../js/jquery-min.js'></script>
	</head>
	<body>
		<?php include('../../assets/header.html') ?>
		<center>
            <form action='../../returning_apis/DeleteBatch.php' method=POST><br><br>
                <h1>Co Target Values Subject Wise</h1>
                <table>
                <tr><br>
                    <th>Check</th>
                    <th>Subject Name</th>
                    <th>Course Name</th>
                    <th>Course Code</th>
                    <th>Academic Year</th>
                    <?php
                        $co_list = Array();

                        $query2 = "SELECT * FROM co_list";
                        $result2 = $conn-> query($query2);
                        while($row2 = $result2-> fetch_array()) {
                            array_push($co_list, $row2[1]);
                            echo "<th>$row2[1]</th>";
                        }
                    ?>
                    <th>Edit</th>
                </tr>
                <?php
                    $user_id = $_SESSION['uid'];
                    $query = "SELECT * FROM batch WHERE created_by=$user_id AND batch_id IN (SELECT batch_id FROM co_target_value)";
                    $result = $conn-> query($query);
                    while($row = $result-> fetch_row())
                    {
                        $query1 = "SELECT * FROM course WHERE course_id=$row[5]";
                        $result1 = $conn-> query($query1);
                        while($row1 = $result1-> fetch_row()) {
                            $query3 = "SELECT * FROM co_target_value WHERE batch_id=$row[0]";
                            $result3 = $conn-> query($query3);
                            while($row3 = $result3->fetch_array()) {
                                echo "<tr>";
                                    echo "<td><input type='checkbox' name='chk[]' value=".$row[0]." /></td>";
                                    echo "<td>".$row[1]."</td>";
                                    echo "<td>".$row1[1]."</td>";
                                    echo "<td>".$row1[2]."</td>";
                                    echo "<td>".$row[2]."</td>";
                                    $target_value = json_decode($row3[1], true);
                                    for ($i=0; $i<count($target_value); $i++) {
                                        echo "<td>".$target_value[$i]."</td>";
                                    }
                                    echo "<td>";
                                        echo "<form></form>";
                                        echo "<form action='./EditCOTargetValue.php' method='POST'>";
                                            echo "<input type='hidden' name='batch_id' value=".$row[0]." />";
                                            echo "<input type='submit' value='Edit'/>";
                                        echo "</form>";
                                    echo "</td>";
                                echo "</tr>";
                            }
                        }
                    }
                ?>
                </table><br>
                <input type="submit" value='Delete' />
            </form>
        </center>
	</body>
    <script>
        $(document).ready(function() {
            $("#edit_button").click(function() {
                var batch_id = document.getElementById("edit_button").value;
                console.log(batch_id);
            });
        });
    </script>
</html>