<?php
session_start();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PikPazar | Moda ve Alışverişin Merkezi</title>
  <link rel="stylesheet" href="E-Ticaret.css">
  <script src="mod-degistirici.js" defer></script>
  
</head>
<body>

<?php include("partials/header.php"); ?>
<?php include("partials/menu.php"); ?>



<section class="sepet-alani" id="orta-sepet" style="display:none; position:relative;">
  <button id="orta-sepet-kapat" style="position:absolute; top:10px; right:10px; background:red; color:white; border:none; border-radius:50%; width:30px; height:30px; cursor:pointer;">X</button>
  <h2>Sepetiniz</h2>
  <ul id="sepet-listesi"></ul>
</section>

<div id="sepet-popup" style="display:none; position:fixed; top:70px; right:20px; width:300px; background:white; border:1px solid #ccc; border-radius:10px; box-shadow:0 2px 8px rgba(0,0,0,0.2); z-index:9999; padding:20px;">
  <div style="text-align:right;">
    <button id="mini-sepet-kapat" style="background:red; color:white; border:none; border-radius:4px; padding:5px 10px;">X</button>
  </div>
  <h3>Sepetiniz</h3>
  <ul id="sepet-popup-listesi" style="list-style:none; padding:0; margin-top:10px;"></ul>
</div>






<div id="musteri-popup" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.6); justify-content:center; align-items:center; z-index:9999;">
  <div style="background:white; padding:30px; border-radius:10px; text-align:center; max-width:500px; width:90%;">
    <h2>Müşteri Bilgileri</h2>
    <form id="musteri-formu">
      <input type="text" id="adsoyad" placeholder="İsim Soyisim" required style="margin:10px; padding:10px; width:90%;"><br>
      <input type="email" id="email" placeholder="E-Posta" required style="margin:10px; padding:10px; width:90%;"><br>
      <input type="tel" id="telefon" placeholder="Telefon (05XXXXXXXXX)" required style="margin:10px; padding:10px; width:90%;"><br>
      <textarea id="adres" placeholder="Teslimat Adresi" required style="margin:10px; padding:10px; width:90%; height:80px;"></textarea><br>
      <button type="submit" style="background:green; color:white; padding:10px 30px; margin-top:10px; border-radius:6px;">Devam Et</button>
    </form>
    <button id="musteri-kapat" style="margin-top:15px; background:red; color:white; padding:8px 20px; border-radius:5px;">Vazgeç</button>
  </div>
</div>
<div id="sepetModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.7); z-index:9999; justify-content:center; align-items:center;">
    <div id="sepetModalContent"></div>
</div>

<div id="kart-popup" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.6); justify-content:center; align-items:center; z-index:9999;">
  <div style="background:white; padding:30px; border-radius:10px; text-align:center; max-width:500px; width:90%;">
    <h2>Kredi Kartı Bilgileri</h2>
    <form id="kart-formu">
      <input type="text" id="kart-ad" placeholder="Kart Üzerindeki İsim" required style="margin:10px; padding:10px; width:90%;"><br>
      <input type="text" id="kart-numara" placeholder="Kart Numarası (16 hane)" maxlength="16" required style="margin:10px; padding:10px; width:90%;"><br>
      <input type="text" id="kart-ay" placeholder="Ay (MM)" maxlength="2" required style="margin:10px; padding:10px; width:43%; display:inline-block;">
      <input type="text" id="kart-yil" placeholder="Yıl (YY)" maxlength="2" required style="margin:10px; padding:10px; width:43%; display:inline-block;"><br>
      <input type="text" id="kart-cvv" placeholder="CVV (3 hane)" maxlength="3" required style="margin:10px; padding:10px; width:90%;"><br>
      <button type="submit" style="background:green; color:white; padding:10px 30px; margin-top:10px; border-radius:6px;">Ödemeyi Tamamla</button>
    </form>
    <button id="kart-kapat" style="margin-top:15px; background:red; color:white; padding:8px 20px; border-radius:5px;">Vazgeç</button>
  </div>
</div>


<div style="text-align: center; margin-top: 20px;">
  <button id="odeme-yap" style="padding: 12px 30px; font-size: 18px; background: #4CAF50; color: white; border-radius: 8px; border: none; cursor: pointer;">Ödemeyi Tamamla</button>
</div>

<div id="odeme-popup" style="display: none; position: fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.6); z-index:9999; justify-content:center; align-items:center;">
  <div style="background:white; padding:40px; border-radius:10px; text-align:center; max-width:400px; width:90%;">
    <h2>Ödeme Başarılı!</h2>
    <p>Alışverişiniz için teşekkür ederiz. 🎉</p>
    <button id="popup-kapat" style="margin-top:20px; padding:10px 20px; background:#4CAF50; color:white; border:none; border-radius:5px;">Kapat</button>
  </div>
