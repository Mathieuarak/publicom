<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

    <h1>Modification panneau de (nom de la commune)</h1>

    <p>Numéro : <input type="text" name="numero" id="numero"></input></p>
    <p>Latitude : <input type="text" name="latitude" id="latitude"></input></p>
    <p>Longitude : <input type="text" name="longitude" id="longitude"></input></p>

    <button type="button">Valider </button>

<?= $this->endSection() ?>