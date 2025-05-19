<?php
session_start();

if (isset($_GET['sil'])) {
    unset($_SESSION['sepet'][$_GET['sil']]);
    header("Location: sepet.php");
    exit;
}

if (isset($_GET['temizle'])) {
    unset($_SESSION['sepet']);
    header("Location: sepet.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['guncelle'])) {
    foreach ($_POST['adet'] as $id => $adet) {
        $_SESSION['sepet'][$id]['adet'] = max(1, intval($adet));
    }
    header("Location: sepet.php");
    exit;
}

$urunler = [
    1 => ['ad' => 'DD NATUREL DİŞ TEMİZLEYİCİ', 'fiyat' => 120, 'resim' => 'https://i.hizliresim.com/7m4wul1.png'],
    2 => ['ad' => 'DD NATUREL SOLİSYON', 'fiyat' => 175, 'resim' => 'https://i.hizliresim.com/3cuyx7z.png']
];

if (!isset($_SESSION['sepet'])) {
    $_SESSION['sepet'] = [
        1 => ['urun_id' => 1, 'adet' => 1] + $urunler[1],
        2 => ['urun_id' => 2, 'adet' => 1] + $urunler[2],
    ];
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Alışveriş Sepetiniz</title>
    <link rel="stylesheet" href="sepet.css">
</head>
<body>

<h1>Alışveriş Sepetiniz</h1>
<div class="sepet">
    <form method="post" class="urun-listesi">
        <?php
        $toplam = 0;
        foreach ($_SESSION['sepet'] as $id => $urun):
            $urun_toplam = $urun['fiyat'] * $urun['adet'];
            $toplam += $urun_toplam;
        ?>
        <div class="urun">
            <img src="<?= $urun['resim'] ?>" alt="">
            <div style="flex-grow:1">
                <div class="urun-ad"><?= $urun['ad'] ?></div>
                <div><?= number_format($urun['fiyat'], 2) ?> TL</div>
            </div>
            <input type="number" name="adet[<?= $id ?>]" value="<?= $urun['adet'] ?>" class="adet-input" min="1">
            <div style="margin-left: 20px;"><?= number_format($urun_toplam, 2) ?> TL</div>
            <a href="?sil=<?= $id ?>" class="btn-sil">🗑</a>
        </div>
        <?php endforeach; ?>
        <div class="alt-bar">
            <a href="index.php">← Alışverişe Devam Et</a>
            <button type="submit" name="guncelle" class="btn btn-guncelle">🔄 Sepeti Güncelle</button>
        </div>
    </form>

    <div class="ozet">
        <h3>Sipariş Özeti</h3>
        <p>Ara Toplam: <?= number_format($toplam, 2) ?> TL</p>
        <p>Kargo: Hesaplanacak</p>
        <hr>
        <p><strong>Genel Toplam:</strong> <?= number_format($toplam, 2) ?> TL</p>
        <br>
        <a href="odeme.php" class="btn btn-odeme">💳 Ödemeye Geç</a>
        <br><br>
        <a href="?temizle=1" class="btn-temizle">❌ Sepeti Temizle</a>
    </div>
</div>

</body>
</html>