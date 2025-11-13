<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<section>

    <?php
    $table = new \CodeIgniter\View\Table();

    $table->setHeading('Numéro', 'Latitude', 'Longitude', 'Modifier', 'Supprimer');

    foreach ($panneauListe as $panneau) {
        $id = $panneau['ID'];

        $modifier = '<a href="' . base_url("modif-panneau-$id") . '" class="btn">Modifier</a>';
        $supprimer = '<a href="' . base_url("suppr-panneau-$id") . '" onclick="return confirm(\'Supprimer ce panneau ?\')" class="btn">Supprimer</a>';

        $table->addRow(
            $panneau['NUMERO'],
            $panneau['LATITUDE'],
            $panneau['LONGITUDE'],
            $modifier,
            $supprimer
        );
    }
    ?>

    <h1>Liste des panneaux de (commune)</h1>

    <?= $table->generate(); ?>

</section>

<?php
$communeId = $panneauListe[0]['ID_COMMUNEPANNEAUX'] ?? 0;
?>

<a href="<?= url_to('panneauMap') ?>">Afficher sur la carte</a>
<a href="<?= base_url("ajout-panneau-$communeId") ?>">Ajouter un panneau</a>

<?= $this->endSection() ?>