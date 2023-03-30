<?php
    session_start();
    $_SESSION['uname'] = "";
    $_SESSION['uid'] = "";
    session_destroy();
    header('Location: ../Login.php');
?>