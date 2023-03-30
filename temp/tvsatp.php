<?php
session_start();
if(!isset($_SESSION["login"])||$_SESSION["login"]==0)
{
	header("Location:Admin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Target Value | SAT Practicals</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="table5.css">
    <style>
      .box
  {
   width:700px;
   border:1px solid #ccc;

   border-radius:5px;
   margin-top:100px;
  }
body {
  background-image: url("image1.png");
    background-size: cover;
    background-color: white;
    margin: 0;
    font-family: Verdana, Helvetica, sans-serif;
    }
    a.link-btn {
        color: #fff;
        background: rgb(161, 43, 43);
        display:inline-block;
        border: 1px solid #2e6da4;        
        font: bold 14px Verdana, sans-serif;
        text-decoration: none;
        border-radius: 5px;
        padding: 6px 15px;
    }
    a.link-btn:hover {
        background-color: #cc1313;
        border-color: #1a3e5b;
    }

  input[type=submit] {
    color: #fff;
        background: rgb(161, 43, 43);
        display:inline-block;
        border: 1px solid #2e6da4;        
        font: bold 14px Verdana, sans-serif;
        text-decoration: none;
        border-radius: 5px;
        padding: 6px 15px;
  cursor: pointer;
}


    input[type=reset], input[type=submit]{
        color: #fff;
        background: rgb(161, 43, 43);
        display:inline-block;
        border: 1px solid #2e6da4;        
        font: bold 14px Verdana, sans-serif;
        text-decoration: none;
        border-radius: 5px;
        padding: 6px 15px;
        cursor: pointer;
}

button{
        color: #fff;
        background: rgb(161, 43, 43);
        display:inline-block;
        border: 1px solid #2e6da4;        
        font: 14px Verdana, sans-serif;
        text-decoration: none;
        border-radius: 5px;
        padding: 6px 15px;
    }
    .navbar {
  overflow: hidden;
  background-color: rgb(161 43 43);
}

.navbar a {
  float: right;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: right;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: rgb(224, 53, 53);
}
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: maroon;
  color: white;
  text-align: center;
  margin-top: -200px;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}

h1 {
  font-size: 45px;
  color: rgb(161 43 43);
}

h3 {
  font-size: 25px;
}
select.mySelect{
    background: #fff;
    color: #black;
    padding: 2 8px;
    font-size: 15px;
    height: 25px;
}
select.mySelect option{
	color: #000;
    padding: 2 8px;
}
div.fixed
	{
		position: fixed;
    font-size:2em;
		bottom: 15px;
		right: 500px;
		color: #0fe00f;
	}
  div.fixed2
	{
		position: fixed;
    font-size:2em;
		bottom: 15px;
		right: 500px;
		color: #cc1313;
	}

</style>
</head>
<div class="navbar">
    <a href="home.php">Home</a>

    <div class="dropdown">
      <button class="dropbtn">Settings
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="myaccount.php">My Account</a>
        <a href="activatesubadmin.php">Activate Sub-admin</a>
        <a href="logout.php">Logout</a>
      </div>
    </div>

    <div class="dropdown">
      <button class="dropbtn">Faculty Management 
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="co1.php">Fill CO PO Mapping</a>
        <a href="closure2.php">Closure of the Quality Loop For Theory</a>
        <a href="thoery_ind.php">CO-PO Mapping - Indirect Course Attainment(through various activities)</a>
        <a href="AddLOPOMapping.php">Fill LO PO Mapping</a>
        <a href="closure.php">Closure of the Quality Loop For Practicals</a>
        <a href="sat.php">Fill LO PO/PSO Mapping for SAT</a>
        <a href="satclosure.php">Closure of the Quality Loop For SAT(IF Skill Based Learning)</a>
        <a href="satclosure2.php">Closure of the Quality Loop For SAT(IF Activity/Technology Based Learning)</a>
      </div>
    </div> 
    <div class="dropdown">
      <button class="dropbtn">SAT Attainment
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="sat_index.php">Fill SAT Marks</a>
        <a href="satend.php">Final SAT Attainment(IF Skill Based Learning)</a>
        <a href="satend2.php">Final SAT Attainment(IF Activity/Technology Based Learning)</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn">Practical Attainment
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="index.php">Fill Practical Marks</a>
        <a href="endprac.php">Final Termwork Attainment(With Continuous Assessment, Orals and Lab exit)</a>
        <a href="casend.php">Final Termwork(With Continuous Assessment and Lab exit)</a>
      </div>
    </div> 

    <div class="dropdown">
      <button class="dropbtn">Theory Attainment
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="t1final.php">Term Test 1 Marks</a>
        <a href="t1cal.php">Term Test 1 Attainment Level</a>
        <a href="t2final.php">Term Test 2 Marks</a>
        <a href="t2cal.php">Term Test 2 Attainment Level</a>
        <a href="ia.php">Internal Assessment Marks</a>
        <a href="iacal.php">Internal Assessment Attainment Level</a>
        <a href="e_index.php">End Semester Examination Marks</a>
        <a href="ese_end.php">End Semester Examination Attainment Level</a>
        <a href="indirect.php">Course Exit</a>
        <a href="cecal.php">Course Exit Attainment Level</a>
        <a href="dca.php">Direct Course Attainment</a>
        <a href="th_index.php">Indirect Course Attainment(through various activities)</a>
      </div>
    </div>
  </div>
</body>
<?php


include('copo_config.php');
if(isset($_POST["batch"]))
{
  $u=$_POST["batch"];
$tv1 = $_POST["tv1"];
$tv2 = $_POST["tv2"];
$tv3 = $_POST["tv3"];
$tv4 = $_POST["tv4"];
$tv5 = $_POST["tv5"];
$tv6 = $_POST["tv6"];
$tv7 = $_POST["tv7"];
$tv8 = $_POST["tv8"];
$tv9 = $_POST["tv9"];
$tv10 = $_POST["tv10"];
$tv11 = $_POST["tv11"];
$tv12 = $_POST["tv12"];
$tv13 = $_POST["tv13"];
$tv14 = $_POST["tv14"];
$tv15 = $_POST["tv15"];
$tvmin = $_POST["tvmin"];

include('copo_config.php');
$sql="update sat_p set tv1='$tv1'/100*25 , tv2='$tv2'/100*25, tv3='$tv3'/100*25, tv4='$tv4'/100*25, tv5='$tv5'/100*25, tv6='$tv6'/100*25, tv7='$tv7'/100*25, tv8='$tv8'/100*25, tv9='$tv9'/100*25, tv10='$tv10'/100*25, tv11='$tv11'/100*25, tv12='$tv12'/100*25,tv13='$tv13'/100*25, tv14='$tv14'/100*25, tv15='$tv15'/100*25, tvmin='$tvmin'/100*25  where uname='".$_SESSION["uname"]."' and batch='$u'  ";
$result=mysqli_query($conn,$sql);
if($result)
{
	echo "<div class=fixed>Data entered successfully</div>";
	
}
else
{
	echo "<div class=fixed>Error Entering Data</div>";
}
    }
?>
<center>
<form action= 'tvsatp.php' method= POST form class="insert-form" id="insert_form" method="POST" action="tvsatp.php">
<div class="container">
<img src="somaiya100.png" class="logo" style = "position:absolute; left:20px; top:60px; width:100px; height:100px;"><br>&nbsp<br>&nbsp
        <h1>Target Value for Practicals</h1>

<table id="instruction">
<tr>
        <td>Instructions-</td>
</tr>
<tr>
        <td>
        <ul>
          <li>You need to select Target value for each Experiment and Miniproject.</li><br>
        <li>The target value is calculated in Percentage. Once selected, the values will remain constant.</li><br>
      </td>
      </ul>
      </tr>
  </table>
  <br>  <table>
    <tr><th>Select Batch</tr></th>
    <tr><td>  <?php
include 'copo_config.php';
        $sql="select * from allbatch ORDER BY doc DESC";
        $result=mysqli_query($conn,$sql);
        echo "<select name=batch>";
        while($row=mysqli_fetch_assoc($result))
        {
            
            echo "<option value=".$row["batch"].">".$row["batch"];
            
        }
        
        echo "</select>";
        
   ?></td></tr></table><br>
  
            <div class="input-field">
            <table id="customers">
    <br>                
    <tr>
        <th></th>
        <th>EXP 1</th>
                        <th>EXP 2</th>
                        <th>EXP 3</th>
                        <th>EXP 4</th>
                        <th>EXP 5</th>
                        <th>EXP 6</th>
                        <th>EXP 7</th>
                        <th>EXP 8</th>
                        <th>EXP 9</th>
                        <th>EXP 10</th>
                        <th>EXP 11</th>
                        <th>EXP 12</th>
                        <th>EXP 13</th>
                        <th>EXP 14</th>
                        <th>EXP 15</th>
                        <th>Miniproject(if any)</th>
    </tr>
    <tr><td>Target Value:</td>
    <td><select name="tv1" class="mySelect">
<option value="40">40
<option value="50">50
<option value="60">60
<option value="70">70
<option value="80">80
<option value="90">90
<option value="100">100
</select><br></td>
    <td><select name="tv2" class="mySelect">
<option value="40">40
<option value="50">50
<option value="60">60
<option value="70">70
<option value="80">80
<option value="90">90
<option value="100">100
</select><br></td>
    <td><select name="tv3" class="mySelect">
<option value="40">40
<option value="50">50
<option value="60">60
<option value="70">70
<option value="80">80
<option value="90">90
<option value="100">100
</select></td>
<td><select name="tv4" class="mySelect">
<option value="40">40
<option value="50">50
<option value="60">60
<option value="70">70
<option value="80">80
<option value="90">90
<option value="100">100
</select><br></td>
<td><select name="tv5" class="mySelect">
<option value="40">40
<option value="50">50
<option value="60">60
<option value="70">70
<option value="80">80
<option value="90">90
<option value="100">100
</select><br></td>
<td><select name="tv6" class="mySelect">
<option value="40">40
<option value="50">50
<option value="60">60
<option value="70">70
<option value="80">80
<option value="90">90
<option value="100">100
</select><br></td>
<td><select name="tv7" class="mySelect">
<option value="40">40
<option value="50">50
<option value="60">60
<option value="70">70
<option value="80">80
<option value="90">90
<option value="100">100
</select><br></td>
<td><select name="tv8" class="mySelect">
<option value="40">40
<option value="50">50
<option value="60">60
<option value="70">70
<option value="80">80
<option value="90">90
<option value="100">100
</select><br></td>
<td><select name="tv9" class="mySelect">
<option value="40">40
<option value="50">50
<option value="60">60
<option value="70">70
<option value="80">80
<option value="90">90
<option value="100">100
</select><br></td>
<td><select name="tv10" class="mySelect">
<option value="40">40
<option value="50">50
<option value="60">60
<option value="70">70
<option value="80">80
<option value="90">90
<option value="100">100
</select><br></td>
<td><select name="tv11" class="mySelect">
<option value="40">40
<option value="50">50
<option value="60">60
<option value="70">70
<option value="80">80
<option value="90">90
<option value="100">100
</select><br></td>
<td><select name="tv12" class="mySelect">
<option value="40">40
<option value="50">50
<option value="60">60
<option value="70">70
<option value="80">80
<option value="90">90
<option value="100">100
</select><br></td>
<td><select name="tv13" class="mySelect">
<option value="40">40
<option value="50">50
<option value="60">60
<option value="70">70
<option value="80">80
<option value="90">90
<option value="100">100
</select><br></td>
<td><select name="tv14" class="mySelect">
<option value="40">40
<option value="50">50
<option value="60">60
<option value="70">70
<option value="80">80
<option value="90">90
<option value="100">100
</select><br></td>
<td><select name="tv15" class="mySelect">
<option value="40">40
<option value="50">50
<option value="60">60
<option value="70">70
<option value="80">80
<option value="90">90
<option value="100">100
</select><br></td>
<td><select name="tvmin" class="mySelect">
<option value="40">40
<option value="50">50
<option value="60">60
<option value="70">70
<option value="80">80
<option value="90">90
<option value="100">100
</select><br></td>
  </tr>
</table>
<br>
<div><button onClick="window.print()"><b>Print</b></button>
<input type="submit" value="Submit">
<a href="satp_lo.php" class="link-btn">Previous</a>
<a href="tvsatr.php" class="link-btn">Next</a>
</div>
<br>


<table id="customers">
            <tr>
                <th>Roll No</th>
                <th>Full Name</th>
                <th>EXP 1</th>
                <th>EXP 2</th>
                <th>EXP 3</th>
                <th>EXP 4</th>
                <th>EXP 5</th>
                <th>EXP 6</th>
                <th>EXP 7</th>
                <th>EXP 8</th>
                <th>EXP 9</th>
                <th>EXP 10</th>
                <th>EXP 11</th>
                <th>EXP 12</th>
                <th>EXP 13</th>
                <th>EXP 14</th>
                <th>EXP 15</th>
                <th>Miniproject(if any)</th>
            </tr>
            <?php
                include('copo_config.php');
                if(isset($_POST["batch"]))
                {
                  $u=$_POST["batch"];
                $select = "SELECT * FROM sat_p where uname='".$_SESSION["uname"]."' and batch='$u' ORDER BY rollno ASC ";
                $result = mysqli_query($conn,"$select");
                while ($row = mysqli_fetch_assoc($result)) { 
                 
            echo "<tr>";
                echo "<td>".$row['rollno']."</td>";
                echo "<td>".$row['fullname']."</td>";
                echo "<td>".$row['exp1']."</td>";
                echo "<td>".$row['exp2']."</td>";
                echo "<td>".$row['exp3']."</td>";
                echo "<td>".$row['exp4']."</td>";
                echo "<td>".$row['exp5']."</td>";
                echo "<td>".$row['exp6']."</td>";
                echo "<td>".$row['exp7']."</td>";
                echo "<td>".$row['exp8']."</td>";
                echo "<td>".$row['exp9']."</td>";
                echo "<td>".$row['exp10']."</td>";
                echo "<td>".$row['exp11']."</td>";
                echo "<td>".$row['exp12']."</td>";
                echo "<td>".$row['exp13']."</td>";
                echo "<td>".$row['exp14']."</td>";
                echo "<td>".$row['exp15']."</td>";
                echo "<td>".$row['mini']."</td>";
            echo "</tr>";
            }
          }  
            ?>
<br>
            </div>
</div>

        </table>
</form>
<br>&nbsp<br>&nbsp<section>
        <div class="footer">
            <center>Developed By:Electronics and Telecommunication Department.</center>
        </div>
    </section>
        </body>
        </html>
