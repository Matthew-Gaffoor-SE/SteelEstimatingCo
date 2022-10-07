<?php
include ('includes/conn.inc.php');
$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
$stmt = $mysqli->prepare("INSERT INTO Listings(userID, Type, Title, Description, image) VALUES (?, ?, ?, ?, '$file')");
$stmt->bind_param('isss',
$_POST['userID'],
$_POST['Type'],
$_POST['Title'],
$_POST['Description']);
$stmt->execute();
$newId = $stmt->insert_id;
$stmt->close();
header("Location: CustomerHomepage.php");
?>