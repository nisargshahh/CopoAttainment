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
  <title>Add BT</title>
    <link rel="icon" href="../../assets/somaiya.jpg" type="image/jpg">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/table5.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>

<body>
  <?php include('../../assets/headerAdmin.html') ?>
  <center>
    <form action= '../../returning_apis/AddBt.php' method= POST>
      <div class=box>
        <div style=border:solid 5px rgb(0, 0, 0); padding:10px; margin-left: auto;margin-right: auto;>
          <h3>Add BT<h3><br>
          <input type=text name=bt placeholder="  Enter new BT" style="width: 25%; height:30px; border: 2px solid #D3D3D3;"/><br>
          <BR><input type=submit class='button'>
        </div>
      </div>
    </form>
    <table>
			<tr><br>
				<th>ID</th>
				<th>Name</th>
				<th></th>
      </tr>
			<tr>
        <?php
          $query = "SELECT * FROM bt ";
          $result = $conn-> query($query);
          while($row = $result-> fetch_row())
          {
            echo "<tr>";
              echo "<td>".$row[0]."</td>";
              echo "<td>".$row[1]."</td>";
              echo "<td><form method='POST' action='../../returning_apis/DeleteBT.php'><input type='submit' name='delete' value='Delete'><input type='hidden' name='delete_bt' value='$row[0]' /></form></td>";
            echo "</tr>";
          }
        ?>
      </tr>
    </table><br>
  </center>
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
</body>
</html>
