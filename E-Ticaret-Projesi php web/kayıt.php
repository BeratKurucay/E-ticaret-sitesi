<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if (empty($username) || empty($email) || empty($password)) {
            echo '<div class="response-message error">Lütfen tüm alanları doldurun.</div>';
            exit();
        }

        // Göstermelik kontrol (gerçekte veritabanı kontrolü yapılır)
        if ($username === 'kullanici1' || $email === 'test@example.com') {
            echo '<div class="response-message error">Bu kullanıcı adı veya e-posta adresi zaten alınmış.</div>';
            exit();
        }

        echo '<div class="response-message success">Kayıt başarıyla tamamlandı! Giriş yapabilirsiniz.</div>';
        // İsteğe bağlı olarak otomatik giriş için session başlatılabilir.
        exit();

    } else {
        echo '<div class="response-message error">Gerekli alanlar gönderilmedi.</div>';
        exit();
    }
}
?>