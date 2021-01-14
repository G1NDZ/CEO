<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: welcome.php");
  exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
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

    <div class="loginFormContainer" >
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" >
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
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