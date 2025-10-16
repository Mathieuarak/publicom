<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>


    <img src="doc/map.jpg" alt="map" style="width:600px;height:400px;">
    <h1>Carte des panneaux de (nom de la commune)</h1>

    <p>Panneau numéro <?= $panneaux['NUMERO']?></p>
    <p>Coordonnées : <?= $panneaux['LATITUDE']?><?= $panneaux['LONGITUDE']?></p>


<?= $this->endSection() ?>