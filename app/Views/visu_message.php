<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>
<h1>Visualisation des message de <?= $commune['NOM'] ?></h1>

 <!-- les bouton suivant et précédent ne fonctionne pas , à modifier -->
<a class="bouton left" href='#'> Précédent </a> <a class="bouton right" href='#'> Suivant </a>
<article class="visu_message">
    <h2> <?= $message['TITRE'] ?></h2>
    <p> <?= $message['CONTENU']?></p>

</article>
<?= $this->endSection() ?>