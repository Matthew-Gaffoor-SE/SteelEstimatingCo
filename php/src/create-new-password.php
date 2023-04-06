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
        
    <?php 
        $selector = $_GET["selector"];
        $validator = $_GET["validator"];

        if(empty($selector) || empty($validator)) {
            echo "Could not validate your request!";
        } else {
            if(ctype_xdigit($selector) !== false && ctype_xdigit($validator)) {
                ?>

                    <form action="includes/reset-password.inc.php" method="post">
                        <input type="hidden" name="selector" value="<?php echo $selector ?>">
                        <input type="hidden" name="validator" value="<?php echo $validator ?>">
                        <input class="input3" type="password" name="pwd" placeholder="Enter a new password..">
                        <input class="input3" type="password" name="pwd-repeat" placeholder="Confirm new password..">
                        <button class="btn3" type="submit" name="reset-password-submit">Reset Password</button>

                    </form>
                <?php
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