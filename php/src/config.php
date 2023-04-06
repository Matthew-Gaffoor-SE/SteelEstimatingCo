<?php
require_once 'google-api/vendor/autoload.php';

$gClient = new Google_Client();
$gClient->setClientId("1036642530697-qmuvkd5vuehgldnhdfh6h86lv6dqqq74.apps.googleusercontent.com");
$gClient->setClientSecret("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");
$gClient->setApplicationName("Steel Estimating Co Login");
$gClient->setRedirectUri("http://localhost:8000/controller.php");
$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

$login_url = $gClient->createAuthUrl();
?>