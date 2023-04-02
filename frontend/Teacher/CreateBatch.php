<?php
  include '../../assets/copo_config.php';

  session_start();
  if (!isset($_SESSION["uname"]))
  {
    header("Location:../Login.php");
  }
  $dept = $_SESSION['dept'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Create Subject</title>
    <link rel="icon" href="../../assets/somaiya.jpg" type="image/jpg">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>

  <body>
    <?php include('../../assets/header.html');?>
    <center>
    <form action='../../returning_apis/AddBatch.php' method= POST>
    <div class=box>
      <div style=border:solid 5px rgb(0, 0, 0); padding:10px; margin-left: auto;margin-right: auto;>
        <h3>Enter a new Subject(e.g:-EDC:2016-2020):<h3>
          <label>Select Course :</label>
          <select name='course_id'>
            <option value=0>Select Course</option>
            <?php
            if($dept==5){
              $sql = "SELECT * FROM course WHERE semester=1 OR semester=2";
            }
            else{
              $sql = "SELECT * FROM course WHERE department=$dept";
            }
              $result = mysqli_query( $conn, $sql );
              while( $row = mysqli_fetch_array( $result ) ) 
              {
                echo '<option value='.$row[0].'>'.$row[1].'</option>';
              }
            ?>
          </select><br><br>
          <label>Select Academic Year :</label>
          <select name='ay'>
            <option value=0>Select AY</option>
            <?php
              $min_year = 2010;
              $date = date("Y");
              while( $min_year <= $date ) 
              {
                $next_year = $min_year + 1;
                echo "<option value='".$min_year.' - '.$next_year."'>".$min_year." - ".$next_year."</option>";
                $min_year +=1;
              }
            ?>
          </select><br>
          <input type='hidden' name='uid' value=<?php echo $_SESSION['uid']; ?> />
          <br><input type=submit class='button'>
        </div>
      </div>
    </form>
    </center>
  </body>
</html>
