<?php
    include_once "header.php";
    require_once "config.php";
    require_once('process/controller.class.php');
?>

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
        <h1 class="h1pass">Reset Your Password</h1>
        <p class="resetdesc">An email will be sent to you with instructions on how to reset your password.</p>
        <form action="includes/reset-request.inc.php" method="POST">
            <div class="input-group">
                <input class="input1" type="text" placeholder="Enter your email address.." name="email" required>
                <button class="btn1" type="submit" name="reset-request-submit">Request New Password</button>
            </div>
        </form>
    <?php
            if (isset($_GET["reset"])) {
                if ($_GET["reset"] == "success") {
                    echo "<p style=\"color:white; font-size:16px;\">Check your E-mail!</p>";
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