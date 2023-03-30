<?php
    session_start();
    if(isset($_SESSION['uname'])) {
        include '../assets/copo_config.php';
        $created = date("Y-m-d H:i:s");
        if(isset($_POST["department"]))
        {
            $department = $_POST["department"];
            $query = "INSERT INTO department(dept_name) VALUES('$department')";

            if($conn -> query($query)) {
                echo "<script>
                    alert('Data Entered Successfully!!');
                    window.location.href='../frontend/Admin/AddDepartment.php';
                    </script>";
                die();
            }
            else {
                echo "<script>
                    alert('Some error occured, please try again!!');
                    window.location.href='../frontend/Admin/AddDepartment.php';
                    </script>";
                die();
            }
        }
    }
?>