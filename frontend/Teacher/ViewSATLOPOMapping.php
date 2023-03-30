<?php
  include('../../assets/copo_config.php');
  session_start();
  if (!isset($_SESSION["uname"])) {
    header("Location: ../Login.php");
  }
?>


<html>
  <head>
    <title>SAT LO - PO ATTAINMENT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/table5.css">
    <script src='https://unpkg.com/axios/dist/axios.min.js'></script>
  </head>
  <body>
    <?php include('../../assets/header.html') ?>
    <center>
      <!-- <form class="insert-form" id="insert_form" method="POST" action="ViewCOPOMapping"> -->
      <img src="../../assets/somaiya100.png" class="logo" style="position:absolute; left:20px; top:60px; width:100px; height:100px;"> <br>
      <h1>SAT LO - PO ATTAINMENT</h1><br>

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
              $batch_id = $_REQUEST['batch'];

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
            echo "<th>Statement</th>";
            echo "<th>Course Outcome</th>";
            echo "<th>Hours Alloted</th>";
            echo "<th>POS & PSO Selected</th>";
            $query3 = "SELECT * FROM po_list";
            $result3 = $conn-> query($query3);
            while($row3 = $result3-> fetch_array()) {
              echo "<th>$row3[1]</th>";
              array_push($po_list, $row3[1]);
            }
            echo "<th>Edit</th>";
          echo "</tr>";

          $query = "SELECT * FROM sat_lo_mapping where batch_id=$batch_id";
          $result = $conn-> query($query);

          while ($row = $result-> fetch_array()) {

            $po_selected_list = json_decode($row[4], true);
            $po_hours_list = json_decode($row[5], true);
            echo "<tr>";
              echo "<td>" . $row[2] . "</td>";

              $so_name = "";

              $query1 = "SELECT * FROM so_list WHERE so_id=$row[1]";
              $result1 = $conn-> query($query1);
              while($row1 = $result1-> fetch_array()) {
                $so_name = $row1[1];
              }

              echo "<td>" . $so_name . "</td>";
              echo "<td>" . $row[3] . "</td>";
              
              echo "<td>$row[4]</td>"; 
              $count = 0;
              for ($i=0; $i<count($po_list); $i++) {
                if (in_array($po_list[$i], $po_selected_list)) {
                  echo "<td>$po_hours_list[$count] hours</td>";
                  $count = $count + 1;
                } else {
                  echo "<td>-</td>";
                }
              }
              echo "<td><button>Edit</button></td>";
              echo "</center>";
            echo "</tr>";
          }
        ?><br>
      </table>
      <div>
        <button onClick="window.print()"><b>Print</b></button>
        <!-- <a href="pofinal.php" class="link-btn">Next</a> -->
      </div><br>
    </center>
  </body>
</html>