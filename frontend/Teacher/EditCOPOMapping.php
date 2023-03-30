<?php
	include('../../assets/copo_config.php');
	session_start();
	if (!isset($_SESSION["uname"])) {
		header("Location: ../Login.php");
	}
?>


<html>
	<head>
		<title>CO - PO ATTAINMENT</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../../css/table5.css">
        <script type='text/javascript' src='../../js/jquery-min.js'></script>
		<script src='https://unpkg.com/axios/dist/axios.min.js'></script>
	</head>
	<body>
		<?php include('../../assets/header.html') ?>
		<center>
			<form action="../../returning_apis/EditCOPOMapping.php" class="edit_from" id="insert_form" method="POST">
                <img src="../../assets/somaiya100.png" class="logo" style="position:absolute; left:20px; top:60px; width:100px; height:100px;"> <br>
                <h1>LO - PO ATTAINMENT</h1><br>

                <table id="instruction">
                    <tr>
                        <td>Instructions-</td>
                    </tr>
                    <tr>
                        <td>
                            <ul>
                                <li>Course outcome, Statements, PO's-PSO's and Hours are displayed below.</li><br>
                                <li>As per the ranges selected in the previous section, levels are displayed.</li><br>
                                <li>Addition of the lecture hours will be displayed in hours column.</li><br>
                        </td>
                        </ul>
                    </tr>
                </table>
                <table>
                    <tr>
                        <th>
                            Subject Name
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <?php
                                $batch_id = $_REQUEST['batch_id'];
                                $co_id = $_REQUEST['co_value'];

                                echo "<input type='hidden' name='batch_id' value=$batch_id />";
                                echo "<input type='hidden' name='co_id' value=$co_id />";

                                $query2 = "SELECT batch_name FROM batch WHERE batch_id=$batch_id";
                                $result2 = $conn-> query($query2);
                                if($row2 = $result2-> fetch_array())
                                {
                                    echo $row2[0];
                                }
                            ?>
                        </td>
                    </tr>
                </table>
                <table id="customers">
                    <?php
                        $po_list = Array();
                        echo "<tr>";
                            echo "<th>Course Outcome</th>";
                            echo "<th>Statement</th>";
                            echo "<th>Hours Alloted</th>";
                            $query3 = "SELECT * FROM po_list";
                            $result3 = $conn-> query($query3);
                            while($row3 = $result3-> fetch_array()) {
                                echo "<th>$row3[1]</th>";
                                array_push($po_list, $row3[1]);
                            }
                        echo "</tr>";

                        $query = "SELECT * FROM co_mapping where batch_id=$batch_id AND co_id=$co_id";
                        $result = $conn-> query($query);

                        while ($row = $result-> fetch_array()) {

                            $po_selected_list = json_decode($row[4], true);
                            $po_hours_list = json_decode($row[5], true);
                            echo "<tr>";
                                $co_name = "";

                                $query1 = "SELECT * FROM co_list WHERE co_id=$row[1]";
                                $result1 = $conn-> query($query1);
                                while($row1 = $result1-> fetch_array()) {
                                    $co_name = $row1[1];
                                }

                                echo "<td>$co_name</td>";
                                echo "<td><input type='text' name='co_name' placeholder=".$row[2]." /></td>";
                                echo "<td><input type='text' name='hours' id='hours' placeholder=".$row[3]." /></td>";
                                
                                $count = 0;
                                for ($i=0; $i<count($po_list); $i++) {
                                    echo "<td><select name='co_pos[]' >";
                                        echo "<option value=0>Select PO</option>";
                                        if (in_array($po_list[$i], $po_selected_list)) {
                                            for ($j=1; $j<=15; $j++) {
                                                if ($po_hours_list[$count] == $j) {
                                                    echo "<option value=$j selected>$j</option>";
                                                } else {
                                                    echo "<option value=$j>$j</option>";
                                                }
                                            }
                                        } else {
                                            for ($j=1; $j<=15; $j++) {
                                                echo "<option value=$j>$j</option>";
                                            }
                                        }
                                    echo "</select></td>";
                                    $count = $count + 1;
                                }
                                echo "</center>";
                            echo "</tr>";
                        }
                    ?>
                </table>
                <div>
                    <!-- <a href="pofinal.php" class="link-btn">Next</a> -->
                    <input type="submit" value="Submit">
                </div><br>
            </form>
		</center>
	</body>
    <script>
        $(document).ready(function(){
            $("#hours").blur(function() {
                console.log(document.getElementById("hours").value);
            })
            $("#edit_form").submit(function(event){
                var hours = document.getElementById("hours").value;
                var sum = 0;
                if (hours === "") {
                    // code
                } else {
                    $("select[name='co_pos[]']").each(function () {
                        sum = sum + parseInt(this.value);
                    });
                    console.log(hours+"="+sum)
                    if (parseInt(hours) !== sum) {
                        alert('Please select po hours equal to total number of hours!!');
                        event.preventDefault();
                    }
                }
            })
        })
    </script>
</html>