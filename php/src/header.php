<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Steel Estimating Co</title>
    <link rel="stylesheet" href="HomeDesign.css">
    <title>Document</title>
</head>

<body>
    <header class="header-main">
        <div class="header-main-logo">
            <p class="logo-text">Steel Estimating Co</p>
            <?php
                if(empty($_SESSION["usertype"]))
                {
                    echo "<nav class=\"header-main-nav\">";
                    echo "<div class=\"MenuOptions\" onclick=\"location.href='Homepage.php'\"><p class=\"MenuTxt\">HOME</p></div>";
                    echo "<div class=\"MenuOptions\" onclick=\"location.href='LoginPage.php'\"><p class=\"MenuTxt\">PROFILE</p></div>";
                    echo "<div class=\"MenuOptions\" onclick=\"location.href='Faq-page.php'\"><p class=\"MenuTxt\">FAQ</p></div>";
                    echo "</nav>";
                }
                else
                {
                    if($_SESSION["usertype"] == "Customer")
                    {
                        echo "<nav class=\"header-main-nav\">";
                        echo "<div class=\"MenuOptions\" onclick=\"location.href='login-homepage.php'\"><p class=\"MenuTxt\">HOME</p></div>";
                        echo "<div class=\"MenuOptions\" onclick=\"location.href='ProfilePage.php'\"><p class=\"MenuTxt\">PROFILE</p></div>";
                        echo "<div class=\"MenuOptions\" onclick=\"location.href='Messages-Home.php'\"><p class=\"MenuTxt\">MESSAGES</p></div>";
                        echo "<div class=\"MenuOptions\" onclick=\"location.href='JobHomepage.php'\"><p class=\"MenuTxt\">JOBS</p></div>";
                        echo "<div class=\"MenuOptions\" onclick=\"location.href='Faq-page.php'\"><p class=\"MenuTxt\">FAQ</p></div>";
                        echo "<div class=\"MenuOptions\" onclick=\"location.href='Contact-Page.php'\"><p class=\"MenuTxt\">CONTACT US</p></div>";
                        echo "</nav>";
                    } 
                    else if($_SESSION["usertype"] == "Estimator")
                    {
                        echo "<nav class=\"header-main-nav\">";
                        echo "<div class=\"MenuOptions\" onclick=\"location.href='login-homepage.php'\"><p class=\"MenuTxt\">HOME</p></div>";
                        echo "<div class=\"MenuOptions\" onclick=\"location.href='ProfilePage.php'\"><p class=\"MenuTxt\">PROFILE</p></div>";
                        echo "<div class=\"MenuOptions\" onclick=\"location.href='Messages-Home.php'\"><p class=\"MenuTxt\">MESSAGES</p></div>";
                        echo "<div class=\"MenuOptions\" onclick=\"location.href='Estimator-Job-Homepage.php'\"><p class=\"MenuTxt\">JOBS</p></div>";
                        echo "</nav>";
                    
                    }
                }
            ?>
        </div>
        <div class="header-main-logout">
            <?php
                if(isset($_SESSION["username"])) 
                {
            ?>
                <div class="Signin header-usn"><p class="MenuTxt"><?php echo $_SESSION["username"]; ?></p></div>
                <div class="Signin" onclick="location.href='includes/Logout.inc.php'"><p class="MenuTxt">SIGN OUT</p></div>
                <?php
                }
                else 
                {
                    echo "<div class=\"Signin\" onclick=\"location.href='LoginPage.php'\"><p class=\"MenuTxt\">SIGN IN</p></div>";
                }
                ?>
        </div>
    </header>