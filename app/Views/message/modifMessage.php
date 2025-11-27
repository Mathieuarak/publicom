<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>


<?php if (isset($errors)) { foreach ($errors as $error){ ?>
    <li><?= esc($error) ?></li>
<?php }}?>

<?= form_open_multipart('modif-message') ?>
    <fieldset>
        <legend>Modification de message de <?= $commune['NOM'] ?></legend>

        <input name="idMessage" type="hidden" value="<?= $message['ID'] ?>" />

        <input name="idCommune" type="hidden" value="<?= $message['ID_COMMUNEMESSAGE'] ?>" />

        <label>Titre :</label>
        <input name="titre" type="text" value="<?= $message['TITRE'] ?>">

        <label>Contenu du message :</label>
        <textarea name="message"><?= $message['CONTENU']?></textarea>

        <label>Nom de la police de caractères du titre :</label>
        <input name="policeTitre" type="text" value="<?= $message['POLICETITRE'] ?>">

        <label>Nom de la police de caractères du texte :</label>
        <input name="policeTexte" type="text" value="<?= $message['POLICECONTENU'] ?>">

        <label>Alignement</label>
        <fieldset>
            <div>
                <input type="radio" id="gauche" name="alignement" value="gauche" <?php if($message['ALIGNEMENT']=="gauche"){echo 'checked';} ?> />
                <label for="centre">Gauche</label>

                <input type="radio" id="centre" name="alignement" value="centre" <?php if($message['ALIGNEMENT']=="centre"){echo 'checked';} ?>/>
                <label for="centre">Centre</label>

                <input type="radio" id="droite" name="alignement" value="droite" <?php if($message['ALIGNEMENT']=="droite"){echo 'checked';} ?>/>
                <label for="centre">Droite</label>
            </div>
        </fieldset>


        <label>Taille de la police du titre :</label>
        <input name="tailleTitre" type="text" value="<?= $message['TAILLETITRE'] ?>">

        <label>Taille de la police du texte :</label>
        <input name="tailleTexte" type="text" value="<?= $message['TAILLECONTENU'] ?>">

        <label>Fond :</label>
        <input name="fond" type="file" >

        <input type="submit" value="Valider">
    </fieldset>
</form>
<?= $this->endSection() ?>