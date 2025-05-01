<div id="markaFont" style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 20px; padding: 20px;">
  <div style="display: flex; align-items: center; gap: 12px;">
    <img src="https://i.hizliresim.com/2yitbn0.png" alt="PikPazarıM Logo" style="height: 149px;">
    <h1 id="marka" style="font-size: 280px; font-weight: 700; color: #1a1a1a; margin: 0;"></h1>
  </div>

  <div style="flex-grow: 1; max-width: 500px;">
    <form id="aramaFormu" action="arama.php" method="GET" style="display: flex;">
      <input type="text" id="aramaInput" name="q" placeholder="Ürün ara..." required 
             style="flex-grow:1; padding: 10px 15px; border-radius: 25px 0 0 25px; border: 1px solid #ccc; outline: none;">
      <button type="submit" style="padding: 10px 20px; border: none; background: #FFD700; border-radius: 0 25px 25px 0; cursor: pointer; font-weight: bold;">Ara</button>
    </form>
  </div>

  <div class="mod-degistirici" style="display: flex; align-items: center; gap: 10px;">
    <button id="gunduzModu" onclick="gunduzModunaGec()" title="Gündüz Modu" style="font-size: 20px; background: none; border: none;">☀️</button>
    <button id="geceModu" onclick="geceModunaGec()" title="Gece Modu" style="font-size: 20px; background: none; border: none;">🌙</button>
    <button id="sepet-ac" class="sepet-buton" style="padding: 8px 16px; background: #4CAF50; color: white; border: none; border-radius: 8px; font-weight: bold; cursor: pointer;">🛒 Sepetim</button>
  </div>
</div>
