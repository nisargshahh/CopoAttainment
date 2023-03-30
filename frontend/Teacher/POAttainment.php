<?php
	include('../../assets/copo_config.php');
	session_start();
	if (!isset($_SESSION["uname"])) {
		header("Location: ../Login.php");
	}

    $batch_id = $_REQUEST['batch'];
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<title>View PO Attainment</title>
		<link rel="stylesheet" type="text/css" href="../../css/table.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../../css/table5.css">
        <script src='../../js/jquery-min.js'></script>
	</head>
	<body>
		<?php include('../../assets/header.html') ?>
		<center><br><br>
            <!-- <form action='../../returning_apis/DeleteBatch.php' method=POST><br><br> -->
            <h1>PO Attainment</h1>
            <table>
                <tr>
                    <th>Subject Name</th>
                </tr>
                <tr>
                    <td>
                        <?php
                            echo "<input type='hidden' name='batch_id' value=$batch_id />";

                            $get_batch_query = "SELECT * FROM batch WHERE batch_id=$batch_id";
                            $get_batch_result = $conn-> query($get_batch_query);
                            while($get_batch_row = $get_batch_result-> fetch_array()) {
                                $batch_name = $get_batch_row[1];
                            }
                            echo "$batch_name";
                        ?>
                    </td>
                </tr>
            </table><br>
            <table>
            <tr><br>
                <?php
                    $po_list = Array();
                    $batch_name = "";

                    $get_po_query = "SELECT * FROM po_list";
                    $get_po_result = $conn-> query($get_po_query);
                    while($get_po_row = $get_po_result-> fetch_array()) {
                        array_push($po_list, $get_po_row[1]);
                        echo "<th>$get_po_row[1]</th>";
                    }
                ?>
            </tr>
            <?php
                $user_id = $_SESSION['uid'];
            ?>
            </table><br>
            <button onClick="window.print()">
                <b>Print</b>
            </button>
            <!-- </form> -->
        </center>
	</body>
</html>