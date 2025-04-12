<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PikPazar</title>
    <link rel="stylesheet" type="text/css" href="E-Ticaret.css">
</head>
<body>
    <?php include("partials/header.php"); ?>
    <?php include("partials/menu.php"); ?>
    <div class="auth-container <?php if(isset($_SESSION['username'])) echo 'logged-in-static'; ?>">
        <div class="auth-toggle">
            <button onclick="showForm('login')">Giriş Yap</button>
            <button onclick="showForm('register')">Kayıt Ol</button>
        </div>

        <div id="login" class="auth-form <?php if(!isset($_SESSION['username'])) echo 'active'; ?>">
            <h3>Giriş Yap</h3>
            <form id="loginForm" action="giris.php" method="post" onsubmit="return submitForm('loginForm', 'giris.php', 'login-message');">
                <input type="text" name="username" placeholder="Kullanıcı Adı" required>
                <input type="password" name="password" placeholder="Şifre" required>
                <input type="submit" value="Giriş Yap">
                <div id="login-message" class="response-message"></div>
            </form>
        </div>

        <div id="register" class="auth-form">
            <h3>Kayıt Ol</h3>
            <form id="registerForm" action="kayıt.php" method="post" onsubmit="return submitForm('registerForm', 'kayıt.php', 'register-message');">
                <input type="text" name="username" placeholder="Kullanıcı Adı" required>
                <input type="email" name="email" placeholder="E-Posta" required>
                <input type="password" name="password" placeholder="Şifre" required>
                <input type="submit" value="Kayıt Ol">
                <div id="register-message" class="response-message"></div>
            </form>
        </div>

        <div class="welcome-container <?php if(isset($_SESSION['username'])) echo 'show-static'; ?>">
            <?php
                session_start();
                if (isset($_SESSION['username'])) {
                    echo 'Hoş geldiniz, <span class="welcome-small">' . htmlspecialchars($_SESSION['username']) . '</span>!';
                }
            ?>
        </div>
    </div>

    <script>
        function showForm(formId) {
            const loginForm = document.getElementById('login');
            const registerForm = document.getElementById('register');

            if (formId === 'login') {
                loginForm.classList.add('active');
                registerForm.classList.remove('active');
            } else if (formId === 'register') {
                registerForm.classList.add('active');
                loginForm.classList.remove('active');
            }
        }

        function submitForm(formId, action, messageId) {
            const form = document.getElementById(formId);
            const messageDiv = document.getElementById(messageId);
            const authContainer = document.querySelector('.auth-container');
            const welcomeContainer = document.querySelector('.welcome-container');
            const formData = new FormData(form);

            fetch(action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                messageDiv.innerHTML = data;
                if (data.includes('başarılı')) {
                    // Giriş başarılıysa
                    if (action === 'giris.php') {
                        authContainer.classList.add('logged-in-static');
                        welcomeContainer.classList.add('show-static');
                        // Başarılı mesajını kısa bir süre gösterip sonra temizle
                        setTimeout(() => {
                            messageDiv.innerHTML = '';
                        }, 1500);
                    } else if (action === 'kayıt.php') {
                        // Kayıt başarılıysa giriş formunu göster ve bilgilendirme mesajı
                        showForm('login');
                        document.getElementById('register-message').innerHTML = '<div class="response-message success">Kayıt başarılı! Giriş yapabilirsiniz.</div>';
                    }
                } else if (data.includes('Yanlış') || data.includes('Lütfen')) {
                    messageDiv.classList.add('error');
                    setTimeout(() => {
                        messageDiv.classList.remove('error');
                        messageDiv.innerHTML = '';
                    }, 3000);
                }
            })
            .catch(error => {
                console.error('Hata:', error);
                messageDiv.innerHTML = '<div class="response-message error">Bir hata oluştu.</div>';
            });

            return false; // Sayfanın yenilenmesini engelle
        }

        // Sayfa yüklendiğinde kullanıcı giriş yapmışsa stil uygula
        document.addEventListener('DOMContentLoaded', function() {
            const authContainer = document.querySelector('.auth-container');
            const welcomeContainer = document.querySelector('.welcome-container');
            if (document.querySelector('.welcome-container').innerHTML.trim() !== '') {
                authContainer.classList.add('logged-in-static');
                welcomeContainer.classList.add('show-static');
            }
        });
    </script>
</body>
</html>