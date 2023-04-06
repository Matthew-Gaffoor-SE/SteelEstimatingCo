<?php

function emptyInputSignup($Firstname, $Lastname, $Username, $Email, $Password, $Usertype) {
    $result;
    if (empty($Firstname) || empty($Lastname) || empty($Username) || empty($Email) || empty($Password) || empty($Usertype)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invaliduid($Username) {
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $Username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidemail($Email) {
    $result;
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function passwordnotstrong($Password, $uppercase, $lowercase, $number, $specialChars) {
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($Password) < 8) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function passwordmismatch($Password, $RePassword) {
    $result;
    if ($Password != $RePassword) {
        $result = true;
     }
    else {
        $result = false;
    }
    return $result;
}

function uidexists($mysqli, $Username, $Email) {
    $sql = "SELECT * FROM Users WHERE Username = ? OR Email = ?;";
    $stmt = mysqli_stmt_init($mysqli);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: RegisterNewUser.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $Username, $Email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($mysqli, $Firstname, $Lastname, $Username, $Email, $Password, $Usertype) {
    $sql = "INSERT INTO Users (Firstname, Lastname, Username, Email, Password, Usertype) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($mysqli);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: RegisterNewUser.php?error=stmtfailed");
        exit();
    }

    $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssssss", $Firstname, $Lastname, $Username, $Email, $hashedPassword, $Usertype);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $sql = "SELECT * FROM Users WHERE Username='$Username' AND Email='$Email'";
    $result = mysqli_query($mysqli, $sql);

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $usID = $row['userID'];
            $sql = "INSERT INTO profileimg (userID, status) VALUES ('$usID', 1)";
            mysqli_query($mysqli, $sql);
        }
    }
    header("location: LoginPage.php?error=none");
    exit();
}

function emptyInputLogin($Username, $Password) {
    $result;
    if (empty($Username) || empty($Password)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function loginUser($mysqli, $Username, $Password) {
    $uidexists = uidexists($mysqli, $Username, $Username);

    if ($uidexists === false) {
        header("location: ../LoginPage.php?error=wronglogin");
        exit();
    }

    $pwdhashed = $uidexists["Password"];
    $checkpwd = password_verify($Password, $pwdhashed);

    if ($checkpwd === false) {
        header("location: ../LoginPage.php?error=wrongpassword");
        exit();
    }
    else if ($checkpwd === true) {
        session_start();
        $_SESSION["usersID"] = $uidexists["userID"];
        $_SESSION["username"] = $uidexists["Username"];
        $_SESSION["usertype"] = $uidexists["Usertype"];
        $_SESSION["firstname"] = $uidexists["Firstname"];
        $_SESSION["lastname"] = $uidexists["Lastname"];
        $_SESSION["email"] = $uidexists["Email"];
        header("location: ../Homepage.php");
        exit();
    }
}
?>