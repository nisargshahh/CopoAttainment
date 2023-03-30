<?php
    include( '../assets/copo_config.php' );

    $date = date("Y-m-d H:i:s");

    if ( isset( $_POST[ 'uname' ] ) ) {
        $uname = $_POST[ 'uname' ];
        $password = $_POST[ 'pwd' ];
        $name = $_POST[ 'name' ];
        $department = $_POST[ 'depart' ];
        $query = "INSERT INTO teacher (teacher_name, teacher_email, dept_id, password, created, type) VALUES ('$name','$uname',$department,'$password','$date',0)";
        if ( $conn-> query($query) ) {
            echo "<script>
                alert('Registration Successfull wait till account is Activated!!');
                window.location.href='../frontend/Login.php';
                </script>";
            die();
        } else {
            echo "<script>
                alert('Some Error occured, please try again!!');
                window.location.href='../frontend/Login.php';
                </script>";
            die();
        }
    } else {
        echo "<script>
            alert('Please enter all fields!!');
            window.location.href='../frontend/Signup.php';
            </script>";
        die();
    }
?>