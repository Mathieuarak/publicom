<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<h1>Carte des panneaux de la commune de (commune)</h1>

<div id="map" style="height: 500px; width: 100%;"></div>

<?php if (!empty($panneaux)): ?>
    <ul>
        <?php foreach ($panneaux as $panneau): ?>
            <li>
                Panneau n° <?= esc($panneau['NUMERO']) ?><br>
                Coordonnées : <?= esc($panneau['LATITUDE']) ?>, <?= esc($panneau['LONGITUDE']) ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucun panneau à afficher.</p>
<?php endif; ?>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
let mapInstance;
const panneaux = <?= json_encode($panneaux) ?>;

if (panneaux.length > 0) {

    const lat = parseFloat(panneaux[0]['LATITUDE']);
    const lng = parseFloat(panneaux[0]['LONGITUDE']);

    if (mapInstance && mapInstance.remove) {
        mapInstance.off();
        mapInstance.remove();
    }

    mapInstance = L.map('map').setView([lat, lng], 9);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
    }).addTo(mapInstance);

    panneaux.forEach(p => {
        const marker = L.marker([p['LATITUDE'], p['LONGITUDE']]).addTo(mapInstance);
        marker.bindPopup(`<b>Panneau n°${p['NUMERO']}</b><br>Coordonnées : ${p['LATITUDE']}, ${p['LONGITUDE']}`);
    });

} else {
    document.getElementById('map').innerHTML = '<p>Aucun panneau à afficher.</p>';
}
</script>


<?= $this->endSection() ?>