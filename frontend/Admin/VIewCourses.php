<?php
  include '../../assets/copo_config.php';
  session_start();
  if (!isset($_SESSION["uname"])) {
    header("Location:../Login.php");
  }
  include('../../returning_apis/CheckForAdmin.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>View Courses</title>
    <link rel="icon" href="somaiya.jpg" type="image/jpg">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/table5.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <?php include('../../assets/headerAdmin.html') ?>
    <center><br>
        <h1>Course List For Your Department</h1><br>
    <table>
          <tr><br>
            <th>ID</th>
            <th>Course Name</th>
            <th>Course Code</th>
            <th>Semester</th>
            <th>End Semester Exam Marks</th>
            <th></th>
            <!-- <th>Department</th> -->
          <tr>
          <?php
            $dept = $_SESSION['dept'];
            $query = "SELECT * FROM course WHERE department=$dept";
            $result = $conn-> query($query);
            while($row = $result-> fetch_row())
            {
              echo "<tr>";
              echo "<td>".$row[0]."</td>";
              echo "<td>".$row[1]."</td>";
              echo "<td>".$row[2]."</td>";
              echo "<td>".$row[3]."</td>";
              echo "<td>".$row[4]."</td>";
              echo "<td><form action='../../returning_apis/DeleteCourseAdmin.php' method='POST' ><input type='hidden' name='course_id' value='$row[0]'><input type='submit' name='delete' value='Delete'></form></td>";
              // echo "<td>".$department."</td>";
              echo "</tr>";
            }
          ?>
    </table><br>
    </center>
    </section>
  </body>
  <script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
      arrow[i].addEventListener("click", (e)=>{
    let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
    arrowParent.classList.toggle("showMenu");
      });
    }
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);
    sidebarBtn.addEventListener("click", ()=>{
      sidebar.classList.toggle("close");
    });
  </script>
</html>
