<?php

$serverName = "elaro.database.windows.net"; // Azure portalındaki sunucu adınız
$databaseName = "elaro"; // Bağlanmak istediğiniz veritabanının adı
$userName = "elaroadmin"; // SQL Server kullanıcı adınız
$password = "M3sl3ki.proje"; // SQL Server parolanız

try {
    // PDO bağlantı nesnesini oluştur
    $conn = new PDO(
        "sqlsrv:Server=$serverName;Database=$databaseName",
        $userName,
        $password
    );

    // Hata modunu exception olarak ayarla (önerilir)
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Azure SQL Server'a başarıyla bağlanıldı!\n";

    // Burada veritabanı işlemleri yapabilirsiniz (örneğin, sorgu çalıştırma)

    // Bağlantıyı kapat (isteğe bağlı, PHP otomatik olarak kapatır)
    $conn = null;
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage() . "\n";
}

?>