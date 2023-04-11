<?php
    include ('includes/conn.inc.php');
    include('includes/authenticate.inc.php');
    include_once "header.php";

    $stmt = $mysqli->prepare("SELECT messageID, sendID, recieverID, todayDate, title, subject, isread FROM Messages WHERE messageID = ?");
    $stmt->bind_param('i', $_GET['messageID']);
    $query = "UPDATE Messages SET isread = 2 WHERE messageID = $_GET[messageID]";
    $query_run = mysqli_query($mysqli, $query);
    $stmt->execute();
    $stmt->bind_result($messageID, $sendID, $recieverID, $todayDate, $title, $subject, $isread);
    $stmt->fetch();
?>
    <header class="header-body">

        <div class="message-box">
            <div class="message-box-container">
                <h1 class="message-title">New Message</h1>
                    <div class="message-wrapper">
                        <label class="message-label-header">User ID Number: &nbsp &nbsp </label><input class="message-id-text" type="number" name="recieverID" placeholder="<?php echo $sendID ?>" min="1" max="999" readonly>
                        <p class="message-date">Today's Date: </p><input class="message-date-input" placeholder="<?php echo Date("d-m-Y", strtotime($todayDate)); ?>" name="todayDate" readonly>
                        <label class="message-label-title">Title: &nbsp &nbsp </label><input class="message-label-text" type="text" name="title" placeholder="<?php echo $title ?>" readonly>
                        <label class="message-label-subject">Subject:</label>
                        <textarea class="message-description-text-area" rows="13" cols="70" placeholder="<?php echo $subject ?>" name="subject" readonly></textarea>
                        <div class="message-button-holder">
                            <button class="message-post-button" type="submit" name="submit"> Reply </button>
                            <button class="message-post-button" style="margin-left: 200px;" type="submit" name="submit"> Delete </button>
                        </div>
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