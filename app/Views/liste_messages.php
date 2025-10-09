<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>

<h1 class="titre">Liste des message de <?= $commune['NOM'] ?> </h1>
<p><a class="bouton" href='<?= url_to('message_ajout', $commune['ID']) ?>'> Ajout message </a></p>

<?php
$table = new \CodeIgniter\View\Table();

$table->setHeading('Titre', 'Contenu', 'Visibilité');

foreach ($messageListe as $message) {
    $table->addRow($message['TITRE'], $message['CONTENU']);
}

?>

<table>
    <tr>
        <th> Message </th>
        <th> Visibilité </th>
    </tr>

    <?php foreach ($messageListe as $message) { ?>
        <tr>
            <td> <?= $message['TITRE'] ?> </td>
            <td>
                 <!-- les bouton on off n'affiche que la valeur déja en base , à modifier pour qu'ils puissent modifier la valeur -->
                <form method="post" action="#">
                        <input type="radio" id="on" name="on_off" value="on" <?php if($message['ON_OFF'] == 1) {echo 'checked';} ?> />
                        <label for="on">On</label>

                        <input type="radio" id="off" name="on_off" value="off" <?php if($message['ON_OFF'] == 0) {echo 'checked';} ?>/>
                        <label for="off">Off</label>

                </form>
            </td>
            <td> <a class="bouton" href='<?= url_to('message_modif', $message['ID']) ?>'> Modifier </a> </td>
            <td> <a class="bouton" href='<?= url_to('visu_message', $message['ID']) ?>'> Visualisation </a> </td>
            <!-- le bouton supprimer ne fonctionne pas, à modifier -->
            <td> <a class="bouton" href='<?= url_to('message_delete') ?>'> Supprimer </a> </td>
        </tr>
    <?php } ?>
</table>

<?= $this->endSection() ?>