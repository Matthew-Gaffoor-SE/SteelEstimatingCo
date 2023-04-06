<?php
    include ('includes/conn.inc.php');
    include('includes/sessions.inc.php');
    include('includes/authenticate.inc.php');
    include_once "header.php";

    if(isset($_POST['btn-update']))
    {
        $file = $_FILES['file'];

        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'pdf');

        if(in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    $fileNameNew = "Profile".$_SESSION['usersID'].".".$fileActualExt;
                    $fileDestination = 'uploads/'.$fileNameNew;
                    if(file_exists($fileNameNew)) unlink($fileNameNew);
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $sql = "UPDATE profileimg SET status=0 WHERE userID='$_SESSION[usersID]';";
                    $result = mysqli_query($mysqli, $sql);
                }
                else {
                    echo "File size too large!";
                }
            } else {
                echo "There was an error uploading your file!";
            }
        } else {
            echo "File type not accepted for upload!";
        }

        $_SESSION["firstname"] = $_POST["firstname"];
        $_SESSION["lastname"] = $_POST["lastname"];

        $update = "UPDATE Users SET Firstname='$_SESSION[firstname]', Lastname='$_SESSION[lastname]' WHERE userID='$_SESSION[usersID]'";
        $up = mysqli_query($mysqli, $update);
    }
?>
    <header class="header-body">

    <form method="POST" enctype="multipart/form-data">
    <div class="profile-box">
            <div class="pp-info-box-container">
                <div class="PpInfoBoxes">
                    <p class="title-text-top">User ID</p>
                    <p class="profile-info-text"><?php echo $_SESSION["usersID"]; ?></p>

                    <p class="title-text">First Name</p>
                    <label class="profile-lbl"></label><input class="Itxt" type="text" name="firstname" placeholder="firstname" value="<?php echo $_SESSION["firstname"] ?>"><br/><br/>

                    <p class="title-text">Surname</p>
                    <label class="profile-lbl"></label><input class="Itxt" type="text" name="lastname" placeholder="lastname" value="<?php echo $_SESSION["lastname"] ?>"><br/><br/>

                </div>
                <div class="PpInfoBoxes">
                    <p class="Ppdesc">Profile Page</p>
                    <p class="RoleTyoe">TBC..</p>

                    <input type="file" name="file">
                    <div></div>
                    <button class="account-settings-btn" type="submit" name="btn-update" id="btn-update" onClick="update()">Update Details</button>
                </div>
                <div class="PpInfoBoxes">

                <p class="title-text-top">User Type</p>
                <p class="profile-info-text"><?php echo $_SESSION["usertype"]; ?></p>

                <p class="title-text">Email Address</p>
                <p class="profile-info-text"><?php echo $_SESSION["email"]; ?></p>

                <p class="title-text">Username</p>
                <p class="profile-info-text"><?php echo $_SESSION["username"]; ?></p>

                </div>
            </div>
        </div>
    </form>
    <script>
    function update()
    {
        var x;
        if(confirm("Updated data Sucessfully") == true)
        {
            x="update";
        }
    }
    </script>

        <div class="footer-info">
            <div class="FooterOptions" onclick="location.href=''"><p class="footertxt"></p>HOW TO FIND US</div>
            <div class="FooterOptions" onclick="location.href=''"><p class="footertxt"></p>ABOUT US</div>
            <div class="FooterOptions" onclick="location.href=''"><p class="footertxt"></p>FREQUENTLY ASKED QUESTIONS</div>
            <div class="FooterOptions" onclick="location.href=''"><p class="footertxt"></p>Privacy & Cookies</div>
        </div>
    </header>
</body>

</html>