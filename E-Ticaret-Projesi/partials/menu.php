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
        <li style="clear: both;"></li> </ul>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hesapMenu = document.querySelector('.hesap-menu');
        const hesapDropdown = document.querySelector('.hesap-dropdown');

        if (hesapMenu && hesapDropdown) {
            hesapMenu.addEventListener('mouseover', function() {
                hesapDropdown.style.display = 'block';
            });

            hesapMenu.addEventListener('mouseout', function() {
                hesapDropdown.style.display = 'none';
            });
        }
    });
</script>