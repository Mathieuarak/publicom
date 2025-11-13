<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<h1>Carte des panneaux de la commune de (commune)</h1>

<div 
<?php 
if (isset($_POST['submit'])) {
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

?>
<iframe src="https://maps.google.com/maps?&q=<?php echo $panneau['LATITUDE'].','.$panneau['LONGITUDE'] ?>&output=embed"
    width="100%" height="500"
    ></iframe>
<?php } ?>





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