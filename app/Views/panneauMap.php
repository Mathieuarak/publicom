<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<h1>Carte des panneaux de la commune de (commune)</h1>


<img src="doc/map.jpg" alt="Carte de la commune" style="width:600px;height:400px;">

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

<?= $this->endSection() ?>