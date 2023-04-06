<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST')
{
    $Firstname = htmlspecialchars($_POST["Firstname"], ENT_QUOTES, 'UTF-8');
    $Lastname = htmlspecialchars($_POST["Lastname"], ENT_QUOTES, 'UTF-8');
    $Username = htmlspecialchars($_POST["Username"], ENT_QUOTES, 'UTF-8');
    $Email = htmlspecialchars($_POST["Email"], ENT_QUOTES, 'UTF-8');
    $Password = htmlspecialchars($_POST["Password"], ENT_QUOTES, 'UTF-8');
    $RePassword = htmlspecialchars($_POST["RePassword"], ENT_QUOTES, 'UTF-8');
    $Usertype = htmlspecialchars($_POST["Usertype"], ENT_QUOTES, 'UTF-8');

    $uppercase = preg_match('@[A-Z]@', $Password);
    $lowercase = preg_match('@[a-z]@', $Password);
    $number    = preg_match('@[0-9]@', $Password);
    $specialChars = preg_match('@[^\w]@', $Password);


    require_once 'Functions.inc.php';
    require_once 'includes/conn.inc.php';

    if (emptyInputSignup($Firstname, $Lastname, $Username, $Email, $Password, $Usertype) !== false) {
        header("location: RegisterNewUser.php?error=emptyinput");
        exit();
    }
    if (passwordnotstrong($Password, $uppercase, $lowercase, $number, $specialChars) !== false) {
        header("location: RegisterNewUser.php?error=passwordnotstrong");
        exit();
    }
    if (invaliduid($Username) !== false) {
        header("location: RegisterNewUser.php?error=invaliduid");
        exit();
    }
    if (invalidemail($Email) !== false) {
        header("location: RegisterNewUser.php?error=invalidemail");
        exit();
    }
    if (passwordmismatch($Password, $RePassword) !== false) {
        header("location: RegisterNewUser.php?error=passwordmismatch");
        exit();
    }
    if (uidexists($mysqli, $Username, $Email) !== false) {
        header("location: RegisterNewUser.php?error=usernametaken");
        exit();
    }

    createUser($mysqli, $Firstname, $Lastname, $Username, $Email, $Password, $Usertype);
}
else {
    header("location: RegisterNewUser.php");
    exit();
}
?>