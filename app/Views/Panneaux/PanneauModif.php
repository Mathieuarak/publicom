<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<h1>Modifier un panneau de la commune de <?=$_SESSION['NomCommune']?></h1>


<form action="<?= url_to('panneauUpdate') ?>" method="post">

    <input type="hidden" name="id" value="<?= esc($panneau['ID']) ?>">
    <p>
        <label for="numero">Numéro :</label>
        <input type="text" name="numero" id="numero"
            value="<?= esc(old('numero', $panneau['NUMERO'])) ?>"maxlength= "10">
    </p>

    <p>
        <label for="latitude">Latitude :</label>
        <input type="text" name="latitude" id="latitude"
            value="<?= esc(old('latitude', $panneau['LATITUDE'])) ?>"maxlength= "8">
    </p>

    <p>
        <label for="longitude">Longitude :</label>
        <input type="text" name="longitude" id="longitude"
            value="<?= esc(old('longitude', $panneau['LONGITUDE'])) ?>"maxlength= "8">
    </p>

    <button type="submit">Valider</button>
    <button type="button" onclick="window.location.href='<?= url_to('panneauListe', $_SESSION['IdCommune']) ?>'">Annuler</button>
</form>


<?= $this->endSection() ?>