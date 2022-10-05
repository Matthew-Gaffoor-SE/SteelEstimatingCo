<?php
include ('includes/conn.inc.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="LoginPage.css" type="text/css">
    <title>Document</title>
</head>
<body>
    <h1 class="sec">Steel Estimating Co</h1>

<div class="inputbox">
        <h2 class="title">Log In Details</h2>
        <form action="AdminForm.php" method="POST">
        <div class="wrap-input100" >
        <div class="input-group">
            <p class="word">Username: </p><input class="input" type="Username" placeholder="Username" name="Username" required>
        </div>
        </div>
        <div class="input-group">
            <p class="word">Password: </p><input class="input" type="Password" placeholder="Password" name="Password" required>
        </div>

        <p class="Ca" onclick="location.href='RegisterNewUser.php'">Create Account</p>
        <p class="Fp">Reset Password?</p>

        <div class="p-t-10">
            <button class="btn" type="submit" name="signup"> Log In </button>
        </div>	
</div>				
</hi>
</body>
</html>