</div>


<section class="urunler-bolumu">
  <h2>Aksesuarlar</h2>
    <div class="urunler-grid">
        <div class="urun-karti">
            <img src="" alt="Kolye">
            <h4>Şık Zincir Kolye</h4>
            <p>199 TL</p>
            <button class="sepete-ekle" data-isim="Şık Zincir Kolye" data-fiyat="199">Sepete Ekle</button>
        </div>
        <div class="urun-karti">
            <img src="" alt="Bileklik">
            <h4>Deri Bileklik</h4>
            <p>149 TL</p>
            <button class="sepete-ekle" data-isim="Deri Bileklik" data-fiyat="149">Sepete Ekle</button>
        </div>
        <div class="urun-karti">
            <img src="" alt="Küpe">
            <h4>Taşlı Küpe</h4>
            <p>99 TL</p>
            <button class="sepete-ekle" data-isim="Taşlı Küpe" data-fiyat="99">Sepete Ekle</button>
        </div>
        <div class="urun-karti">
            <img src="" alt="Şapka">
            <h4>Trend Beyzbol Şapkası</h4>
            <p>129 TL</p>
            <button class="sepete-ekle" data-isim="Trend Beyzbol Şapkası" data-fiyat="129">Sepete Ekle</button>
        </div>
        <div class="urun-karti">
            <img src="" alt="Güneş Gözlüğü">
            <h4>Stil Sahibi Güneş Gözlüğü</h4>
            <p>299 TL</p>
            <button class="sepete-ekle" data-isim="Stil Sahibi Güneş Gözlüğü" data-fiyat="299">Sepete Ekle</button>
        </div>
    </div>
  <h2>Çantalar</h2>
    <div class="urunler-grid">
        <div class="urun-karti">
            <img src="" alt="Omuz Çantası">
            <h4>Şık Omuz Çantası</h4>
            <p>449 TL</p>
            <button class="sepete-ekle" data-isim="Şık Omuz Çantası" data-fiyat="449">Sepete Ekle</button>
        </div>
        <div class="urun-karti">
            <img src="" alt="Sırt Çantası">
            <h4>Fonksiyonel Sırt Çantası</h4>
            <p>599 TL</p>
            <button class="sepete-ekle" data-isim="Fonksiyonel Sırt Çantası" data-fiyat="599">Sepete Ekle</button>
        </div>
        <div class="urun-karti">
            <img src="" alt="El Çantası">
            <h4>Zarif El Çantası</h4>
            <p>699 TL</p>
            <button class="sepete-ekle" data-isim="Zarif El Çantası" data-fiyat="699">Sepete Ekle</button>
        </div>
        <div class="urun-karti">
            <img src="" alt="Postacı Çantası">
            <h4>Trend Postacı Çantası</h4>
            <p>399 TL</p>
            <button class="sepete-ekle" data-isim="Trend Postacı Çantası" data-fiyat="399">Sepete Ekle</button>
        </div>
        <div class="urun-karti">
            <img src="" alt="Cüzdan">
            <h4>Minimalist Cüzdan</h4>
            <p>249 TL</p>
            <button class="sepete-ekle" data-isim="Minimalist Cüzdan" data-fiyat="249">Sepete Ekle</button>
        </div>
    </div>
  <h2>Kadın Elbiseleri</h2>
    <div class="urunler-grid">
        <div class="urun-karti">
            <img src="" alt="Yazlık Elbise">
            <h4>Şık Yazlık Elbise</h4>
            <p>499 TL</p>
            <button class="sepete-ekle" data-isim="Şık Yazlık Elbise" data-fiyat="499">Sepete Ekle</button>
        </div>
        <div class="urun-karti">
            <img src="" alt="Abiye Elbise">
            <h4>Zarif Abiye Elbise</h4>
            <p>799 TL</p>
            <button class="sepete-ekle" data-isim="Zarif Abiye Elbise" data-fiyat="799">Sepete Ekle</button>
        </div>
        <div class="urun-karti">
            <img src="" alt="Günlük Elbise">
            <h4>Rahat Günlük Elbise</h4>
            <p>299 TL</p>
            <button class="sepete-ekle" data-isim="Rahat Günlük Elbise" data-fiyat="299">Sepete Ekle</button>
        </div>
        <div class="urun-karti">
            <img src="" alt="Desenli Elbise">
            <h4>Çiçek Desenli Elbise</h4>
            <p>399 TL</p>
            <button class="sepete-ekle" data-isim="Çiçek Desenli Elbise" data-fiyat="399">Sepete Ekle</button>
        </div>
        <div class="urun-karti">
            <img src="" alt="Mini Elbise">
            <h4>Trend Mini Elbise</h4>
            <p>349 TL</p>
            <button class="sepete-ekle" data-isim="Trend Mini Elbise" data-fiyat="349">Sepete Ekle</button>
        </div>
    </div>
    <h2>Ayakkabılar</h2>
    <div class="urunler-grid">
        <div class="urun-karti">
            <img src="" alt="Spor Ayakkabı">
            <h4>Günlük Spor Ayakkabı</h4>
            <p>549 TL</p>
            <button class="sepete-ekle" data-isim="Günlük Spor Ayakkabı" data-fiyat="549">Sepete Ekle</button>
        </div>
        <div class="urun-karti">
            <img src="" alt="Topuklu Ayakkabı">
            <h4>Şık Topuklu Ayakkabı</h4>
            <p>899 TL</p>
            <button class="sepete-ekle" data-isim="Şık Topuklu Ayakkabı" data-fiyat="899">Sepete Ekle</button>
        </div>
        <div class="urun-karti">
            <img src="" alt="Sneaker">
            <h4>Trend Sneaker</h4>
            <p>699 TL</p>
            <button class="sepete-ekle" data-isim="Trend Sneaker" data-fiyat="699">Sepete Ekle</button>
        </div>
        <div class="urun-karti">
            <img src="" alt="Bot">
            <h4>Konforlu Kışlık Bot</h4>
            <p>749 TL</p>
            <button class="sepete-ekle" data-isim="Konforlu Kışlık Bot" data-fiyat="749">Sepete Ekle</button>
        </div>
        <div class="urun-karti">
            <img src="" alt="Sandalet">
            <h4>Yazlık Rahat Sandalet</h4>
            <p>399 TL</p>
            <button class="sepete-ekle" data-isim="Yazlık Rahat Sandalet" data-fiyat="399">Sepete Ekle</button>
        </div>
    </div>
