<?php
include ('includes/conn.inc.php');
$stmt = $mysqli->prepare("INSERT INTO Users(Firstname, Lastname, Email, Username, Usertype, Password) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param('ssssss',
$_POST['Firstname'],
$_POST['Lastname'],
$_POST['Email'],
$_POST['Username'],
$_POST['Usertype'],
$_POST['Password']);
$stmt->execute();
$newId = $stmt->insert_id;
$stmt->close();
header("Location: LoginPage.php");
?>