
document.addEventListener('DOMContentLoaded', () => {
  // === SLIDER ===
  let currentIndex = 0;
  const slides = document.querySelectorAll('.anaslider-slide');
  const sliderWrapper = document.querySelector('.anaslider-wrapper');
  const totalSlides = slides.length;

  function showSlide(index) {
    if (sliderWrapper) {
      sliderWrapper.style.transform = `translateX(-${index * 100}%)`;
    }
  }

  function nextSlide() {
    currentIndex = (currentIndex + 1) % totalSlides;
    showSlide(currentIndex);
  }

  if (slides.length > 0) {
    setInterval(nextSlide, 4000);
  }

  // === SEPET ===
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
  const sepetListesi = document.getElementById('sepet-listesi');
  const sepetAcButon = document.getElementById('sepet-ac');

  let sepet = JSON.parse(localStorage.getItem('sepet')) || [];

  function showToast(msg, duration = 3000) {
    const toast = document.createElement('div');
    toast.textContent = msg;
    Object.assign(toast.style, {
      position: 'fixed',
      bottom: '30px',
      right: '30px',
      backgroundColor: '#323232',
      color: '#fff',
      padding: '10px 20px',
      borderRadius: '6px',
      boxShadow: '0 2px 10px rgba(0,0,0,0.2)',
      zIndex: '10000'
    });
    document.body.appendChild(toast);
    setTimeout(() => toast.remove(), duration);
  }

  function sepetiGuncelle() {
    sepetListesi.innerHTML = '';
    if (sepet.length === 0) {
      odemeYapButonu.style.display = 'none';
      return;
    }

    let toplamFiyat = 0;
    sepet.forEach((urun, index) => {
      toplamFiyat += urun.adet * urun.fiyat;
      const li = document.createElement('li');
      li.innerHTML = `
        <div style="display:flex; align-items:center; gap:10px;">
          <img src="${urun.resim}" style="width:50px; height:50px; object-fit:cover; border-radius:5px;">
          <div>
            <strong>${urun.ad}</strong><br>
            ${urun.fiyat} TL x ${urun.adet} = <strong>${(urun.fiyat * urun.adet).toFixed(2)} TL</strong><br>
            <button class="azalt" data-index="${index}">-</button>
            <button class="arttir" data-index="${index}">+</button>
            <button class="sil" data-index="${index}" style="background:red; color:white;">Sil</button>
          </div>
        </div>`;
      sepetListesi.appendChild(li);
    });

    const toplamLi = document.createElement('li');
    toplamLi.innerHTML = `
      <div style="margin-top:20px; text-align:center;">
        <strong>Toplam Tutar: ${toplamFiyat.toFixed(2)} TL</strong><br><br>
        <button id="siparis-iptal" style="background: darkred; color: white; padding:10px 20px; border:none; border-radius:8px; cursor:pointer;">🛑 Siparişi İptal Et</button>
      </div>`;
    sepetListesi.appendChild(toplamLi);

    localStorage.setItem('sepet', JSON.stringify(sepet));

    document.getElementById('siparis-iptal')?.addEventListener('click', () => {
      if (confirm('Siparişi iptal etmek istiyor musunuz?')) {
        sepet = [];
        localStorage.removeItem('sepet');
        ortaSepet.style.display = 'none';
        odemeYapButonu.style.display = 'none';
        document.body.classList.remove('sepet-acik');
        sepetiGuncelle();
        showToast('Sipariş iptal edildi');
      }
    });
  }

  sepeteEkleButonlari.forEach(btn => {
    btn.addEventListener('click', () => {
      const isim = btn.getAttribute('data-isim');
      const fiyat = parseFloat(btn.getAttribute('data-fiyat'));
      const resim = btn.getAttribute('data-resim') || btn.parentElement.querySelector('img')?.src || '';
      const mevcut = sepet.find(u => u.ad === isim);

      if (mevcut) {
        mevcut.adet++;
      } else {
        sepet.push({ ad: isim, fiyat, adet: 1, resim });
      }

      sepetiGuncelle();
      showToast(`${isim} sepete eklendi`);
    });
  });

  sepetListesi.addEventListener('click', e => {
    const index = e.target.getAttribute('data-index');
    if (index === null) return;

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

  odemeYapButonu?.addEventListener('click', () => {
    if (sepet.length === 0) {
      alert("Sepetiniz boş!");
    } else {
      musteriPopup.style.display = 'flex';
    }
  });

  musteriFormu?.addEventListener('submit', e => {
    e.preventDefault();
    musteriPopup.style.display = 'none';
    kartPopup.style.display = 'flex';
  });

  kartFormu?.addEventListener('submit', e => {
    e.preventDefault();
    alert("Ödeme başarılı!");
    sepet = [];
    localStorage.removeItem('sepet');
    kartPopup.style.display = 'none';
    ortaSepet.style.display = 'none';
    odemeYapButonu.style.display = 'none';
    document.body.classList.remove('sepet-acik');
    sepetiGuncelle();
  });

  musteriKapat?.addEventListener('click', () => musteriPopup.style.display = 'none');
  kartKapat?.addEventListener('click', () => kartPopup.style.display = 'none');
  ortaSepetKapat?.addEventListener('click', () => {
    ortaSepet.style.display = 'none';
    odemeYapButonu.style.display = 'none';
    document.body.classList.remove('sepet-acik');
  });

  sepetAcButon?.addEventListener('click', () => {
    ortaSepet.style.display = 'block';
    odemeYapButonu.style.display = 'inline-block';
    document.body.classList.add('sepet-acik');
  });

  sepetiGuncelle();
});
