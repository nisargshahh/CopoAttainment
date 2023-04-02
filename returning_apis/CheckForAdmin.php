<?php
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
    session_start();
    if (isset($_SESSION['uname'])) {
        include('../../assets/copo_config.php');
        $user_id = $_SESSION['uid'];

        $query = "SELECT type FROM teacher WHERE teacher_id=$user_id";
        $result = $conn-> query($query);
        while ($row = $result-> fetch_array()) {
            if ($row[0]) {
                // code
            } else {
                echo "<script>
                    alert('Please don't try to access admin pages without rights!!');
                    window.location.href='../Teacher/Dashboard.php';
                    </script>";
                die();
            }
        }
    } else {
        echo "<script>
            alert('Please Login and then try to access the page!!');
            window.location.href='../';
            </script>";
        die();
    }
?>