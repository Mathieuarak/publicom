<!DOCTYPE html>
<html lang="fr">
<?php $session = session();?>

<head>
    <meta charset="UTF-8">
    <title>Publicom</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/tableaux.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/visu_message.css">

</head>

<body>
    <nav>
        <?php if (!isset($_SESSION['IdCommune'])) { ?>
            <ul class="main-nav">
                <li class="push"><a href=<?= url_to('logout_user')?>>Déconnexion</a></li>
            </ul>
        <?php } else { ?>
            <ul class="main-nav">
<<<<<<< HEAD
<<<<<<< HEAD
                <li><a href="<?= url_to('panneauListe') ?>"> Liste des panneaux</a></li>

=======
                <li><a href="<?= url_to('panneauListe',1) ?>"> Liste des panneaux</a></li>
                <li><a href="<?= url_to('liste_messages',1) ?>">Liste des messages</a></li>
>>>>>>> 0f9ce9d3d3fd1d210edd67d6a531c2a75656c00c
=======
                <li><a href="<?= url_to('panneauListe',$_SESSION['IdCommune']) ?>"> Liste des panneaux</a></li>
                <li><a href="<?= url_to('liste_messages',$_SESSION['IdCommune']) ?>">Liste des messages</a></li>
>>>>>>> d5c626883346fb4a20bb1ab12cbf982105746410
                <li><a href="<?= url_to('categories_liste') ?>">Liste des catégories</a></li>
                
                <?php if ($session->get('isAdmin')) {?>
                    <li><a href="<?= url_to('read_users', $_SESSION['IdCommune']) ?>">Liste des utilisateurs</a></li>;
                <?php } ?>

                <li class="push"><a href="">Sortir de la commune</a></li>
                <li><a href=<?= url_to('logout_user')?>>Déconnexion</a></li>
            </ul>
    </nav>
<?php } ?>
<?= $this->renderSection('contenu') ?>
</body>

</html>