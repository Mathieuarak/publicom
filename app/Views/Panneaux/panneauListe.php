<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<section>

    <?php
    $table = new \CodeIgniter\View\Table();

    $table->setHeading('Numéro', 'Latitude', 'Longitude', 'Modifier', 'Supprimer');

    foreach ($panneauListe as $panneau) {
        $id = $panneau['ID'];

        $modifier = '<button type="button" class="btn" onclick="window.location.href=\'' . base_url("modif-panneau-$id") . '\'">Modifier</button>';
        $supprimer = '<button type="button" class="btn" onclick="if(confirm(\'Supprimer ce panneau ?\')) window.location.href=\'' . base_url("suppr-panneau-$id") . '\'">Supprimer</button>';

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
    <>

</section>

<?php
$communeId = $panneauListe[0]['ID_COMMUNEPANNEAUX'] ?? 0;
?>

<button type="button" onclick="window.location.href='<?= url_to('panneauMap') ?>'">Afficher sur la carte</button>
<button type="button" onclick="window.location.href='<?= url_to('panneauAjout', $communeId) ?>'">Ajouter un panneau</button>

<?= $this->endSection() ?>