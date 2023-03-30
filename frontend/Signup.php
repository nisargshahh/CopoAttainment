
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <title>Contact Form</title>
    <link rel='stylesheet' type='text/css'
        href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='../css/style.ssignup.css' />
    <script src='https://kit.fontawesome.com/64d58efce2.js' crossorigin='anonymous'></script>
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
                    <h1>K .J .Somaiya Institute of Engineering and Information Technology<span><br>Department of
                            <br>Electronics and Telecommunication</span></h1>
                </center>
            </div>
            <ul>
                <li><a href=''></a></li>
                <li><a href=''></a></li>
            </ul>
        </header>
        <div class='container'>
            <span class='big-circle'></span>
            <img src='shape.png' class='square' alt='' />
            <div class='form'>
                <div class='contact-info'>
                    <h3 class='title'>CO's and PO's Attainment</h3>
                    <p class='text'>
                        <center>Sign up</center>
                    </p>
                    <center>
                        <div class='info'>
                            <div class='information'>
                                <img src='location.png' class='icon' alt='' />
                                <p><a href='https://goo.gl/maps/DBr8yqV1hyN6Ra2J8'>Somaiya Ayurvihar Complex Eastern
                                        Express Highway Near Everard Nagar, Sion East, Mumbai, Maharashtra 400022</a>
                                </p>
                            </div>
                        </div>

                </div>

                <div class='contact-form'>
                    <span class='circle one'></span>
                    <span class='circle two'></span>

                    <form action='../returning_apis/Signup.php' method=POST>
                        <h3 class='title'>Sign Up</h3>
                        <div class='input-container'>
                            <input type=text name=uname  required class='input'>
                            <label for=''>Email/Username</label>
                            <span>Email/Username</span>
                        </div>
                        <div class='input-container'>
                            <input type=password name=pwd required class='input'>
                            <label for=''>Password</label>
                            <span>Password</span>
                        </div>
                        <div class='input-container'>
                            <input type=text name=name required class='input' />
                            <label for=''>Name</label>
                            <span>Name</span>
                        </div>
                        <div class='input-container'>
                            <!-- <input type = text name = depart value = "<?=htmlentities($d)?>" required class = 'input' /> -->
                            <select name=depart required class='input'>
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
                            <!-- <label for = ''>Deparment</label>
<span>Department</span> -->
                        </div>
                        <input type='submit' class='btn'>
    </section>
    </form>
    </div>
    </div>
    </div>

    <script src='../js/app.js'></script>
</body>

</html>