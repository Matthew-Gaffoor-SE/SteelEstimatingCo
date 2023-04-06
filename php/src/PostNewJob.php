<?php
    include ('includes/conn.inc.php');
    include('includes/sessions.inc.php');
    include('includes/authenticate.inc.php');
    include_once "header.php";

    if(isset($_POST['submit']))
    {
        $file = $_FILES['file'];

        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png', 'pdf');

        if(in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = 'contract-img/'.$fileNameNew;
                    if(file_exists($fileNameNew)) unlink($fileNameNew);
                    move_uploaded_file($fileTmpName, $fileDestination);
                }
                else {
                    echo "File size too large!";
                }
            } else {
                echo "There was an error uploading your file!";
            }
        } else {
            echo "File type not accepted for upload!";
        }

        $stmt = $mysqli->prepare("INSERT INTO Listings(userID, Type, Title, Description, Imgpic) VALUES ($_SESSION[usersID], ?, ?, ?, '$fileNameNew')");
        $stmt->bind_param('sss',
        $_POST['Type'],
        $_POST['Title'],
        $_POST['Description']);
        $stmt->execute();
        $newId = $stmt->insert_id;
        $stmt->close();
    }
?>
    <header class="header-body">

        <div class="new-job-box">
        <h1 class="new-job-header">New Job Details:</h1>

            <form method="POST" enctype="multipart/form-data">
                <div class="spacer-job"></div>
                <label class="job-number-text">User ID Number: &nbsp &nbsp</label><input class="label-job-text" type="text" name="userID" placeholder="userID" value="<?php echo $_SESSION['usersID']; ?>" readonly><br/><br/>

                <div class="option-spacer"></div>
                <label class="title-label-header">Job Title: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp</label><input class="label-job-text" type="text" name="Title" placeholder="Job Title" required>
                <div class="option-spacer"></div>
                <p class="job-type-option">Select Job Type:
                <select name="Type" id="Type" class="type-options">
                    <option value="Personal">Personal</option>
                    <option value="Business">Business</option>
                </select>
                </p>
                <div></div>
                <div class="option-spacer"></div>
                <p class="image-upload-text">Upload Template:

                <input class="file-button" type="file" name="file" required>
                </p>

                <textarea class="description-text-area" rows="15" cols="70" placeholder="Additional Information.." name="Description" required></textarea>
                <div></div>
                <button class="job-post-button" type="submit" name="submit"> Submit </button>
            </form>
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