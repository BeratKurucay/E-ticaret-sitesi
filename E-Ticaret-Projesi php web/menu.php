<div class="category-menu">
     <ul class="menu-list">
         <li class="menu-item">Ana Sayfa</li>
         <li class="menu-item">Kadın
             <ul class="submenu">
                 <li class="submenu-item">Elbiseler</li>
                 <li class="submenu-item">Ayakkabılar</li>
                 <li class="submenu-item">Aksesuarlar</li>
             </ul>
         </li>
         <li class="menu-item">Erkek
             <ul class="submenu">
                 <li class="submenu-item">Tişörtler</li>
                 <li class="submenu-item">Pantolonlar</li>
                 <li class="submenu-item">Ayakkabılar</li>
             </ul>
         </li>
         <li class="menu-item">Çocuk
             <ul class="submenu">
                 <li class="submenu-item">Kız Çocuk</li>
                 <li class="submenu-item">Erkek Çocuk</li>
             </ul>
         </li>
         <li class="menu-item">
             <a href="#">Hesabım</a>
             <ul class="submenu">
                 <?php if (isset($_SESSION['username'])): ?>
                     <li class="submenu-item"><span class="welcome-text">Hoş geldiniz, <?php echo htmlspecialchars($_SESSION['username']); ?></span></li>
                     <li class="submenu-item"><a href="cikis.php">Çıkış Yap</a></li>
                 <?php else: ?>
                     <li class="submenu-item"><a href="giris_sayfasi.php">Giriş Yap</a></li>
                     <li class="submenu-item"><a href="kayit_sayfasi.php">Kayıt Ol</a></li>
                 <?php endif; ?>
             </ul>
         </li>
         <li style="clear: both;"></li>
     </ul>
 </div>
 
<div class="kargo-container">
     <img id="kargo-araci" src="https://i.hizliresim.com/kpxf42m.png" alt="Kargo Aracı">
     <span id="kargo-yazisi">Siparişiniz 24 Saatte Kapınızda</span>
 </div>
 
 <script>
     document.addEventListener('DOMContentLoaded', function() {
         const kargoAraci = document.getElementById('kargo-araci');
         const kargoYazisi = document.getElementById('kargo-yazisi');
         let animasyonDevamEdiyor = false;
         let animasyonZamanlayici;
 
         function baslatKargoAnimasyonu() {
             if (animasyonDevamEdiyor) return;
             animasyonDevamEdiyor = true;
 
             // Animasyonu başlat
             kargoAraci.style.transition = 'left 5s linear';
             kargoAraci.style.left = 'calc(100% + 100px)';
             kargoYazisi.style.opacity = 1;
             kargoYazisi.style.left = '41%';
 
             // 7 saniye sonra yazıyı sakla ve animasyonu tekrar başlat
             animasyonZamanlayici = setTimeout(function() {
                 kargoYazisi.style.opacity = 0;
                 setTimeout(sifirlaKargoAnimasyonu, 500);
             }, 5000 + 4000); // 5 saniye (animasyon süresi) + 7 saniye (bekleme süresi)
         }
 
         function sifirlaKargoAnimasyonu() {
             clearTimeout(animasyonZamanlayici);
             animasyonDevamEdiyor = false;
             kargoAraci.style.transition = 'none';
             kargoAraci.style.left = '-100px';
             kargoYazisi.style.transition = 'none';
             kargoYazisi.style.left = '-40%';
             kargoYazisi.style.opacity = 0;
             setTimeout(() => {
                 kargoYazisi.style.opacity = 0;
                 kargoAraci.style.left = '-100px';
                 kargoYazisi.style.transition = 'left 4s linear';
                 kargoYazisi.style.opacity = 1;
                 kargoYazisi.style.left = '41%';
                 setTimeout(baslatKargoAnimasyonu, 100);
             }, 100);
         }
 
         // Animasyonu başlat
         setTimeout(baslatKargoAnimasyonu, 100); // Sayfa yüklendikten 0.1 saniye sonra başlat
     });
 </script>
