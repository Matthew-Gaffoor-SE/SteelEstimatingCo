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
            <h1 class="active-job-header">All Active Jobs: 
            <div class="search-bar-main">
                        <form action="" method="GET">
                            <div class="input-group mb-3">
                            <input type="text" class="searchbar" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" class="form-control" placeholder="Search...">
                            <button type="submit" class="btn">Search</button>
                        </form>
                    </div>
            </h1>
                <table class="Table-List">
                    <tr>
                        <th style="width: 100px; height: 40px">Job ID</th>
                        <th style="width: 170px;">Job Type</th>
                        <th>Job Title</th>
                        <th style="width: 170px;">Active</th>
                        <th style="width: 170px;">Full Details</th>
                    </tr>
                    </div>
                <?php
                    include ('includes/conn.inc.php');
                    if(isset($_GET['search']))
                    {
                        $filtervalues = $_GET['search'];
                        $query = "SELECT * FROM Listings WHERE CONCAT(listingID, Type, Title, Description, Claimed, Imgpic) LIKE '%$filtervalues%' AND Claimed=1 ORDER BY listingID DESC LIMIT 8";
                        $query_run = mysqli_query($mysqli, $query);
                    
                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $items)
                            {
                            ?>
                            <tbody>
                                <tr>
                                <td><?= $items['listingID']; ?></td>
                                <td><?= $items['Type']; ?></td>
                                <td><div style="float:left; margin-left: 10px;"><?= $items['Title']; ?></div></td>
                                <td><?php if($items['estimatorID'] != NULL) {
                                    $items['estimatorID'];
                                    } else {
                                        echo "<p class=\"est-table-values\">No Offers</p>";
                                    } ?> </td>
                                <td><a href="Estimator-Expanded-Job.php?listingID=<?php echo $items['listingID'] ?>">Expand</a></td>
                                </tr>
                            </tbody>
                                <?php
                            }
                        }
                    }
                    else
                    {
                        ?>
                            <tr>
                                <td colspan="6">No Records Found!</td>
                            </tr>
                        <?php
                    }
                    ?>
                </table>
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