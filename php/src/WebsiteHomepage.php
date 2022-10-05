<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="WebsiteHomepage.css" type="text/css">
    <script src="note.js" defer></script>
    <title>Website Homepage</title>
</head>
<body>
    <div class="MenuBar">
        <p class="Logo">S<span style="font-size: 20px">teel</span></p><p class="Logo">E<span style="font-size: 20px">stimating</span></p><p class="Logo">C<span style="font-size: 20px">o</span></p>
    <button type="LogIn" class="lib" name="btn-update" id="btn-update" onClick=""><strong>LOG IN</strong></button>
    <button type="SignUp" class="sub" name="btn-update" id="btn-update" onclick="location.href='RegisterNewUser.php'"><strong>SIGN UP</strong></button>
    </div>
    
    <div class="MainPanel">

    </div>
    <div class="PictureSlider">

            <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
            <img src="SteelPic1.jpeg">
        </div>

        <div class="mySlides fade">
            <img src="SteelPic2.jpeg">
        </div>

        <div class="mySlides fade">
            <img src="SteelPic3.jpeg">
        </div>

    </div>
    <div class="AboutUs">

    <p class="HeaderText">About us</p>
    <p class="MainText">Engineering related and technical consulting activities. </br> Our aim is to take jobs posted on our site and price up </br>all the required steel required on your behalf.</p>
    <p class="DetailText">Founded by Rikki James</p>
    <p class="AddressText">220A Thompson Hill, High Green, United Kingdom, Sheffield, S35 4JW</p>


    </div>


    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        slides[slideIndex-1].style.display = "block";
        setTimeout(showSlides, 5000);
        }
    </script>
</body>
</html>