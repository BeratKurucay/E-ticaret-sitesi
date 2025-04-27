<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Veritabanına kayıt işlemleri burada yapılacak
    // Veritabanı olmadığı için sadece başarılı mesajı veriyoruz.
    $success = "Kayıt başarılı! Giriş yapabilirsiniz.";
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: bold;
            text-align: left;
        }

        input[type=text], input[type=email], input[type=password] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .success {
            color: green;
            margin-top: 10px;
        }

        p {
            margin-top: 20px;
            color: #777;
        }

        p a {
            color: #007bff;
            text-decoration: none;
        }

        p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Kayıt Ol</h2>
        <?php if (isset($success)): ?>
            <p class="success"><?php echo $success; ?></p>
            <p><a href="giris_sayfasi.php">Giriş Yap</a></p>
        <?php else: ?>
            <form method="post">
                <label for="username">Kullanıcı Adı:</label>
                <input type="text" id="username" name="username" required>
                <label for="email">E-Posta:</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Şifre:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Kayıt Ol</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>