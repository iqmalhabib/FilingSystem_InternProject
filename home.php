<?php
    include('authentication.php');  
    include('includes/header.php');

?>
<style>
    body {
    margin: 0;
    overflow: hidden;
}

.background-slider {
    width: 100%;
    height: 90vh;
    position: relative;
    overflow: hidden;
}

.background-slide {
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center;
    position: absolute;
    opacity: 0;
    transition: opacity 1s ease;
}
.background-slide:nth-child(1) {
    background-image: url('gambar/kl.jpg');
}

.background-slide:nth-child(2) {
    background-image: url('gambar/mitrans.jpg');
}

.background-slide:nth-child(3) {
    background-image: url('gambar/uitm.jpeg');
}
    </style>   
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                    <?php
                    if(isset($_SESSION['status']))
                    {
                        echo "<h5 class='alert alert-success'>".$_SESSION['status']."</h5>";
                        unset($_SESSION['status']);
                    }
                    ?>

                <h2 style="text-align:center">Welcome to Mitrans Filing System</h2> 
            </div>
        </div>         
    </div>
    <div class="background-slider">
        <div class="background-slide"></div>
        <div class="background-slide"></div>
        <div class="background-slide"></div>
    </div>
<script>
    const slides = document.querySelectorAll('.background-slide');
let currentSlide = 0;

function showSlide(n) {
    slides[currentSlide].style.opacity = 0;
    currentSlide = (n + slides.length) % slides.length;
    slides[currentSlide].style.opacity = 1;
}

function nextSlide() {
    showSlide(currentSlide + 1);
}

function startSlideShow() {
    setInterval(nextSlide, 3000); // Change slide every 5 seconds (adjust as needed)
}

showSlide(currentSlide);
startSlideShow();
    </script>
<?php

    include('includes/footer.php');
    
?>