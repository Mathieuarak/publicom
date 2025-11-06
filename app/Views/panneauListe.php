<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<h1>liste des panneaux de (commune)</h1>

<section>

    <?php

    $table=new \CodeIgniter\View\Table();

    $table->setHeading('Numéro panneau', 'Latitude','Longitude', 'modifier', 'supprimer');

    foreach ($panneauListe as $panneaux) {

        $modifier = '<a href="' . url_to('panneauModif', $panneaux['ID']) . '"><button type="button">Modifier</button></a>';
        $supprimer = '<form action="' . url_to('panneauSuppr') . '" method="post" style="display:inline">
                          <input type="hidden" name="id" value="' . $panneaux['ID'] . '">
                          <button type="submit" onclick="return confirm(\'Supprimer ce panneau ?\')">Supprimer</button>
                      </form>';

        $table->addRow(
            $panneaux['NUMERO'],
            $panneaux['LATITUDE'],
            $panneaux['LONGITUDE'],
            $modifier,
            $supprimer
        );
    }

    echo $table->generate();

    ?>

</section>

<?php $communeId = isset($panneauListe[0]) ? $panneauListe[0]['ID_COMMUNEPANNEAUX'] : 0; ?>
<a href="<?= url_to('panneauMap') ?>">Afficher en tant que carte</a>
<a href="<?= url_to('panneauAjout', $communeId) ?>"><button type="button">Ajouter panneau</button></a>

<?= $this->endSection() ?>