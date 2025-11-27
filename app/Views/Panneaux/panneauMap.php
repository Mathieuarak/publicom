<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<style>
.panneau-wrap {
    display: flex;
    gap: 1rem;
    align-items: flex-start;
    flex-wrap: wrap;
}
.panneau-list {
    flex: 0 0 35%;
    max-width: 35%;
    min-width: 220px;
}
.panneau-map {
    flex: 1 1 60%;
    min-width: 30px;
    height: 700px;

}
.panneau-list ul { padding-left: 1rem; }
.panneau-list li { margin-bottom: 0.75rem; }
@media (max-width: 800px) {
    .panneau-wrap { flex-direction: column; }
    .panneau-list, .panneau-map { max-width: 100%; flex: 1 1 100%; }
}
</style>

<h1>Carte des panneaux de la commune de (commune)</h1>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<div class="panneau-wrap">
    <div class="panneau-list">
        <?php if (!empty($panneaux)): ?>
            <ul>
                <?php foreach ($panneaux as $i => $panneau): ?>
                    <li>
                        <strong>Panneau n° <?= esc($panneau['NUMERO']) ?></strong><br>
                        <?= esc($panneau['LATITUDE']) ?>, <?= esc($panneau['LONGITUDE']) ?><br>
                        <button type="button" onclick="zoomTo(<?= $i ?>)">Zoom</button>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Aucun panneau à afficher.</p>
        <?php endif; ?>
    </div>

    <div id="map" class="panneau-map"></div>
</div>

<script>
const panneaux = <?= json_encode($panneaux ?? []) ?>;
let mapInstance;
const markers = [];

function initMap() {
    if (!panneaux.length) {
        mapInstance = L.map('map').setView([46.5, 2.0], 6);
    } else {
        const firstLat = parseFloat(String(panneaux[0]['LATITUDE'] || '').replace(',', '.')) || 46.5;
        const firstLng = parseFloat(String(panneaux[0]['LONGITUDE'] || '').replace(',', '.')) || 2.0;
        mapInstance = L.map('map').setView([firstLat, firstLng], 9);
    }

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(mapInstance);

    const bounds = [];
    panneaux.forEach((p, idx) => {
        const lat = parseFloat(String(p['LATITUDE'] || '').replace(',', '.'));
        const lng = parseFloat(String(p['LONGITUDE'] || '').replace(',', '.'));
        if (!isFinite(lat) || !isFinite(lng)) return;
        const m = L.marker([lat, lng]).addTo(mapInstance);
        m.bindPopup(`<b>Panneau n°${p['NUMERO']}</b><br>${lat}, ${lng}`);
        markers.push(m);
        bounds.push([lat, lng]);
    });

    if (bounds.length) {
        mapInstance.fitBounds(bounds, { padding: [40, 40] });
    }
}
function zoomTo(index) {
    const m = markers[index];
    if (!m || !mapInstance) return;
    mapInstance.setView(m.getLatLng(), 16);
    m.openPopup();
}
document.addEventListener('DOMContentLoaded', initMap);
</script>

<?= $this->endSection() ?>