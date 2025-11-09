<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Publicom</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/tableaux.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/visu_message.css">
    <style>
        .card {
            box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
        }
        .table-hover tbody tr:hover {
            background-color: #f8f9fc;
        }
        .btn-icon {
            padding: 0.375rem 0.75rem;
        }
        .category-header {
            background: linear-gradient(45deg, #4e73df, #224abe);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
        }
    </style>

</head>

<body>
    <nav>
        <?php if (isset($communePage)) { ?>
            <ul class="main-nav">

                <li class="push"><a href="">Déconnexion</a></li>
            </ul>
        <?php } else { ?>
            <ul class="main-nav">
                <li><a href=""> Liste des panneaux</a></li>
                <li><a href="<?= url_to('liste_messages', 1) ?>">Liste des messages</a></li>
                <?php if (isset($isAdmin)) {?>
                    <li><a href="<?= url_to('read_users', 1) ?>">Liste des utilisateurs</a></li>';
                <?php } ?>

                <li class="push"><a href="">Sortir de la commune</a></li>
                <li><a href="">Déconnexion</a></li>
            </ul>
    </nav>
<?php } ?>
<?= $this->renderSection('content') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>