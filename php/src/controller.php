<?php
require_once "process/controller.class.php";
require_once "config.php";

if (isset($_GET['code'])) {
    $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
}else{
    header('Location: LoginPage.php');
    exit();
}

if(!isset($token["error"])){
    // get data from google
    $oAuth = new Google_Service_Oauth2($gClient);
    $userData = $oAuth->userinfo_v2_me->get();

    //insert data in the database
        $Controller = new Controller;
        echo $Controller -> insertData(
            array(
                'email' => $userData['email'],
                'familyName' => $userData['familyName'],
                'givenName' => $userData['givenName'],
            )
        );
}else{
    header('Location: LoginPage.php');
    exit();
}
?>