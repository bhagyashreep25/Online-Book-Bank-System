<?php
session_start();
if(isset($_SESSION['name'])){
    header("Location:./index.php");
}
// unset($_SESSION['errorMessage1']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width-device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="sie-edge" />
    <link href="https://unpkg.com/ionicons@4.2.2/dist/css/ionicons.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css"> -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Book Bank Login</title>
</head>

<body>
	<!--<img src="VB-Books/images/book bank.png">-->
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="login_check.php" method="POST">
                <h1>Create Account</h1><br>
                <span id="errorMessage"><?php
                    if(isset($_SESSION['errorMessage2']) and $_SESSION['errorMessage2']!=""){
                        echo $_SESSION['errorMessage2'];
                    }
                ?></span>
                <!-- <div class="social-container">
                    <a href="#" class="social">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                    <a href="#" class="social">
                        <ion-icon name="logo-googleplus"></ion-icon>
                    </a>
                    <a href="#" class="social">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a>
                </div> -->
                <!-- <span>or via email</span> -->
                <input class="validate" type="text" name="reg_name" id="reg_name" placeholder="Name">
                <input class="validate" type="email" name="reg_email" id="reg_email" placeholder="Email">
                <input class="validate" type="password" name="reg_pass" id="reg_pass" placeholder="Password">
				<input class="validate" type="password" name="reg_cpass" id="reg_cpass" placeholder="Confirm Password"><br>
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="login_check.php" method="POST">
                <!-- <h1>Book Bank</h1> -->
				<h1>Sign In<h1>
                <span id="errorMessage1"><?php
                    if(isset($_SESSION['errorMessage1']) and $_SESSION['errorMessage1']!=""){
                        echo $_SESSION['errorMessage1'];
                    }
                ?></span><br>
                <!-- <div class="social-container">
                    <a href="#" class="social">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                    <a href="#" class="social">
                        <ion-icon name="logo-googleplus"></ion-icon>
                    </a>
                    <a href="#" class="social">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a>
                </div> -->
                <!-- <span>or use your account</span> -->
                <input class="validate" type="email" name="login_email" id="login_email" placeholder="Email">
                <input class="validate" type="password" name="login_pass" id="login_pass" placeholder="Password"><br><br>
                <button>Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back</h1>
                    <p>To keep sharing books, please login with your personal info.<br><br>Have an account?</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hi Reader</h1>
                    <p>Love to read? Love to share your experiences? You're at the right place.<br><br>Don't have an account?</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script src="main.js"></script>
    <script src="https://unpkg.com/ionicons@4.2.2/dist/ionicons.js"></script>
</body>

</html>
