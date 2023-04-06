<?php
    include_once "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="LoginStyle.css" type="text/css">
    <title>Document</title>
</head>
    <header class="header-body">
        <div class="inputbox">
        <h2 class="title">Registration Info</h2>
        <form action="AdminForm.php" method="POST">
        <div class="wrap-input100" >
        <div class="input-group">
            <p class="word">First Name: </p><input class="input" type="name" placeholder="First Name" name="Firstname" required>
        </div>
        </div>
        <div class="input-group">
            <p class="word">Surname: </p><input class="input" type="name" placeholder="Last Name" name="Lastname" required>
        </div>

        <div class="input-group">
            <p class="word">Username: </p><input class="input" type="Username" placeholder="User Name" name="Username" required>
        </div>

        <div class="input-group">
            <p class="word">&nbsp &nbsp Email Adress: </p><input class="input" id="create_pw" type="Email" placeholder="Example@example.co.uk" name="Email" required>
        </div>

        <div class="input-group">
            <p class="word">Password: </p><input class="input" type="Password" placeholder="Password" name="Password" required>
        </div>

        <div class="input-group">
            <p class="word">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Confirm Password: </p><input class="input" type="Password" placeholder="Re-Type Password" name="RePassword" required>
        </div>

        <p class="ut">Select User Type: </p> <select name="Usertype" id="Usertype">
            <option value="Customer">Customer</option>
            <option value="Estimator">Estimator</option>
        </select>

        <div class="p-t-10">
            <button class="btn" type="submit" name="submit"> Signup </button>
        </div>
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p style=\"color:red;\">All fields are required!</p>";
            }
            else if ($_GET["error"] == "invaliduid") {
                echo "<p style=\"color:red;\">Usernames can't contain special characters!</p>";
            }
            else if ($_GET["error"] == "passwordnotstrong") {
                echo "<p style=\"color:red;\">Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character</p>";
            }
            else if ($_GET["error"] == "invalidemail") {
                echo "<p style=\"color:red;\">Emails must be formatted as - 'example@example.co.uk'!</p>";
            }
            else if ($_GET["error"] == "stmtfailed") {
                echo "<p style=\"color:red;\">Something went wrong, try again!</p>";
            }
            else if ($_GET["error"] == "usernametaken") {
                echo "<p style=\"color:red;\">Username already taken!</p>";
            }
            else if ($_GET["error"] == "passwordmismatch") {
                echo "<p style=\"color:red;\">Passwords need to match!</p>";
            }
            else if ($_GET["error"] == "none") {
                echo "<p></p>";
            }
        } 
        ?>
</div>	

        <div class="footer-info">
            <div class="FooterOptions" onclick="location.href=''"><p class="footertxt"></p>HOW TO FIND US</div>
            <div class="FooterOptions" onclick="location.href=''"><p class="footertxt"></p>ABOUT US</div>
            <div class="FooterOptions" onclick="location.href=''"><p class="footertxt"></p>FREQUENTLY ASKED QUESTIONS</div>
            <div class="FooterOptions" onclick="location.href=''"><p class="footertxt"></p>Privacy & Cookies</div>
        </div>
    </header>
</body>

<script>
  const createPw = document.querySelector("#create_pw"),
   confirmPw = document.querySelector("#confirm_pw"),
   pwShow = document.querySelector(".show"),
   alertIcon = document.querySelector(".error"),
   alertText= document.querySelector(".text"),
   submitBtn = document.querySelector("#button");

   pwShow.addEventListener("click", ()=>{
     if((createPw.type === "password") && (confirmPw.type === "password")){
       createPw.type = "text";
       confirmPw.type = "text";
       pwShow.classList.replace("fa-eye-slash","fa-eye");
     }else {
       createPw.type = "password";
       confirmPw.type = "password";
       pwShow.classList.replace("fa-eye","fa-eye-slash");
     }
   });

   createPw.addEventListener("input", ()=>{
     let val = createPw.value.trim()
     if(val.length >= 8){
       confirmPw.removeAttribute("disabled");
       submitBtn.removeAttribute("disabled");
       submitBtn.classList.add("active");
     }else {
       confirmPw.setAttribute("disabled", true);
       submitBtn.setAttribute("disabled", true);
       submitBtn.classList.remove("active");
       confirmPw.value = "";
       alertText.style.color = "#a6a6a6";
       alertText.innerText = "Enter at least 8 characters";
       alertIcon.style.display = "none";
     }
   });

  submitBtn.addEventListener("click", ()=>{
   if(createPw.value === confirmPw.value){
     alertText.innerText = "Password matched";
     alertIcon.style.display = "none";
     alertText.style.color = "#4070F4";
   }else {
     alertText.innerText = "Password didn't matched";
     alertIcon.style.display = "block";
     alertText.style.color = "#D93025";
   }
  });
  </script>
</html>