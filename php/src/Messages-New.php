<?php
    include ('includes/conn.inc.php');
    include('includes/authenticate.inc.php');
    include_once "header.php";
    
    if(isset($_POST['submit']))
    {
        $stmt = $mysqli->prepare("INSERT INTO Messages(sendID, recieverID, todayDate, title, subject) VALUES ($_SESSION[usersID], ?, ?, ?, ?)");
        $stmt->bind_param('isss',
        $_POST['recieverID'],
        $_POST['todayDate'],
        $_POST['title'],
        $_POST['subject']);
        $stmt->execute();
        $newId = $stmt->insert_id;
        $stmt->close();
    }
?>
    <header class="header-body">

        <div class="message-box">
            <div class="message-box-container">
                <h1 class="message-title">New Message</h1>
                <form action="" method="POST">
                    <div class="message-wrapper">
                        <label class="message-label-header">User ID Number: &nbsp &nbsp </label><input class="message-id-text" type="number" name="recieverID" placeholder="Enter ID number (example: 45).." min="1" max="999" required>
                        <p class="message-date">Today's Date: </p><input class="message-date-input" type="date" placeholder="Date" name="todayDate" required>
                        <label class="message-label-title">Title: &nbsp &nbsp </label><input class="message-label-text" type="text" name="title" placeholder="Job Title" required>
                        <label class="message-label-subject">Subject:</label>
                        <textarea class="message-description-text-area" rows="13" cols="70" placeholder="Additional Information.." name="subject" required></textarea>
                        <button class="message-post-button" type="submit" name="submit"> Submit </button>
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