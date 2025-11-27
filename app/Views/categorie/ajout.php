<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>

<div class="container mt-4">
    <h1>Nouvelle Catégorie</h1>

    <?php if (session()->getFlashdata('errors')) : ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-body">
            <form action="<?= url_to('categorie_create') ?>" method="post">
                <?= csrf_field() ?>
                
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom de la catégorie *</label>
                    <input type="text" class="form-control" id="nom" name="nom" 
                           value="<?= old('nom') ?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" 
                              rows="3"><?= old('description') ?></textarea>
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="<?= url_to('categories_liste') ?>" class="btn btn-secondary">Annuler</a>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>