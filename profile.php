<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="profile.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<body style= "background-image: url('ceo\ p/background login.png');">
<header>
        <div class="container-fluid text-white pt-2 pb-2" style="background-image: url('ceo\ p/background atas.png');">
            <div class="row align-items-center">
                <div class="col-5"><h1>♥ CEO</h1></div>
                <div class="col-7">
                    <div class="container-fluid">
                        <div class="row">
                           <div class="col-2"><h5><a href="HomePage.html">HOME</a></h5></div>
                            <div class="col-2"><h5>ABOUT</h5></div>
                            <div class="col-2"><h5><a href="catalogPage.html">EXPLORE</a></h5></div>
                            <div class="col-2"><h5><a href="PaymentOption.html">CONFIRM PAYMENT</a></h5></div>
                            <div class="col-2"><h5><a href="ShoppingChart.html">BAG</a></h5></div>
                            <div class="col-2"><h5><a href="login.php">LOGIN</a></h5></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="profileFormContainer">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
    </p>
    </div>

 <div class="yellowNav">
        <div class="container-fluid bg-warning p-3">
            <div class="row ">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col">
                                Follow us
                            </div>
                            <div class="col">
                                <img src="ceo p/icon IG.png" alt="" width="20px" height="20px">
                            </div>
                            <div class="col">
                                <img src="ceo p/icon line.png" alt="" width="20px" height="20px">
                            </div>
                            <div class="col">
                                <img src="ceo p/icon WA.png" alt="" width="20px" height="20px">
                            </div>
                            <div class="col">
                                <img src="ceo p/icon Youtube.png" alt="" width="20px" height="20px">
                            </div>
                            <div class="col">
                                <input type="email" name="" id="" placeholder="Your mail..">
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-dark">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container-fluid text-white p-5" style="background-image: url('ceo\ p/background atas.png');">
            <div class="row align-items-center">
                <div class="col-1"></div>
                <div class="col-5">
                    <h2>♥ CEO </h2><br><br>
                    COPYRIGHT @ 2020 CEO<br>
                    ALL RIGHTS RESERVED
                </div>
                <div class="col-3">
                    <h6><i><u>INFORMATION</u></i></h6><br>
                    PAYMENT METHOD <br>
                    SHIPPING <br>
                    FAQ <br>
                    HOW TO ORDER <br>
                    LEGAL <br>
                </div>
                <div class="col-3">
                    <h6><i><u>CUSTOMER CARE</u></i></h6><br>
                    CONTACT US <br><br>
                    <h6><i><u>JOIN OUR TEAM</u></i></h6><br>
                    CAREER
                </div>
            </div>
        </div>
    </footer>
    
</body>
</html>
