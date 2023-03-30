<?php
session_start();
if(!isset($_SESSION["login"])||$_SESSION["login"]==0)
{
	header("Location:Admin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<html>
<head>
<title>Closure of Quality Loop for SAT(ABL/TBL)</title>
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
    color: black;
    padding: 28px;
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
        <a href="lo.php">Fill LO PO Mapping</a>
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
        <center><br>
        <h1>Closure of the Quality Loop</h1><br>
        <div class="container">
        <form class="insert-form" id="insert_form" method="POST" action="satclosure2.php">
        <div class="input-field">
        <table>
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
        <table id="customers">
    <tr>
    <th></th>
    <th>AO1/TO1</th>
    <th>AO2/TO2</th>
    <th>AO3/TO3</th>
    <th>AO4/TO4</th>
    <th>AO5/TO5</th>
    <th>AO6/TO6</th>
    </tr>
<?php
include('copo_config.php');
$gout1 = "";
$gout2 = "";
$gout3 = "";
$gout4 = "";
$gout5 = "";
$gout6 = "";

$acout1 = "";
$acout2 = "";
$acout3 = "";
$acout4 ="";
$acout5 = "";
$acout6 = "";

$mout1 = "";
$mout2 = "";
$mout3 = "";
$mout4 = "";
$mout5 = "";
$mout6 = "";
if(isset($_POST["batch"]))
{
$u=$_POST["batch"];
$gout1 = $_POST['gout1'];
$gout2 = $_POST['gout2'];
$gout3 = $_POST['gout3'];
$gout4 = $_POST['gout4'];
$gout5 = $_POST['gout5'];
$gout6 = $_POST['gout6'];

$acout1 = $_POST['acout1'];
$acout2 = $_POST['acout2'];
$acout3 = $_POST['acout3'];
$acout4 = $_POST['acout4'];
$acout5 = $_POST['acout5'];
$acout6 = $_POST['acout6'];

$mout1 = $_POST['mout1'];
$mout2 = $_POST['mout2'];
$mout3 = $_POST['mout3'];
$mout4 = $_POST['mout4'];
$mout5 = $_POST['mout5'];
$mout6 = $_POST['mout6'];
$sql = "insert into sat_closure2(uname,gout1,gout2,gout3,gout4,gout5,gout6,acout1,acout2,acout3,acout4,acout5,acout6,mout1,mout2,mout3,mout4,mout5,mout6,batch) VALUES('".$_SESSION["uname"]."','$gout1','$gout2','$gout3','$gout4','$gout5','$gout6','$acout1','$acout2','$acout3','$acout4','$acout5','$acout6','$mout1','$mout2','$mout3','$mout4','$mout5','$mout6','$u')";
$result=mysqli_query($conn,$sql);

if ($result){
  echo "<div class=fixed>Data entered successfully</div>";

}
else{
  echo "<div class=fixed2>Error entering data</div>";
}

}
    ?>
      

      <tr>
    <td>Gap</td>
    <td><input type=text name='gout1'></td>
    <td><input type=text name='gout2'></td>
    <td><input type=text name='gout3'></td>
    <td><input type=text name='gout4'></td>
    <td><input type=text name='gout5'></td>
    <td><input type=text name='gout6'></td>
    </tr>
<tr>
    <td>Action proposed to bridge the gap</td>
    <td><input type=text name='acout1'></td>
    <td><input type=text name='acout2'></td>
    <td><input type=text name='acout3'></td>
    <td><input type=text name='acout4'></td>
    <td><input type=text name='acout5'></td>
    <td><input type=text name='acout6'></td>
    </tr>

    <tr>
        <td>
            Modify of target where achieved gap
        </td>
        <td><input type=text name='mout1'></td>
        <td><input type=text name='mout2'></td>
        <td><input type=text name='mout3'></td>
        <td><input type=text name='mout4'></td>
        <td><input type=text name='mout5'></td>
        <td><input type=text name='mout6'></td>
    </tr>
    
    </table>
    <center>
        <br>
        <button onClick="window.print()"><b>Print</b></button>
        <input type="submit" value="Submit">
        <a href="satend2.php" class="link-btn">Previous</a>
        <a href="final_sat2.php" class="link-btn">Next</a>
</center>
<br>
        </div>
</form>
</div>
    </form>
    <br>&nbsp<section>
        <div class="footer">
            <center>Developed By:Electronics and Telecommunication Department.</center>
        </div>
    </section>
</body>
</html>