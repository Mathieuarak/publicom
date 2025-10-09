<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<h1>liste des panneaux de (commune)</h1>

<section>

    <?php

    $table=new \CodeIgniter\View\Table();

    $table->setHeading('Numéro panneau', 'Coordonnées panneau', 'modifier', 'supprimer');

    foreach ($panneauListe as $panneaux) {

        $modifier = '<a href="' . url_to('panneauUpdate', $panneaux['ID']) . '">Modifier</a>';
        $supprimer = '<a href="' . url_to('panneauSuppr', $panneaux['ID']) . '">Supprimer</a>';

        $table->addRow(
            $panneaux['NUMERO'],
            $panneaux['LATITUDE'],
            $modifier,
            $supprimer
        );
    }

    echo $table->generate();

    ?>



</section>

<button type="button">Afficher en tant que carte</button>
<button type="button">Ajouter panneau</button>

<?= $this->endSection() ?>