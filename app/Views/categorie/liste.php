<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="category-header">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0"><i class="fas fa-folder-open me-2"></i>Gestion des Catégories</h2>
            <a href="/categorie/ajout" class="btn btn-light">
                <i class="fas fa-plus-circle me-2"></i>Nouvelle Catégorie
            </a>
        </div>
    </div>
</div>

<div class="container">
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i><?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Nom</th>
                            <th>Description</th>
                            <th class="text-center">Messages</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($categories)) : ?>
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">
                                    <i class="fas fa-folder-open mb-3 d-block" style="font-size: 2rem;"></i>
                                    Aucune catégorie n'a été créée
                                </td>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($categories as $categorie) : ?>
                                <tr>
                                    <td>
                                        <i class="fas fa-folder me-2 text-warning"></i>
                                        <?= esc($categorie['NOM']) ?>
                                    </td>
                                    <td><?= esc($categorie['DESCRIPTION']) ?></td>
                                    <td class="text-center">
                                        <a href="/categorie/messages/<?= $categorie['IDCATEGORIE'] ?>" class="btn btn-outline-primary btn-sm">
                                            <i class="fas fa-envelope me-1"></i> Voir les messages
                                        </a>
                                    </td>
                                    <td class="text-end">
                                        <div class="btn-group">
                                            <a href="/categorie/modifier/<?= $categorie['IDCATEGORIE'] ?>" class="btn btn-outline-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="/categorie/supprimer/<?= $categorie['IDCATEGORIE'] ?>" 
                                               class="btn btn-outline-danger btn-sm"
                                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<?= $this->endSection() ?>