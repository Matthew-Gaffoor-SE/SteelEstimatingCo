<?php
    include_once "header.php";
    require_once "config.php";
    require_once('process/controller.class.php');
?>


<script src="https://www.google.com/recaptcha/api.js"></script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Steel Estimating Co</title>
    <link rel="stylesheet" href="LoginPage.css">
    <title>Document</title>
</head>
    <header class="header-body">
    <div class="inputbox">
        <h2 class="title">Log In Details</h2>
        <form action="process/Login.inc.php" method="POST">
        <div class="wrap-input100" >
        <div class="input-group">
            <p class="word">Username: </p><input class="input" type="Username" placeholder="Username/Email Address" name="Username" required>
        </div>
        </div>
        <div class="input-group">
            <p class="word">Password: </p><input class="input" type="Password" placeholder="Password" name="Password" required>
        </div>
        <div class="link-containers">
        <p class="Ca" onclick="location.href='RegisterNewUser.php'">Create Account</p>
        <?php
            if (isset($_GET["newpwd"])) {
                if ($_GET["newpwd"] == "passwordupdated") {
                    echo "<p style=\"color:white;\"> Your password has been reset! </p>";
                }
            }
        ?>
        <p class="Fp" onclick="location.href='reset-password.php'">Reset Password?</p>
        </div>

        <div class="g-recaptcha" style="margin-left: 100px;"data-sitekey="6LeUaVElAAAAAAYRh9OVxU2tFBYiZiqMvDxzAzxS"></div>

        <div class="p-t-10">
            <button class="btn" type="submit" name="submit"> Sign In </button>
            <button onclick="window.location = '<?php echo $login_url; ?>'" class="btn2" type="submit" name="submit"> Google Sign In </button>
        </div>
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p style=\"color:red;\">All fields are required!</p>";
            }
            else if ($_GET["error"] == "wronglogin") {
                echo "<p style=\"color:red;\">Incorrect Username or Password!</p>";
            }
            else if ($_GET["error"] == "errorcapatcha") {
                echo "<p style=\"color:red;\">Please tick the capatcha!</p>";
            }
        } 
        ?>
    </div>
</header>
<div class="footer-info">
            <div class="FooterOptions" onclick="location.href=''"><p class="footertxt"></p>HOW TO FIND US</div>
            <div class="FooterOptions" onclick="location.href=''"><p class="footertxt"></p>ABOUT US</div>
            <div class="FooterOptions" onclick="location.href=''"><p class="footertxt"></p>FREQUENTLY ASKED QUESTIONS</div>
            <div class="FooterOptions" onclick="location.href=''"><p class="footertxt"></p>Privacy & Cookies</div>
        </div>
</body>

</html>