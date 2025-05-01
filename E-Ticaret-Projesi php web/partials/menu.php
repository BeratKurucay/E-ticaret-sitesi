<div class="category-menu">
    <ul class="menu-list">
        <li class="menu-item"><a href="index.php">Ana Sayfa</a></li>
        <li class="menu-item"><a href="kadin.php">Kadın</a>
            <ul class="submenu">
                <li class="submenu-item"><a href="elbiseler.php">Elbiseler</a></li>
                <li class="submenu-item"><a href="ayakkabılar.php">Ayakkabılar</a></li>
                <li class="submenu-item"><a href="cantalar.php">Çantalar</a></li>
                <li class="submenu-item"><a href="Aksesuarlar.php">Aksesuarlar</a></li>
            </ul>
        </li>
        <li class="menu-item"><a href="erkek.php">Erkek</a>
            <ul class="submenu">
                <li class="submenu-item"><a href="gomlek.php">Gömlek</a></li>
                <li class="submenu-item"><a href="pantolon.php">Pantolon</a></li>
                <li class="submenu-item"><a href="ceket.php">Ceket</a></li>
                <li class="submenu-item"><a href="ayakkabılar2.php">Ayakkabılar</a></li>
            </ul>
        </li>
  <li class="menu-item has-submenu">
    <a href="#">Çocuk</a>
    <ul class="submenu">
        <li class="submenu-item has-subcategory">
            <a href="#">Kız Çocuk</a>
            <div class="subcategory">
                <a href="#">Kıyafetler</a>
                <a href="#">Ayakkabılar</a>
                <a href="#">Aksesuarlar</a>
                <a href="#">... (Diğer alt kategoriler)</a>
            </div>
        </li>
        <li class="submenu-item has-subcategory">
    <a href="#">Erkek Çocuk</a>
    <div class="subcategory">
        <a href="#">Kıyafetler</a>
        <a href="#">Ayakkabılar</a>
        <a href="#">Aksesuarlar</a>
        <a href="#">Oyuncaklar</a>
        <a href="#">Spor Giyim</a>
    </div>
</li></li>
       <li class="submenu-item has-subcategory">
    <a href="#">Bebek</a>
    <div class="subcategory">
        <a href="#">Kıyafetler</a>
        <a href="#">Ayakkabılar</a>
        <a href="#">Aksesuarlar</a>
        <a href="#">Oyuncaklar</a>
        <a href="#">Spor Giyim</a>
    </div>
</li>
    </ul>
</li>
        <li class="menu-item">Aksesuarlar</li>
        <li class="menu-item">İndirimdekiler</li>
        <li class="menu-item">
            <a href="#">Hesabım</a>
            <ul class="submenu">
                <?php if (isset($_SESSION['username'])): ?>
                    <li class="submenu-item"><span class="welcome-text">Hoş geldiniz, <?php echo htmlspecialchars($_SESSION['username']); ?></span></li>
                    <li class="submenu-item"><a href="cikis.php">Çıkış Yap</a></li>
                <?php else: ?>
                    <li class="submenu-item"><a href="giris.php">Giriş Yap</a></li>
                    <li class="submenu-item"><a href="kayıt.php">Kayıt Ol</a></li>
                <?php endif; ?>
            </ul>
        </li>
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

            kargoAraci.style.transition = 'left 5s linear';
            kargoAraci.style.left = 'calc(100% + 100px)';
            kargoYazisi.style.opacity = 1;
            kargoYazisi.style.left = '41%';

            animasyonZamanlayici = setTimeout(function() {
                kargoYazisi.style.opacity = 0;
                setTimeout(sifirlaKargoAnimasyonu, 500);
            }, 5000 + 4000);
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

        setTimeout(baslatKargoAnimasyonu, 100);
    });
</script>