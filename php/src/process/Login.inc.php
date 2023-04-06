<?php

$secretkey = '6LeUaVElAAAAAKHuFPw2ogexmMlPQYURTchhCWsu';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $Username = htmlspecialchars($_POST["Username"], ENT_QUOTES, 'UTF-8');
    $Password = htmlspecialchars($_POST["Password"], ENT_QUOTES, 'UTF-8');

    require_once '../Functions.inc.php';
    require_once '../includes/conn.inc.php';

    if (emptyInputLogin($Username, $Password) !== false) {
        header("location: ../LoginPage.php?error=emptyinput");
        exit();
    }

    if(isset($_POST['g-recaptcha-response']) && empty($_POST['g-recaptcha-response']))
    {
        $verifyresponce = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretkey.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyresponce);

        if(!$responseData->success)
        {
            header("location: ../LoginPage.php?error=errorcapatcha");
            exit();
        }
    }

    loginUser($mysqli, $Username, $Password);
}
else {
    header("location: ../LoginPage.php");
    exit();
}

?>