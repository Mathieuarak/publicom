<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<h1>Modifier un panneau de la commune de (commune)</h1>


<form action="<?= url_to('panneauUpdate') ?>" method="post">

    <input type="hidden" name="id" value="<?= esc($panneau['ID']) ?>">
    <p>
        <label for="numero">Numéro :</label>
        <input type="text" name="numero" id="numero"
            value="<?= esc(old('numero', $panneau['NUMERO'])) ?>">
    </p>

    <p>
        <label for="latitude">Latitude :</label>
        <input type="text" name="latitude" id="latitude"
            value="<?= esc(old('latitude', $panneau['LATITUDE'])) ?>">
    </p>

    <p>
        <label for="longitude">Longitude :</label>
        <input type="text" name="longitude" id="longitude"
            value="<?= esc(old('longitude', $panneau['LONGITUDE'])) ?>">
    </p>

    <button type="submit">Valider</button>
    <a href="<?= url_to('panneauListe') ?>">Annuler</a>
</form>


<?= $this->endSection() ?>