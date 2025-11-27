<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>

<h1 class="titre">Liste des message de <?= $commune['NOM'] ?> </h1>
<p><a class="bouton" href='<?= url_to('ajout_message', $commune['ID']) ?>'> Ajout message </a></p>

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

                <form method="post" action='<?= url_to('visuModif_message')?>'>
                    <input name="idMessage" type="hidden" value="<?= $message['ID'] ?>" />
                    <input name="idCommune" type="hidden" value="<?= $commune['ID'] ?>" />

                    <input type="radio" id="on" name="publie" value="1" <?php if ($message['PUBLIE'] == 1) {echo 'checked';} ?> />
                    <label for="on">On</label>

                    <input type="radio" id="off" name="publie" value="0" <?php if ($message['PUBLIE'] == 0) {echo 'checked';} ?> />
                    <label for="off">Off</label>
                    <button class="bouton" type="submit">Changer</button>

                </form>
            </td>
            <td> <a class="bouton" href='<?= url_to('modif_message', $message['ID']) ?>'> Modifier </a> </td>
            <td> <a class="bouton" href='<?= url_to('visu_message', $message['ID']) ?>'> Visualisation </a> </td>
            <td>
                <form method="post" action='<?= url_to('delete_message') ?>'>
                    <input name="idMessage" type="hidden" value="<?= $message['ID'] ?>" />
                    <input name="idCommune" type="hidden" value="<?= $commune['ID'] ?>" />
                    <button class="bouton" type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php } ?>
</table>

<?= $this->endSection() ?>