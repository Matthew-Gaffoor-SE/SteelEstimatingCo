<?php
    require "../phpMailer/src/PHPMailer.php";
    require "../phpMailer/src/SMTP.php";
    require "../phpMailer/src/Exception.php";


    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


    if(isset($_POST["reset-request-submit"])) {

        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);

        $url = "http://localhost:8000/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

        $expires = date("U") + 1800;

        require ('conn.inc.php');

        $userEmail = $_POST["email"];

        $sql = "DELETE FROM pwdReset WHERE pwdResetEmail = ?;";
        $stmt = mysqli_stmt_init($mysqli);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            echo "There was an error";
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $userEmail);
            mysqli_stmt_execute($stmt);
        }

        $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($mysqli);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            echo "There was an error";
            exit();
        } else {
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
            mysqli_stmt_execute($stmt);
        }

        mysqli_stmt_close($stmt);
        mysqli_close($mysqli);

        $mail = new PHPMailer(true);

        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'sectest1233@gmail.com';                     //SMTP username
        $mail->Password   = 'lztphudkovekmllo';                               //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('SECTest1233@gmail.com');
        $mail->addAddress($userEmail);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Steel Estimating Co - Password Reset';
        $mail->Body    = 'We recieved a password reset request. The link to reset your password is below. If you did not make this request, you can ignore this email. </br>
        Here is your password reset link: <b><a href="' . $url . '">' . $url . '</a></b>';

        header("Location: ../reset-password.php?reset=success");
        $mail->send();

    } else {
        header("Location: ../LoginPage.php");
    }

?>