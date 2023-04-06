<?php
    include ('includes/conn.inc.php');
    include('includes/sessions.inc.php');
    include('includes/authenticate.inc.php');
    include_once "header.php";

    $stmt = $mysqli->prepare("SELECT messageID, sendID, recieverID, todayDate, title, subject, isread FROM Messages WHERE recieverID='$_SESSION[usersID]'");
    $stmt->execute();
    $stmt->bind_result($messageID, $userID, $recieverID, $todayDate, $title, $subject, $isread);
    $stmt->store_result();
?>
    <header class="header-body">

        <div class="active-job-box">
            <button class="new-email-button" onclick="location.href='Messages-New.php'"> New Message </button>
            <button class="new-email-button" onclick="location.href='Messages-New.php'"> Deleted Messages </button>
            <h1 class="active-job-header">All Messages: 
            <div class="search-bar-main">
                        <form action="" method="GET">
                            <div class="input-group mb-3">
                            <input type="text" class="searchbar" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" class="form-control" placeholder="Search...">
                            <button type="submit" class="btn">Search</button>
                        </form>
                    </div>
            </h1></button>
                <table class="Table-List">
                    <tr>
                        <th style="width: 140px; height: 30px">Sender ID</th>
                        <th style="width: 1000px;">Title</th>
                        <th style="width: 250px;">Date Sent</th>
                    </tr>
                    </div>

                <?php
                    include ('includes/conn.inc.php');
                    if(isset($_GET['search']))
                    {
                        $filtervalues = $_GET['search'];
                        $query = "SELECT * FROM Messages WHERE CONCAT(sendID, todayDate, title) LIKE '%$filtervalues%' AND recieverID='$_SESSION[usersID]' ORDER BY todayDate DESC";
                        $query_run = mysqli_query($mysqli, $query);
                    
                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $items)
                            {
                                if($items['isread'] == 1)
                                {
                                    ?>
                                    <tbody>
                                        <tr class="message-row" style="color: blue;" onclick="location.href='Messages-Open.php?messageID=<?php echo $items['messageID'] ?>'">
                                            <td><?= $items['sendID']; ?></td>
                                            <td><div style="float:left; margin-left: 10px;"><?= $items['title']; ?></div></td>
                                            <td><div style="float:left; margin-left: 10px;"><?= Date("d-m-Y", strtotime($items['todayDate'])); ?></div></td>
                                        </tr>
                                    </tbody>
                                <?php
                                }
                                else if($items['isread'] == 2)
                                {
                                    ?>
                                    <tbody>
                                        <tr class="message-row2" onclick="location.href='Messages-Open.php?messageID=<?php echo $items['messageID'] ?>'">
                                            <td><?= $items['sendID']; ?></td>
                                            <td><div style="float:left; margin-left: 10px;"><?= $items['title']; ?></div></td>
                                            <td><div style="float:left; margin-left: 10px;"><?= Date("d-m-Y", strtotime($items['todayDate'])); ?></div></td>
                                        </tr>
                                    </tbody>
                                <?php
                                }
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