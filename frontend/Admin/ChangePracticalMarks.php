<?php
  include '../../assets/copo_config.php';
  session_start();
  if (!isset($_SESSION["uname"])) {
    header("Location: ../Login.php");
  }
  include('../../returning_apis/CheckForAdmin.php');
  $query = "SELECT * FROM practical_marks";
  $result = $conn-> query($query);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Change Practical Marks</title>
    <link rel="icon" href="somaiya.jpg" type="image/jpg">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/table5.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <?php include('../../assets/headerAdmin.html') ?>
    <center>
    <form action= '../../returning_apis/ChangePracticalMarks.php' method= POST>
    <div class=box>
      <div style=border:solid 5px rgb(0, 0, 0); padding:10px; margin-left: auto;margin-right: auto;><br>
        <h3>Change Practical Marks<h3><br>
            <input type='text' name='prac_marks' placeholder="Enter Here" style="width: 25%; height:30px; border: 2px solid #D3D3D3;"/><br><br>
            <input type=submit class='button'><br><br>
      </div>
    </div>
    </form>
    <table>
      <tr><br>
        <th>ID</th>
        <th>Marks</th>
        <th>Updated At</th>
      <tr>
      <?php
                
        while($row = $result-> fetch_row())
        {
          echo "<tr>";
          echo "<td>".$row[0]."</td>";
          echo "<td>".$row[1]."</td>";
          echo "<td>".$row[2]."</td>";
          echo "</tr>";
        }
      ?>
    </table><br>
    </center>
    </section>
  </body>
</html>
