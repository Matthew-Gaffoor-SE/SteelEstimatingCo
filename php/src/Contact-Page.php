<?php
    include ('includes/conn.inc.php');
    include('includes/authenticate.inc.php');
    include_once "header.php";

    if(isset($_POST['submit']))
    {
        $stmt = $mysqli->prepare("INSERT INTO Complaints(UserID, TodayDate, Category, UserSubject) VALUES ($_SESSION[usersID], ?, ?, ?)");
        $stmt->bind_param('sss',
        $_POST['TodayDate'],
        $_POST['Category'],
        $_POST['UserSubject']);
        $stmt->execute();
        $newId = $stmt->insert_id;
        $stmt->close();
    }
?>
    <header class="header-body">

        <div class="profile-box">
            <div class="Contact-box-container">
                <h1 class="contact-title">Contact Us</h1>

                <form action="" method="POST">
                <div class="contact-alts">
                    <p class="alt-title">Alternative Methods</p>
                    <p class="contact-headers">Location: </p>
                    <p class="address-contact">220a Thompson Hill,<br>High Green,<br>Sheffield,<br>United Kingdom,<br>S35 4JW</p>
                    <p class="contact-headers">Email Address: </p>
                    <p class="email-contact">Example123@hotmail.co.uk</p>
                    <p class="contact-headers">Phone Number: </p>
                    <p class="phone-contact">0114 424 2423</p>
                </div>
                <div class="Date-group">
                    <p class="contact-date">Today's Date: </p><input class="date-input" type="date" name="TodayDate" required>
                
                    <p class="contact-cat-options">Select Catagory: </p> <select name="Category" id="Category">
                    <option value="JobPosting">Job Posting issues</option>
                    <option value="Payments">Payments problems</option>
                    <option value="Other">Other</option>
                    
                    <textarea class="contact-desc" rows="6" cols="60" placeholder="Enter Text Here..." name="UserSubject"></textarea>

                    <button class="contact-button" type="submit" name="submit"> Submit </button>

                </div>
                </div>

                </form>
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