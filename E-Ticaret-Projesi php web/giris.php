<?php
session_start();

// Tanımlı kullanıcı bilgileri (göstermelik)
$kullanicilar = [
    'kullanici1' => 'sifre123',
    'testuser' => 'gizli',
    'demo' => 'parola'
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if (empty($username) || empty($password)) {
            echo '<div class="response-message error">Lütfen kullanıcı adı ve şifreyi girin.</div>';
            exit();
        }

        if (isset($kullanicilar[$username]) && $kullanicilar[$username] === $password) {
            $_SESSION['username'] = $username;
            echo '<div class="response-message success">Giriş başarılı! Yönlendiriliyorsunuz...</div>';
            exit();
        } else {
            echo '<div class="response-message error">Yanlış kullanıcı adı veya şifre.</div>';
            exit();
        }
    } else {
        echo '<div class="response-message error">Kullanıcı adı veya şifre gönderilmedi.</div>';
        exit();
    }
}
?>