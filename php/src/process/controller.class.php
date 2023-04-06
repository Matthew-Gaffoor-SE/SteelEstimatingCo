<?php
class Controller {

    // check if user is logged in
    function checkUserStatus($id, $sess){
        require_once ('./includes/conn.inc.php');
        $user = $mysqli -> prepare("SELECT id FROM google_users WHERE id=? AND session=?");
        $user->bind_param('is',
        $_GET['id'],
        $_GET['session']);
        $user -> execute();
        $userInfo = mysqli_fetch_assoc($user);
        if(!$userInfo["id"]){
            return FALSE;
        }else{
            return TRUE;
        }
    }

    // function for generating password and login session
    function generateCode($length){
		$chars = "vwxyzABCD02789";
		$code = "";
		$clen = strlen($chars) - 1;
		while (strlen($code) < $length){
			$code .= $chars[mt_rand(0,$clen)];
		}
		return $code;
    }

    function insertData($data){
        require_once ('./includes/conn.inc.php');
        $checkUser = $mysqli -> prepare("SELECT * FROM google_users WHERE email=?");
        $checkUser->bind_param('s',
        $_GET[$data["email"]]);
        $checkUser -> execute();
        $resultData = mysqli_stmt_get_result($checkUser);
        $info = mysqli_fetch_assoc($resultData);

        if(!isset($info["id"])){
            $password = $this -> generateCode(5);
            $session = $this -> generateCode(10);
            $insertNewUser = $mysqli -> prepare("INSERT INTO google_users (firstname, lastname, email, password, session) VALUES (?, ?, ?, ?, ?)");
            $insertNewUser -> bind_param('sssss',
            $data["givenName"],
            $data["familyName"],
            $data["email"],
            $password,
            $session);
            $insertNewUser -> execute();
            $insertNewUser -> close();
            $stmt = $mysqli->prepare("SELECT LAST_INSERT_ID() FROM google_users");
            $stmt->execute();
            $stmt->bind_result($uid);
            $stmt->fetch();

            if($insertNewUser){
                setcookie("id", $uid, time()+60*60*24*30, "/", NULL);
                setcookie("sess", $session, time()+60*60*24*30, "/", NULL);
                header('Location: LoginPage.php');
                exit();
            }else{
                return "Error inserting user!";
            }
        }else{
            setcookie("id", $info['id'], time()+60*60*24*30, "/", NULL);
            setcookie("sess", $info['session'], time()+60*60*24*30, "/", NULL);
            header('Location: LoginPage.php');
            exit();
        }
    }
}
?>