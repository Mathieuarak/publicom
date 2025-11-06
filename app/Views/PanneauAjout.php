<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

    <h1>Ajout panneau de (commune)</h1>

    <form action="<?= url_to('panneauCreate') ?>" method="post">
        <input type="hidden" name="ID" value="<?= esc($communeId ?? 0) ?>">
        <p>Numéro : <input type="text" name="numero" id="numero"></p>
        <p>Latitude : <input type="text" name="latitude" id="latitude"></p>
        <p>Longitude : <input type="text" name="longitude" id="longitude"></p>

        <button type="submit">Valider</button>
    </form>

<?= $this->endSection() ?>