</section>

<script>
   document.addEventListener("DOMContentLoaded", function () {
    const slides = document.querySelectorAll(".slide");
    let currentIndex = 0;

    function showSlide(index) {
      slides.forEach((slide, i) => {
        slide.classList.remove("aktif");
        if (i === index) {
          slide.classList.add("aktif");
        }
      });
    }

    function nextSlide() {
      currentIndex = (currentIndex + 1) % slides.length;
      showSlide(currentIndex);
    }

    setInterval(nextSlide, 5000);
  });
document.addEventListener('DOMContentLoaded', function () {
  const sepeteEkleButonlari = document.querySelectorAll('.sepete-ekle');
  const odemeYapButonu = document.getElementById('odeme-yap');
  const musteriPopup = document.getElementById('musteri-popup');
  const kartPopup = document.getElementById('kart-popup');
  const musteriFormu = document.getElementById('musteri-formu');
  const kartFormu = document.getElementById('kart-formu');
  const musteriKapat = document.getElementById('musteri-kapat');
  const kartKapat = document.getElementById('kart-kapat');
  const ortaSepet = document.getElementById('orta-sepet');
  const ortaSepetKapat = document.getElementById('orta-sepet-kapat');
  const sepetAcButon = document.getElementById('sepet-ac');
  const sepetListesi = document.getElementById('sepet-listesi');

  let currentSlide = 0;
  let slides = document.querySelectorAll('.slide');
  let sepet = JSON.parse(localStorage.getItem('sepet')) || [];

  const showToast = (msg, duration = 3000) => {
    const toast = document.createElement('div');
    toast.textContent = msg;
    toast.style.position = 'fixed';
    toast.style.bottom = '30px';
    toast.style.right = '30px';
    toast.style.backgroundColor = '#323232';
    toast.style.color = '#fff';
    toast.style.padding = '10px 20px';
    toast.style.borderRadius = '6px';
    toast.style.boxShadow = '0 2px 10px rgba(0,0,0,0.2)';
    toast.style.zIndex = 10000;
    document.body.appendChild(toast);
    setTimeout(() => toast.remove(), duration);
  };

  function nextSlide() {
    slides[currentSlide].classList.remove('aktif');
    currentSlide = (currentSlide + 1) % slides.length;
    slides[currentSlide].classList.add('aktif');
  }
  setInterval(nextSlide, 4000);

  function sepetiGuncelle() {
    sepetListesi.innerHTML = '';
    if (sepet.length === 0) {
      odemeYapButonu.style.display = 'none';
      return;
    }
    let toplamFiyat = 0;
    sepet.forEach(function (urun, index) {
      toplamFiyat += urun.adet * urun.fiyat;
      const li = document.createElement('li');
      li.innerHTML = `
        <div style="display:flex; align-items:center; gap:10px;">
          <img src="${urun.resim}" style="width:50px; height:50px; object-fit:cover; border-radius:5px;">
          <div>
            <strong>${urun.ad}</strong><br>
            ${urun.fiyat} TL x ${urun.adet} = <strong>${(urun.fiyat * urun.adet).toFixed(2)} TL</strong><br>
            <button title="Azalt" class="azalt" data-index="${index}" style="margin-top:5px;">-</button>
            <button title="Arttır" class="arttir" data-index="${index}" style="margin-top:5px;">+</button>
            <button title="Sil" class="sil" data-index="${index}" style="background:red; color:white; margin-top:5px;">Sil</button>
          </div>
        </div>
      `;
      sepetListesi.appendChild(li);
    });

    const toplamLi = document.createElement('li');
    toplamLi.innerHTML = `
      <div style="margin-top:20px; text-align:center;">
        <strong>Toplam Tutar: ${toplamFiyat.toFixed(2)} TL</strong><br><br>
        <button id="siparis-iptal" style="background: darkred; color: white; padding:10px 20px; border:none; border-radius:8px; cursor:pointer; font-size:16px;">🛑 Siparişimi İptal Et</button>
      </div>
    `;
    toplamLi.style.marginTop = '10px';
    toplamLi.style.borderTop = '1px solid #ccc';
    toplamLi.style.paddingTop = '10px';
    sepetListesi.appendChild(toplamLi);

    localStorage.setItem('sepet', JSON.stringify(sepet));

    const siparisIptalButonu = document.getElementById('siparis-iptal');
    if (siparisIptalButonu) {
      siparisIptalButonu.addEventListener('click', function () {
        if (confirm('Tüm siparişi iptal etmek istediğinize emin misiniz?')) {
          sepet = [];
          localStorage.removeItem('sepet');
          ortaSepet.style.display = 'none';
          odemeYapButonu.style.display = 'none';
          showToast('Siparişiniz iptal edildi.');
          sepetiGuncelle();
        }
      });
    }
  }

  sepeteEkleButonlari.forEach(function (button) {
    button.addEventListener('click', function () {
      const isim = this.getAttribute('data-isim');
      const fiyat = parseFloat(this.getAttribute('data-fiyat'));
      const resim = this.parentElement.querySelector('img').src;
      const mevcutUrun = sepet.find(urun => urun.ad === isim);

      if (mevcutUrun) {
        mevcutUrun.adet++;
      } else {
        sepet.push({ ad: isim, fiyat: fiyat, adet: 1, resim: resim });
      }

      showToast(`${isim} sepete eklendi.`);
      sepetiGuncelle();
    });
  });

  sepetListesi.addEventListener('click', function (e) {
    const index = e.target.getAttribute('data-index');
    if (!index) return;

    if (e.target.classList.contains('azalt')) {
      sepet[index].adet--;
      if (sepet[index].adet <= 0) sepet.splice(index, 1);
    } else if (e.target.classList.contains('arttir')) {
      sepet[index].adet++;
    } else if (e.target.classList.contains('sil')) {
      sepet.splice(index, 1);
    }
    sepetiGuncelle();
  });

  odemeYapButonu.addEventListener('click', function () {
    if (sepet.length === 0) {
      alert("Sepetiniz boş!");
    } else {
      musteriPopup.style.display = 'flex';
    }
  });

  musteriFormu.addEventListener('submit', function (e) {
    e.preventDefault();
    musteriPopup.style.display = 'none';
    kartPopup.style.display = 'flex';
  });

  kartFormu.addEventListener('submit', function (e) {
    e.preventDefault();
    alert("Ödeme başarılı! 🎉 Siparişiniz alınmıştır!");
    sepet = [];
    localStorage.removeItem('sepet');
    kartPopup.style.display = 'none';
    odemeYapButonu.style.display = 'none';
    ortaSepet.style.display = 'none';
    showToast('Ödeme başarılı. Siparişiniz alındı.');
    sepetiGuncelle();
  });

  musteriKapat.addEventListener('click', function () {
    musteriPopup.style.display = 'none';
  });

  kartKapat.addEventListener('click', function () {
    kartPopup.style.display = 'none';
  });

  sepetAcButon.addEventListener('click', function () {
    ortaSepet.style.display = 'block';
    odemeYapButonu.style.display = 'inline-block';
    window.scrollTo({ top: ortaSepet.offsetTop - 100, behavior: 'smooth' });
  });

  ortaSepetKapat?.addEventListener('click', function () {
    ortaSepet.style.display = 'none';
    odemeYapButonu.style.display = 'none';
  });

  sepetiGuncelle();
});


</script>
</body>
</html>
