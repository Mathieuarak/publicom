<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

    <h1>Modification panneau de (nom de la commune)</h1>

    <?php if (empty($panneau) || ! is_array($panneau)): ?>
        <p>Le panneau demandé est introuvable.</p>
        <p><a href="<?= url_to('panneauListe') ?>">Retour à la liste</a></p>
    <?php else: ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="error"><?= esc(session()->getFlashdata('error')) ?></div>
        <?php endif; ?>

        <form action="<?= url_to('panneauUpdate') ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="id" value="<?= esc($panneau['ID'] ?? 0) ?>">

            <p>Numéro : <input type="text" name="numero" id="numero" value="<?= esc(old('numero', $panneau['NUMERO'] ?? '')) ?>"></p>
            <p>Latitude : <input type="text" name="latitude" id="latitude" value="<?= esc(old('latitude', $panneau['LATITUDE'] ?? '')) ?>"></p>
            <p>Longitude : <input type="text" name="longitude" id="longitude" value="<?= esc(old('longitude', $panneau['LONGITUDE'] ?? '')) ?>"></p>

            <button type="submit">Valider</button>
            <a href="<?= url_to('panneauListe') ?>"><button type="button">Annuler</button></a>
        </form>

    <?php endif; ?>

<?= $this->endSection() ?>

