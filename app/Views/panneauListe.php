<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<section>

    <?php

    $table = new \CodeIgniter\View\Table();
    

    $table->setHeading('Numéro panneau', 'Latitude', 'Longitude', 'modifier', 'supprimer');

    foreach ($panneauListe as $panneaux) {
        $id = (int) ($panneaux['ID'] ?? 0);

        $modifier = '<a href="' . base_url("modif-panneau-$id") . '" class="btn">Modifier</a>';
        $supprimer = '<a href="' . base_url("suppr-panneau-$id") . '" onclick="return confirm(\'Supprimer ce panneau ?\')" class="btn">Supprimer</a>';

        $table->addRow(
            $panneaux['NUMERO'],
            $panneaux['LATITUDE'],
            $panneaux['LONGITUDE'],
            $modifier,
            $supprimer
        );
    }

    ?>

    <h1> liste des panneaux de  </h1>

    <?php

    echo $table->generate();

    ?>

</section>

<?php $communeId = isset($panneauListe[0]) ? $panneauListe[0]['ID_COMMUNEPANNEAUX'] : 0; ?>
<a href="<?= url_to('panneauMap') ?>">Afficher en tant que carte</a>
<a href="<?= base_url("ajout-panneau-$communeId") ?>">Ajouter panneau</a>

<?= $this->endSection() ?>