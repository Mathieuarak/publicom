<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>

<?php if (isset($errors)) { foreach ($errors as $error){ ?>
    <li><?= esc($error) ?></li>
<?php }}?>

<?= form_open_multipart('ajout-message') ?>
    <fieldset>
        <legend>Ajout de message de <?= $commune['NOM'] ?></legend>

        <input name="idCommune" type="hidden" value="<?= $commune['ID'] ?>" />

        <label>Message :</label>
        <textarea name="message"></textarea>

        <label>Titre :</label>
        <input name="titre" type="text">

        <label>Police de caractères du titre :</label>
        <input name="policeTitre" type="text">

        <label>Police de caractères du texte :</label>
        <input name="policeTexte" type="text">

        <label>Alignement</label>
        <fieldset>
            <div>
                <input type="radio" id="gauche" name="alignement" value="gauche" />
                <label for="centre">Gauche</label>

                <input type="radio" id="centre" name="alignement" value="centre" />
                <label for="centre">Centre</label>

                <input type="radio" id="droite" name="alignement" value="droite" />
                <label for="centre">Droite</label>
            </div>
        </fieldset>


        <label>Taille du titre :</label>
        <input name="tailleTitre" type="text">

        <label>Taille du texte :</label>
        <input name="tailleTexte" type="text">

        <label>Fond :</label>
        <input name="fond" type="file" >

        <input name="on_off" type="hidden" value=0 />

        <input type="submit" value="Valider">
    </fieldset>
    <?= $this->endSection() ?>