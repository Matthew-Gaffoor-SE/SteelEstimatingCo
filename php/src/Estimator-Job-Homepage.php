<?php
    include ('includes/conn.inc.php');
    include('includes/sessions.inc.php');
    include('includes/authenticate.inc.php');
    include_once "header.php";

    include ('includes/conn.inc.php');
    $stmt = $mysqli->prepare("SELECT listingID, userID, Type, Description, Claimed, estimatorID FROM Listings WHERE userID='$_SESSION[usersID]' AND Claimed=1");
    $stmt->execute();
    $stmt->bind_result($listingID, $userID, $Type, $Description, $Claimed, $estimatorID);
    $stmt->store_result();
    $numRows = $stmt->num_rows;

    include ('includes/conn.inc.php');
    $stmt = $mysqli->prepare("SELECT listingID, userID, Type, Description, Claimed, estimatorID FROM Listings WHERE userID='$_SESSION[usersID]' AND Claimed=2");
    $stmt->execute();
    $stmt->bind_result($listingID, $userID, $Type, $Description, $Claimed, $estimatorID);
    $stmt->store_result();
    $numOfRows = $stmt->num_rows;

    include ('includes/conn.inc.php');
    $stmt = $mysqli->prepare("SELECT listingID, userID, Type, Description, Claimed, estimatorID FROM Listings WHERE userID='$_SESSION[usersID]' AND Claimed=3");
    $stmt->execute();
    $stmt->bind_result($listingID, $userID, $Type, $Description, $Claimed, $estimatorID);
    $stmt->store_result();
    $numberOfRows = $stmt->num_rows;
?>
    <header class="header-body">

        <div class="profile-box">
            <?php
                if(isset($_SESSION["usertype"]) == "Customer") {
                    echo "<div class=\"option-box-container\">";
                        echo "<div class=\"display-boxes\" onclick=\"location.href='Estimator-Active-Jobs.php'\">";
                            if ($numRows == 0)
                            {
                                echo "<div class=\"RowZero\">";
                            }
                            else
                            {
                                echo "<div class=\"RowExtends\">";
                            }
                            echo $numRows;
                            echo "</div>";
                            echo "<p class=\"job-desc-txt\"> Active Listed Jobs </p>";
                        echo "</div>";

                        echo "<div class=\"display-boxes\" onclick=\"location.href='Listed-Accepted-Jobs.php'\">";
                        if ($numOfRows == 0)
                        {
                            echo "<div class=\"RowZero\">";
                        }
                        else
                        {
                            echo "<div class=\"RowExtends\">";
                        }
                        echo $numOfRows;
                        echo "</div>";
                        echo "<p class=\"job-desc-txt\"> Accepted Jobs </p>";
                    echo "</div>";

                    echo "<div class=\"display-boxes\" onclick=\"location.href='Listed-Completed-Jobs.php'\">";
                        if ($numberOfRows == 0)
                        {
                            echo "<div class=\"RowZero\">";
                        }
                        else
                        {
                            echo "<div class=\"RowExtends\">";
                        }
                        echo $numberOfRows;
                        echo "</div>";
                        echo "<p class=\"job-desc-txt\"> Completed Jobs </p>";
                    echo "</div>";

                    echo "</div>";
                }
                else if(isset($_SESSION["UserType"]) == "Estimator") {
                }
            ?> 
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