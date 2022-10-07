<?php
include ('includes/conn.inc.php');
$stmt = $mysqli->prepare("SELECT listingID, userID, Type, Title, Description, image, Claimed, estimatorID FROM Listings WHERE userID=24");
$stmt->execute();
$stmt->bind_result($listingID, $userID, $Type, $Title, $Description, $file, $Claimed, $estimatorID);
$stmt->store_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CustomerDesign.css" type="text/css">
    <title>Document</title>
</head>
<body>

<div class="MenuBar">
<div class="ProfilePic1"></div>
    <p class="namer">Matt Gaffoor</p>
    <p class="roler">(Customer)</p>
    <div class="MenuOptions1" onclick="location.href='CustomerHomepage.php'"><p class="MenuTxt">My Profile</p></div>
    <div class="MenuOptions" onclick="location.href='CustomerSettings.php'"><p class="MenuTxt">Account Settings</p></div>
    <div class="MenuOptions" onclick="location.href='CustomerJobPosting.php'"><p class="MenuTxt">Post a Job</p></div>
    <div class="MenuOptions" onclick="location.href='CustomerActiveJobs.php'"><p class="MenuTxt">Active Job List</p></div>
    <div class="MenuOptions" onclick="location.href='CustomerAcceptedJobs.php'"><p class="MenuTxt">Accepted Jobs</p></div>
    <div class="MenuOptions" onclick="location.href='CustomerPrevJobs.php'"><p class="MenuTxt">Previous Jobs</p></div>
    <div class="MenuOptions" onclick="location.href='NewComplaint.php'"><p class="MenuTxt">Submit Complaint</p></div>
    </div>
<p class="NewUserHeader">Active Jobs:</p>
<table class="NewUserTable">
    <tr>
        <th>Listing ID &emsp;</th>
        <th>Type &emsp;</th>
        <th>Job Title &emsp;</th>
        <th>Job Description &emsp;</th>
        <th>Uploaded Image &emsp;</th>
    </tr>
    <?php
    include ('includes/conn.inc.php');
    $sqli = "SELECT * FROM Listings WHERE userID=24 AND Claimed=0";
    $result = mysqli_query($mysqli, $sqli);
    $count = mysqli_num_rows($result);

    if ($count > 0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
        {
            if ($Claimed == 0)
            {
                    echo "<tr>";
                    echo "<td>"; echo  $row['listingID']; echo "</td>";
                    echo "<td>"; echo  $row['Type']; echo "</td>";
                    echo "<td>"; echo  $row['Title']; echo "</td>";
                    echo "<td>"; echo  $row['Description']; echo "</td>";
                    echo "<td>"; 
                    echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt="image" style="height: 100px; width: 100px;">'; 
                    echo "</td>";
                    echo "</tr>"; 
            }
        }
    }
    else
    {
        echo "<tr>";
            echo "<td colspan=\"6\">No Records Found!</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>