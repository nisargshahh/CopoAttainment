<?php
  include '../../assets/copo_config.php';

  session_start();
  if (!isset($_SESSION["uname"]))
  {
    header("Location:../Login.php");
  }
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
    <?php include('../../assets/header.html') ?>
    <center>
    <form action='../../returning_apis/ChangePassword.php' method= POST id='changePasswordForm'>
    <div class=box>
      <div style=border:solid 5px rgb(0, 0, 0); padding:10px; margin-left: auto;margin-right: auto;>
        <h3>Change Password<h3>
          <label>Enter Old Password :</label>
          <input type='text' name='oldPassword' id='oldPassword' placeholder='Enter Here' /><br><br>
          <label>Enter New Password :</label>
          <input type='text' name='newPassword' id='newPassword' placeholder='Enter Here' /><Br><Br>
          <label>Re-Enter New Password :</label>
          <input type='text' name='reNewPassword' id='reNewPassword' placeholder='Enter Here' /><br>
          <br><input type=submit class='button'>
        </div>
      </div>
    </form>
    </center>
  </body>
  <script type='text/javascript'>
    $(document).ready(function() {
      $('#changePasswordForm').submit(function(e) {
        var oldPassword = document.getElementById('oldPassword').value;
        var newPassword = document.getElementById('newPassword').value;
        var reNewPassword = document.getElementById('reNewPassword').value;

        if (!oldPassword.trim() || !newPassword.trim() || !reNewPassword.trim()) {
          alert('Please enter all details and then try to proceed!!');
          e.preventDefault();
        }

        if ((newPassword.localeCompare($reNewPassword)) !== 0) {
          alert('Both new passwords do not match!!');
          e.preventDefault();
        }
      })
    })
  </script>
</html>
