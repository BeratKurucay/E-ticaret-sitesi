<?php
session_start();

function sepetiGoster() {
    if (empty($_SESSION['sepet'])) {
        echo "<p>Sepetiniz şu anda boş.</p>";
    } else {
        echo "<ul style='list-style:none; padding:0;'>";
        foreach ($_SESSION['sepet'] as $urun) {
            $urunAd = htmlspecialchars($urun['ad']);
            $urunFiyat = htmlspecialchars($urun['fiyat']);
            $urunResim = !empty($urun['resim']) ? htmlspecialchars($urun['resim']) : 'default.png'; // Eğer resim yoksa default resim kullan

            echo "<li style='display:flex; align-items:center; gap:10px; margin-bottom:15px;'>
                    <img src='{$urunResim}' style='width:50px; height:50px; object-fit:cover; border-radius:6px;'>
                    <div><strong>{$urunAd}</strong><br>{$urunFiyat} TL</div>
                  </li>";
        }
        echo "</ul>";
    }
}


?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Sepetim | PikPazar</title>
    <link rel="stylesheet" href="E-Ticaret.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .orta-resim-alani {
            width: 90%;
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.1);
            text-align: center;
        }
        .orta-resim-alani h2 {
            margin-bottom: 20px;
            font-size: 32px;
            color: #222;
        }
        .orta-resim-alani ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .orta-resim-alani li {
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
            font-size: 18px;
            color: #333;
        }
        .orta-resim-alani li:last-child {
            border-bottom: none;
        }
        p {
            font-size: 18px;
            color: #666;
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<div class="orta-resim-alani">
    <h2>Sepetim</h2>
    <?php sepetiGoster(); ?>
</div>
<script>
function sepeteEkle(isim, fiyat, resim) {
  const veri = new FormData();
  veri.append('ad', isim);
  veri.append('fiyat', fiyat);
  veri.append('resim', resim);

  fetch('sepete-ekle.php', {
    method: 'POST',
    body: veri
  }).then(response => response.json())
    .then(data => {
      if (data.success) {
        console.log('PHP oturum sepetine ürün eklendi.');
      }
    }).catch(error => {
      console.error('Sepete ekleme hatası:', error);
    });
}
</script>


</body>
</html>
