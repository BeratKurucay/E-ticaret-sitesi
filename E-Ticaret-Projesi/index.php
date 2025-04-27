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

        // Sayfa yüklendiğinde kullanıcının tercihini kontrol et
        window.onload = function() {
            if (localStorage.getItem('mod') === 'gece') {
                geceModunaGec();
            }
        };
    </script>
    <style>
        .slider-container {
            width: 80%;
            max-width: 1200px;
            margin: 20px auto;
            overflow: hidden; /* Slaytların dışını gizler */
            border-radius: 8px; /* İsteğe bağlı: Köşeleri yuvarlatır */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* İsteğe bağlı: Gölge ekler */
        }

        .slider-wrapper {
            display: flex; /* Slaytları yan yana dizer */
            width: 300%; /* Örnek: 3 slayt varsa %300 genişlik */
            transition: transform 0.6s ease-in-out; /* Kaydırma animasyonu için geçiş */
            /* JavaScript ile "transform: translateX(-kaydirmaMiktari%);" şeklinde kontrol edilecek */
        }

        .slide {
            width: calc(100% / 3); /* Örnek: 3 slayt varsa her biri %33.33 genişlik */
            flex-shrink: 0; /* Slaytların sıkışmasını önler */
        }

        .slide img {
            display: block;
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <?php include("partials/header.php"); ?>
    <?php include("partials/menu.php"); ?>

    <div class="slider-container">
        <div class="slider-wrapper">
            <div class="slide">
                <img src=".jpg" alt="İlk Slider Resmi">
            </div>
            <div class="slide">
                <img src="resimler/slider2.jpg" alt="İkinci Slider Resmi">
            </div>
            <div class="slide">
                <img src="resimler/slider3.jpg" alt="Üçüncü Slider Resmi">
            </div>
        </div>
    </div>

    <script>
        // Sayfa yüklendiğinde kullanıcı giriş yapmışsa stil uygula
        document.addEventListener('DOMContentLoaded', function() {
            const authContainer = document.querySelector('.auth-container');
            const welcomeContainer = document.querySelector('.welcome-container');
            if (document.querySelector('.welcome-container').innerHTML.trim() !== '') {
                authContainer.classList.add('logged-in-static');
                welcomeContainer.classList.add('show-static');
            }

            // SLIDER JAVASCRIPT BAŞLANGICI
            const sliderWrapper = document.querySelector('.slider-wrapper');
            const slides = document.querySelectorAll('.slide');
            const slideCount = slides.length;
            let currentIndex = 0;
            const slideWidth = 100 / slideCount; // Her slaytın yüzdesi
            let intervalId;
            const autoSlideInterval = 3000; // Kaydırma aralığı (milisaniye)

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

            // Otomatik kaydırmayı başlat
            startAutoSlide();

            // İsteğe bağlı: Fare üzerine gelindiğinde durdurma
            sliderWrapper.addEventListener('mouseenter', stopAutoSlide);
            sliderWrapper.addEventListener('mouseleave', startAutoSlide);
            // SLIDER JAVASCRIPT SONU
        });
    </script>
</body>
</html>