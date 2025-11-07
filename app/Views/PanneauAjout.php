<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

    <h1>Ajout panneau de (commune)</h1>

    <form action="<?= url_to('panneauCreate') ?>" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="ID" value="<?= esc($communeId ?? 0) ?>">
        <?php if (session()->getFlashdata('error')): ?>
            <div class="error"><?= esc(session()->getFlashdata('error')) ?></div>
        <?php endif; ?>

        <p>Numéro : <input type="text" name="numero" id="numero" value="<?= esc(old('numero')) ?>"></p>
        <p>Latitude : <input type="text" name="latitude" id="latitude" value="<?= esc(old('latitude')) ?>"></p>
        <p>Longitude : <input type="text" name="longitude" id="longitude" value="<?= esc(old('longitude')) ?>"></p>

        <button type="submit">Valider</button>
    </form>

<?= $this->endSection() ?>