<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <title>Contact Form</title>
    <link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='../css/style.ssignup.css' />
    <script src='https://kit.fontawesome.com/64d58efce2.js' crossorigin='anonymous'></script>
    <script type="text/javascript" src="../js/jquery-min.js" ></script>
    <style>
        div.fixed {
            position: flex;
            bottom: 100px;
            right: 500px;
            color: #0fe00f;
        }

        div.fixedtwo {
            position: fixed;
            bottom: 100px;
            right: 500px;
            color: #cc1313;
        }

        @media (max-width: 900px) {
            div.fixed {
                position: fixed;
                bottom: 0;
                right: 50px;
                color: #0fe00f;
            }
        }

        .big-circle {
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: linear-gradient(to bottom, #cc1313, #cc1313);
            bottom: 40%;
            right: 40%;
            transform: translate(-40%, 38%);
        }
    </style>
</head>

<body>
    <section>
        <div class='circle'></div>
        <header>
            <img src='../assets/somaiya.png' class='logo'></a>
            <div class='name'>
                <center>
                    <h1>K .J .Somaiya Institute of Technology<span><br>Department of
                            <br>Electronics and Telecommunication</span>
                            <br>&</span>
                            <br>Computer Engineering</span></h1>
                </center>
            </div>
            <ul>
                <li><a href=''></a></li>
                <li><a href=''></a></li>
            </ul>
        </header>
        <div class='container'>
            <span class='big-circle'></span>
            <img src='../assets/shape.png' class='square' alt='' />
            <div class='form'>
                <div class='contact-info'>
                    <h3 class='title'>CO's and PO's Attainment</h3>
                    <center>
                    <div class='info'>
                        <div class='information'>
                            <img src='../assets/location.png' class='icon' alt='' />
                            <p><a href='https://goo.gl/maps/DBr8yqV1hyN6Ra2J8'>Somaiya Ayurvihar Complex Eastern
                                    Express Highway Near Everard Nagar, Sion East, Mumbai, Maharashtra 400022</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class='contact-form'>
                    <span class='circle one'></span>
                    <span class='circle two'></span>

                    <form action='../returning_apis/Signup.php' method=POST id="signupForm">
                        <h3 class='title'>Sign Up</h3>
                        <div class='input-container'>
                            <input type="text" name="uname" id="uname" required class="input">
                            <label for=''>Email/Username</label>
                            <span>Email/Username</span>
                        </div>
                        <div class='input-container'>
                            <input type="password" name="pwd" id="pwd" required class="input">
                            <label for=''>Password</label>
                            <span>Password</span>
                        </div>
                        <div class='input-container'>
                            <input type="text" name="name" id="name" required class="input" />
                            <label for=''>Name</label>
                            <span>Name</span>
                        </div>
                        <div class='input-container'>
                            <!-- <input type = text name = depart value = "<?=htmlentities($d)?>" required class = 'input' /> -->
                            <select name="depart" id="depart" required class="input">
                                <option value=0>Department</option>
                                <?php
                                    include( '../assets/copo_config.php' );
                                    $sql = 'select * from department';
                                    $result = mysqli_query( $conn, $sql );
                                    while( $row = mysqli_fetch_assoc( $result ) ) 
                                    {

                                    echo '<option value='.$row[ 'dept_id' ].'>'.$row[ 'dept_name' ];

                                    }
                                ?>
                            </select>
                            <br>
                        </div>
                        <input type='submit' class='btn'>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
<script src='../js/app.js'></script>
<script>
    $(document).ready(function() {
        $("#signupForm").submit(function(e){

            var username = document.getElementById("uname").value;
            username_ext = username.split("@");
            var department = document.getElementById("depart").value;
            if (parseInt(department) === 0) {
                alert('Please enter all details and then try to proceed!!');
                e.preventDefault();
            } else if (username_ext[1] !== "somaiya.edu") {
                alert('Please enter valid somaiya id and then try to proceed!!');
                e.preventDefault();
            }

            var url = document.URL;
            url = url.replace("frontend/Signup", "/returning_apis/GetUsernames");

            $.ajax({
                url: url,
                method: "POST",
                success: function(data, status) {
                    var final_data = jQuery.parseJSON(data);
                    final_data = final_data["teacher_email"];
                    if (final_data.includes(username)) {
                        alert('Your email is already registered!!');
                        e.preventDefault();
                    }
                },
                error: function(error) {
                    // code
                }
            });
        })
    });
</script>
</html>