<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

    <h1>Modification panneau de (nom de la commune)</h1>

    <form action="<?= url_to('panneauUpdate') ?>" method="post">
        <p>Numéro : <input type="text" name="numero" id="numero" value="<?= $panneau['NUMERO'] ?>"></input></p>
        <p>Latitude : <input type="text" name="latitude" id="latitude" value="<?= $panneau['LATITUDE'] ?>"></input></p>
        <p>Longitude : <input type="text" name="longitude" id="longitude" value="<?= $panneau['LONGITUDE'] ?>"></input></p>

        <button type="submit">Valider </button>

<?= $this->endSection() ?>