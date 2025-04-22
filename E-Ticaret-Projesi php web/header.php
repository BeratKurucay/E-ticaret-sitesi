<div id="markaFont">
    <h1 id="marka">PikPazarıM</h1>
    <p id="slogan">Hızlı ve Anında Alışveriş</p>
    <div class="arama-cubugu">
        <form id="aramaFormu" action="arama.php" method="GET">
            <input type="text" id="aramaInput" class="arama-cubugu-input" placeholder="Ürün ara..." name="q" required>
            <button type="submit">Ara</button>
        </form>
    </div>
    <div class="mod-degistirici">
        <button id="gunduzModu" onclick="gunduzModunaGec()">&#9728;</button>
        <button id="geceModu" onclick="geceModunaGec()">&#127769;</button>
    </div>
</div>