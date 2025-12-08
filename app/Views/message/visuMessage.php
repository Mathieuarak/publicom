<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>
<?php
$policeTitre = $message['POLICETITRE'];
$policeContenu = $message['POLICECONTENU'];
$tailleTitre = $message['TAILLETITRE'];
$tailleContenu = $message['TAILLECONTENU'];

if ($message['ALIGNEMENT'] == "droite") {
    $alignement = "right";
} else if ($message['ALIGNEMENT'] == "gauche") {
    $alignement = "left";
} else {
    $alignement = "center";
}
?>


<style>
    .msg {
        text-align: center;
        color: red;
    }

    .article {
        margin: 10px;
        padding: 1em;
        border-radius: 10px;
        border: solid;
        border-width: 2px;
        border-color: black;
        background-color: #eee;
        background-image: url(<?= $img ?>);

    }

    .titre {
        font-family: <?= $policeTitre ?>;
        font-size: <?= $tailleTitre / 10 ?>rem;
        text-align: <?= $alignement ?>;
    }

    .contenu {
        font-family: <?= $policeContenu ?>;
        font-size: <?= $tailleContenu / 10 ?>rem;
        text-align: <?= $alignement ?>;
    }
</style>

<?php if (session()->getFlashdata('msg')) {

    $msg = session()->getFlashdata('msg'); ?>

    <h1>Visualisation des message de <?= $commune['NOM'] ?></h1>
    <h2 class="msg"><?= $msg ?></h2>

<?php } else { ?>
    <h1>Visualisation des message de <?= $commune['NOM'] ?></h1>

<?php } ?>


<!-- les bouton suivant et précédent ne fonctionne pas , à modifier -->

<a class="bouton left" href='<?= url_to('preSuiv_message', $message['ID'], 0)  ?>'> Message précédent </a>

<a class="bouton right" href='<?= url_to('preSuiv_message', $message['ID'], 1) ?> '> Message Suivant </a>

<article class="article">
    <h2 class="titre"> <?= $message['TITRE'] ?></h2>
    <p class="contenu"> <?= $message['CONTENU'] ?></p>
</article>
<?= $this->endSection() ?>