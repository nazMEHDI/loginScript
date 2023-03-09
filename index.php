<?php
session_start();
    include("dbConnection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Radius - Signin/Signup</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/CSS/style.css">
</head>

<body>
<?php 
        if(isset($_GET['error'])) {
            echo $_GET['error'];
        }
        if(isset($_GET['suc'])) {
            echo $_GET['suc'];
        }
        ?>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="registre.php" method="post">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your username and email for registration</span>
                <div>
                <input type="text" placeholder="username" name="username"  required/>
                <input type="email" placeholder="email" name="email" required>
                <input type="password" placeholder="password" name="password" minlength="8" required>
                <input type="password" placeholder="password confirm" name="password_confirm" required />
                <button name="submit" type= "submit" >Sign Up</button>
                </div>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="login.php" method="post">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <input type="text" placeholder="username" name="username" required/>
                <input type="password" placeholder="password" name="password" required/>
                <input type="text" placeholder="activationCode" name="activationCode"/>
                <a href="#">Forgot your password?</a>
                <button type="submit" name="submit">Sign In</button>
                
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Boss!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/JS/main.js"></script>
</body>

</html>