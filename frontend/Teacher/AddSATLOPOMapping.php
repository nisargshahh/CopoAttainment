<?php
  include('../../assets/copo_config.php');
  session_start();
  if (!isset($_SESSION["uname"])) {
    header("Location: ../Login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>CO PO Mapping(Theory)</title>
    <link rel="stylesheet" type="text/css" href="../../css/table5.css">
  </head>
  <body>
    <?php include('../../assets/header.html'); ?>
    <center>
      <form action='../../returning_apis/AddCOPOMapping.php' method=POST>
        <img src="../../assets/somaiya100.png" class="logo" style="position:absolute; left:20px; top:60px; width:100px; height:100px;"><br>
        <h1>Attainment of SAT Lab Outcome</h1>
        <table id="instruction">
          <tr>
            <td>Po & Pso</td>
          </tr>
          <tr>
            <td>
              <ul>
                <li>
                  Po1 - Engineering knowledge:
                  An ability to apply knowledge of mathematics(including probability, statistics and discrete mathematics), science, and engineering for solving Engineering problems and modeling
                </li><br>
                <li>
                  Po2 - Problem analysis:
                  An ability to design, simulate and conduct experiments, as well as to analyze and interpret data including hardware and software components
                </li><br>
                <li>
                  Po3 - Design / development of solutions:
                  An ability to design a complex electronic system or process to meet desired specifications and needs
                </li><br>
                <li>
                  Po4 - Conduct investigations of complex problems:
                  An ability to identify, formulate, comprehend, analyze, design synthesis of the information to solve complex engineering problems and provide valid conclusions.
                </li><br>
                <li>
                  Po5 - Modern tool
                  usage:
                  An ability to use the techniques, skills and modern engineering tools necessary for engineering practice
                </li><br>
                <li>
                  Po6 - The engineer & society:
                  An understanding of professional, health, safety, legal, cultural and social responsibilities
                </li><br>
                <li>
                  Po7 - Environment and sustainability:
                  The broad education necessary to understand the impact of engineering solutions in a global, economic, environmental and demonstrate the knowledge need for sustainable development.
                </li><br>
                <li>
                  Po8 - Ethics:
                  Apply ethical principles, responsibility and norms of the engineering practice
                </li><br>
                <li>
                  Po9 - Individual and team work:
                  An ability to function on multi-disciplinary teams.
                </li><br>
                <li>
                  Po10 - Communication:
                  An ability to communicate and present effectively
                </li><br>
                <li>
                  Po11 - Project management and finance:
                  An ability to use the modern engineering tools, techniques, skills and management principles to do work as a member and leader in a team, to manage projects in multi-disciplinary environments
                </li><br>
                <li>
                  Po12 - Life-long learning:
                  A recognition of the need for, and an ability to engage in, to resolve contemporary issues and acquire lifelong learning
                </li><br>
                <li>
                  PSO1: Decided as per the department
                </li><br>
                <li>
                  PSO2: Decided as per the Department
                </li><br>
                <li>
                  PSO3: Decided as per the department
                </li><br>
              </ul>
            </td>
          </tr>
        </table><br>&nbsp
        <table>
          <tr>
            <th>Select Subject
          </tr>
          </th>
          <tr>
            <td>
              <?php
                $user_id = $_SESSION['uid'];
                $batch_added_array = Array();

                $query1 = "SELECT * FROM sat_lo_mapping";
                $result1 = $conn-> query($query1);
                while($row1 = $result1-> fetch_array()) {
                  array_push($batch_added_array, $row1[6]);
                }

                $query = "SELECT * FROM batch WHERE created_by=$user_id";
                $result = $conn-> query($query);
                echo "<select name='batch_id'>";
                  echo "<option value=0>Select Subject</option>";
                  while ($row = $result-> fetch_array()) {
                    if(!(in_array($row[0], $batch_added_array))) {
                      echo "<option value=" . $row[0] . ">" . $row[1] . "</option>";
                    }
                  }
                echo "</select>";
              ?>
            </td>
          </tr>
        </table><br>
        <table id="customers">
          <tr>
            <th>Course Outcome</th>
            <th>CO Statement</th>
            <th>Hours Alloted</th>
            <?php

              $no_pos = 0;
              $po_names = Array();

              $query = "SELECT * FROM po_list";
              $result = $conn-> query($query);
              while($row = $result-> fetch_array()) {
                $no_pos = $no_pos + 1;
                array_push($po_names, $row[1]);
              }

              for ($i=0; $i<$no_pos; $i++) {
                echo "<th>($po_names[$i])</th>";
              }
            ?>
          </tr>
          <?php

            $so_list = Array();
            $query2 = "SELECT * FROM so_list";
            $result2 = $conn-> query($query2);
            while($row2 = $result2-> fetch_array()) {
              array_push($so_list, $row2[1]);
            }

            for ($k=0; $k<count($so_list); $k++) {
              echo "<tr>";
                echo "<td>";
                  echo $so_list[$k];
                echo "</td>";
                echo "<td>";
                  echo "<input type=text name='$so_list[$k]_so_statement' placeholder='Enter Here' />";
                echo "</td>";
                echo "<td>";
                  echo "<input type=text size=3 name='$so_list[$k]_hours' placeholder='hours' />";
                echo "</td>";
                  for ($i=0; $i<$no_pos; $i++) {
                    echo "<td>";
                      echo "<select name='$so_list[$k]_pos[]'>";
                        echo "<option value=0>Select PO</option>";
                        for ($j=1; $j<=15; $j++) {
                          echo "<option value=$j>$j</option>";
                        }
                      echo "</select>";
                    echo "</td>";
                  }
              echo "</tr>";
            }
          ?>
        </table><br><br>
        <div>
          <button onClick="window.print()"><b>Print</b></button>
          <input type="submit">
        </div><br><br>
      </form>
    </center>
  </body>
</html>