<?php
    include ('includes/conn.inc.php');
    include('includes/authenticate.inc.php');
    include_once "header.php";

    $stmt = $mysqli->prepare("SELECT listingID, userID, Type, Title, Description, Claimed, estimatorID, Imgpic FROM Listings WHERE userID='$_SESSION[usersID]' AND Claimed=1");
    $stmt->execute();
    $stmt->bind_result($listingID, $userID, $Type, $Title, $Description, $Claimed, $estimatorID, $Imgpic);
    $stmt->store_result();
?>
    <header class="header-body">

        <div class="active-job-box">
            <h1 class="active-job-header">Active Job List:
                <p class="view-all-link" onclick="location.href='Listed-Active-All.php'">[ Search ]</p>
            </h1>
            <div class="aj-box-containers">
            <?php
                    include ('includes/conn.inc.php');
                    $sqli = "SELECT * FROM Listings WHERE userID=$_SESSION[usersID] AND Claimed=1 ORDER BY listingID DESC LIMIT 4";
                    $result = mysqli_query($mysqli, $sqli);
                    $count = mysqli_num_rows($result);

                    if ($count > 0)
                    {
                        while ($row = mysqli_fetch_assoc($result)) 
                        {
                            if ($Claimed == 0)
                            {
                                echo "<div class=\"active-items\">";
                                    echo "<p class=\"listing-id-number\">$row[listingID]";
                                    echo "<p class=\"listing-type-txt\">$row[Type]</p>";
                                    echo "</p>";
                                    echo "<p class=\"listing-title-txt\">$row[Title]</p>";
                                    echo "<div></div>";
                                    echo "<img class=\"listing-picture-small\"src=\"contract-img/$row[Imgpic]\" alt=\"\">";
                                    echo "<p class=\"listing-desc-txt\">$row[Description]</p>";
                                    if($row['estimatorID'] != NULL) {
                                        echo "<p class=\"listing-estid-number1\">$row[estimatorID]</p>";
                                    } else {
                                        echo "<p class=\"listing-estid-number\">Not Assigned!</p>";
                                    }?>
                                    <p class="see-more-link" onclick="location.href='Expanded-Job.php?listingID=<?php echo $row['listingID'] ?>'"> See Full Details </p>"; <?php
                                echo "</div>";
                            }
                        }
                    }
                    else
                    {
                        echo "<div class=\"no-results-display\">No Results to Dispaly! </div>";
                    }
            ?>
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