<?php
session_start();

// Sepet boşsa anasayfaya yönlendir
if (empty($_SESSION['sepet'])) {
    header("Location: index.php");
    exit;
}

// Toplam tutarı hesapla
$toplam = 0;
foreach ($_SESSION['sepet'] as $urun) {
    $toplam += $urun['fiyat'] * $urun['adet'];
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Ödeme Sayfası</title>
    <link rel="stylesheet" href="sepet.css">
    <style>
        .odeme-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }
        .odeme-form {
            max-width: 400px;
            margin: auto;
        }
    </style>
</head>
<body>

<h1>💳 Ödeme Sayfası</h1>
<div class="ozet">
    <h3>Genel Toplam: <?= number_format($toplam, 2) ?> TL</h3>
    <p>Kargo: Ücretsiz</p>
    <hr>
    <form method="post" class="odeme-form">
        <label>Kart Numarası:</label>
        <input type="text" placeholder="XXXX XXXX XXXX XXXX" required>

        <label>Ad Soyad:</label>
        <input type="text" placeholder="Kart üzerindeki ad soyad" required>

        <label>Son Kullanma Tarihi:</label>
        <input type="text" placeholder="AA/YY" required>

        <label>CVV:</label>
        <input type="text" placeholder="3 haneli güvenlik kodu" required>

        <button type="submit" class="btn btn-odeme">✔️ Ödemeyi Tamamla</button>
    </form>
</div>

</body>
</html>