<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>



<h1>Carte des panneaux de (nom de la commune)</h1>


<img src="doc/map.jpg" alt="map" style="width:600px;height:400px;">

<?php if (isset($panneaux) && is_array($panneaux) && count($panneaux) > 0): ?>
    <ul>
        <?php foreach ($panneaux as $p): ?>
            <li>
                <strong>Panneau numéro</strong> <?= esc($p['NUMERO'] ?? '') ?> <br>
                <strong>Coordonnées :</strong> <?= esc($p['LATITUDE'] ?? '') ?>, <?= esc($p['LONGITUDE'] ?? '') ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucun panneau à afficher.</p>
<?php endif; ?>

<?= $this->endSection() ?>