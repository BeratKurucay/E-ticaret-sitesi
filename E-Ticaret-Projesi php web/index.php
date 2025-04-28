<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PikPazar</title>
    <link rel="stylesheet" type="text/css" href="E-Ticaret.css">
    <script>
        function geceModunaGec() {
            document.body.classList.add('gece-modu');
            localStorage.setItem('mod', 'gece');
        }

        function gunduzModunaGec() {
            document.body.classList.remove('gece-modu');
            localStorage.setItem('mod', 'gunduz');
        }

        window.onload = function() {
            if (localStorage.getItem('mod') === 'gece') {
                geceModunaGec();
            }
        };
    </script>
    <style>
        .slider-container {
            width: 80%;
            max-width: 600px;
            margin: 20px auto;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }

        .slider-wrapper {
            display: flex;
            width: 300%;
            transition: transform 0.6s ease-in-out;
            box-sizing: border-box;
        }

        .slide {
            width: calc(100% / 3);
            flex-shrink: 0;
            box-sizing: border-box;
        }

        .slide img {
            display: block;
            width: 100%;
            height: auto;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <?php include("partials/header.php"); ?>
    <?php include("partials/menu.php"); ?>

    <div class="slider-container">
     <div class="slider-wrapper">
         <div class="slide">
             <img src="https://i.hizliresim.com/h8hbpw4.png" alt="Yeni Slider Resmi">
         </div>
         <div class="slide">
             <img src="https://i.hizliresim.com/6ak5bwo.png" alt="İkinci Slider Resmi">
         </div>
         <div class="slide">
             <img src="https://i.hizliresim.com/r4ly40c.png" alt="Üçüncü Slider Resmi">  </div>
     </div>
 </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const authContainer = document.querySelector('.auth-container');
            const welcomeContainer = document.querySelector('.welcome-container');
            if (welcomeContainer && welcomeContainer.innerHTML.trim() !== '') {
                authContainer.classList.add('logged-in-static');
                welcomeContainer.classList.add('show-static');
            }

            const sliderWrapper = document.querySelector('.slider-wrapper');
            const slides = document.querySelectorAll('.slide');
            const slideCount = slides.length;
            let currentIndex = 0;
            const slideWidth = 100 / slideCount;
            let intervalId;
            const autoSlideInterval = 3000;

            function nextSlide() {
                currentIndex = (currentIndex + 1) % slideCount;
                updateSlider();
            }

            function updateSlider() {
                const translateX = -currentIndex * slideWidth;
                sliderWrapper.style.transform = `translateX(${translateX}%)`;
            }

            function startAutoSlide() {
                intervalId = setInterval(nextSlide, autoSlideInterval);
            }

            function stopAutoSlide() {
                clearInterval(intervalId);
            }

            startAutoSlide();

            sliderWrapper.addEventListener('mouseenter', stopAutoSlide);
            sliderWrapper.addEventListener('mouseleave', startAutoSlide);

            // Kargo animasyonu
            const kargoAraci = document.getElementById('kargo-araci');
            const kargoYazisi = document.getElementById('kargo-yazisi');

            if (kargoAraci && kargoYazisi) {
                kargoAraci.style.left = 'calc(100% + 100px)';
                kargoYazisi.style.left = '41%';
            }
        });
    </script>
</body>
</html>
