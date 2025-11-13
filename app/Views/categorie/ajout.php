<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="category-header">
    <div class="container">
        <h2 class="mb-0"><i class="fas fa-folder-plus me-2"></i>Nouvelle Catégorie</h2>
    </div>
</div>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <?php if (session()->getFlashdata('errors')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-exclamation-circle me-2"></i>
                                    <p class="mb-0"><?= $error ?></p>
                                </div>
                            <?php endforeach; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <form action="/categorie/create" method="post">
                        <div class="mb-4">
                            <label for="nom" class="form-label">Nom de la catégorie</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-folder"></i></span>
                                <input type="text" class="form-control" id="nom" name="nom" value="<?= old('nom') ?>" 
                                       placeholder="Entrez le nom de la catégorie" required>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="description" class="form-label">Description</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                <textarea class="form-control" id="description" name="description" rows="4" 
                                          placeholder="Décrivez la catégorie (optionnel)"><?= old('description') ?></textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="/categories" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-1"></i>Annuler
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>Enregistrer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?= $this->endSection() ?>