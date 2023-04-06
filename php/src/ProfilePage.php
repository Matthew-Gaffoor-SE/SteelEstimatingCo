<?php
    include ('includes/conn.inc.php');
    include('includes/sessions.inc.php');
    include('includes/authenticate.inc.php');
    include_once "header.php";
?>
    <header class="header-body">

        <div class="profile-box">
            <div class="pp-info-box-container">
                <div class="PpInfoBoxes-main">
                    <p class="title-text-top">User ID</p>
                    <p class="profile-info-text"><?php echo $_SESSION["usersID"]; ?></p>

                    <p class="title-text">First Name</p>
                    <p class="profile-info-text"><?php echo $_SESSION["firstname"]; ?></p>

                    <p class="title-text">Surname</p>
                    <p class="profile-info-text"><?php echo $_SESSION["lastname"]; ?></p>

                </div>
                <div class="PpInfoBoxes-main">
                    <p class="Ppdesc">Profile Page</p>
                    <p class="RoleTyoe"></p>
                    <?php
                        $sqlimg = "SELECT * FROM profileimg WHERE userID=$_SESSION[usersID]";
                        $resultimg = mysqli_query($mysqli, $sqlimg);
                        while($rowimg = mysqli_fetch_assoc($resultimg)) {
                            if($rowimg['status'] == 1) {
                                echo "<img class=\"profile-image-main\" src='uploads/user.png'>";
                            } else {
                                echo "<img class=\"profile-image-main\" src='uploads/profile$_SESSION[usersID].jpeg?'".mt_rand().">";
                            }
                        }
                    ?>

                    <div></div>
                    <button class="account-settings-btn" type="button" onclick="location.href='profile-account-settings.php'">Account Settings</button>
                </div>
                <div class="PpInfoBoxes-main">
                <p class="title-text-top">Email Address</p>
                    <p class="profile-info-text"><?php echo $_SESSION["email"]; ?></p>

                    <p class="title-text">Username</p>
                    <p class="profile-info-text"><?php echo $_SESSION["username"]; ?></p>

                    <p class="title-text">User Type</p>
                    <p class="profile-info-text"><?php echo $_SESSION["usertype"]; ?></p>
                </div>
            </div>
        </div>

        <div class="footer-info">
            <div class="FooterOptions" onclick="location.href=''"><p class="footertxt"></p>HOW TO FIND US</div>
            <div class="FooterOptions" onclick="location.href=''"><p class="footertxt"></p>ABOUT US</div>
            <div class="FooterOptions" onclick="location.href=''"><p class="footertxt"></p>FREQUENTLY ASKED QUESTIONS</div>
            <div class="FooterOptions" onclick="location.href=''"><p class="footertxt"></p>Privacy & Cookies</div>
        </div>
    </header>
</body>

</html>