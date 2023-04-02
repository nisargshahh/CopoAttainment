<!DOCTYPE html>
<html>
    <head>
        <title>Reset Password</title>
        <link rel="stylesheet" type="text/css" href="../css/style.loginn.css">
        <link rel="icon" href="../assets/somaiya.jpg" type="image/jpg">
        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        div.fixed {
            position: fixed;
            bottom: 50px;
            right: 300px;
            color: #CC1313;
        }

        @media (max-width: 900px) {
            div.fixed {
                position: fixed;
                bottom: 25px;
                right: 50px;
                color: #CC1313;
            }
        }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="img">
                <img src="../assets/login.svg">
            </div>
            <div class="login-content">
                <form action="../returning_apis/CheckOTP.php" method=POST id="submit-form">
                    <?php
                        $user_id = $_REQUEST['uid'];
                        echo "<input type='hidden' name='uid' value='$user_id' />";
                    ?>
                    <img src="../assets/somaiya.jpg">
                    <h2 class="title">Welcome</h2>
                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="div">
                            <h5>OTP</h5>
                            <input type="text" name="otp" class="input">
                        </div>
                    </div>
                    <div class="input-div one">
                        <div class="i">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="div">
                            <h5>Password</h5>
                            <input type="password" name="password" id="password" class="input">
                        </div>
                    </div>
                    <div class="input-div pass">
                        <div class="i">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="div">
                            <h5>Re-enter Password</h5>
                            <input type="password" name="re-pass" id="re-pass" class="input">
                        </div>
                    </div>
                    <input type="submit" class="btn" value="Submit"><br>&nbsp
                </form>
            </div>
        </div>
        <script type="text/javascript" src="../js/main.js"></script>
    </body>
    <script>
        $(document).ready(function(){
            $("#submit-function").submit(function(event){
                var password = document.getElementById("password").value;
                var re_pass = document.getElementById("re_password").value;
                if (password === re_pass) {
                    // code
                } else {
                    alert("Both passwords do not match!!");
                    event.preventDefault();
                }
            })
        })
    </script>
</html>