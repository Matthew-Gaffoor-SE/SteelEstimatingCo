<?php
    include ('includes/conn.inc.php');
    include('includes/authenticate.inc.php');
    include_once "header.php";

    $stmt = $mysqli->prepare("SELECT listingID, userID, Type, Title, Description, Claimed, estimatorID, Imgpic FROM Listings WHERE listingID = ?");
    $stmt->bind_param('i', $_GET['listingID']);
    $stmt->execute();
    $stmt->bind_result($listingID, $userID, $Type, $Title, $Description, $Claimed, $estimatorID, $Imgpic);
    $stmt->fetch();
?>
    <header class="header-body">

        <div class="view-ext-job-box">
        <h1 class="ext-job-header">Job <?php echo $listingID ?> Details.</h1>
        <img class="contract-img-ext" src=<?php echo "/contract-img/$Imgpic" ?> alt="">
        <p class="ext-desc-header">Description: <?php echo $Description ?></p>
        <div class="option-spacer-main">&nbsp</div>
        <label class="ext-title-label-header">Title: &nbsp<?php echo $Title ?></label>
        <p class="job-type-option2">Type: &nbsp<?php echo $Type ?></p>
        <div>&nbsp</div>
        <div class="option-grouper">
            <p class="if-ext-claimed-text"> Status:
                <?php if($Claimed == 1) {
                        echo "<p class=\"if--ext-est-text\" style=\"color: blue;\">Active</p>";
                    } else if($Claimed == 2) {
                        echo "<p class=\"if--ext-est-text\" style=\"color: orange;\">Accepted</p>";
                    } else if($Claimed == 3) {
                        echo "<p class=\"if--ext-est-text\" style=\"color: green;\">Completed</p>";
                    }else {
                        echo "<p class=\"if--ext-est-text\">Something went wrong. Please contact support.</p>";
                    }?>
            </p>
            <p class="if-ext-claimed-text">Estimator ID: 
                <?php if($estimatorID != NULL) {
                        echo "<p class=\"if--ext-est-text\" style=\"color: blue;\">Estimators ID Number: $estimatorID </p>";
                    } else {
                        echo "<p class=\"if-ext-notest-text\" style=\"color: red;\">Not Assigned!</p>";
                    } ?>
            </p>
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