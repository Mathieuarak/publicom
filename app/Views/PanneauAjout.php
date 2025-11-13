<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<h1>Ajouter un panneau à la commune de (commune)</h1>

<form action="<?= url_to('panneauCreate') ?>" method="post">
    <input type="hidden" name="ID" value="<?= esc($communeId ?? 0) ?>">

    <p>
        <label for="numero">Numéro :</label>
        <input type="text" name="numero" id="numero" value="<?= esc(old('numero')) ?>">
    </p>

    <p>
        <label for="latitude">Latitude :</label>
        <input type="text" name="latitude" id="latitude" value="<?= esc(old('latitude')) ?>">
    </p>

    <p>
        <label for="longitude">Longitude :</label>
        <input type="text" name="longitude" id="longitude" value="<?= esc(old('longitude')) ?>">
    </p>

    <button type="submit">Valider</button>
</form>

<?= $this->endSection() ?>
