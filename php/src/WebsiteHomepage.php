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
    <button type="LogIn" class="Sbtn" name="btn-update" id="btn-update" onClick="" style="background-color: blue"><strong>Log In</strong></button>
    <button type="SignUp" class="Sbtn" name="btn-update" id="btn-update" onClick=""><strong>Sign Up</strong></button>
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