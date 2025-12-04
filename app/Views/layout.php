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

                <li><a href="<?= url_to('panneauListe',$_SESSION['IdCommune']) ?>"> Liste des panneaux</a></li>
                <li><a href="<?= url_to('liste_messages',$_SESSION['IdCommune']) ?>">Liste des messages</a></li>

                <li><a href="<?= url_to('categories_liste') ?>">Liste des catégories</a></li>
                
                <?php if ($session->get('isAdmin')) {?>
                    <li><a href="<?= url_to('read_users', $_SESSION['IdCommune']) ?>">Liste des utilisateurs</a></li>;
                    <li><a href="<?= url_to('listeCommunes') ?>">Sortir de la commune</a></li>
                <?php } ?>
                   <li class="push"></li>
                
                <li><a href=<?= url_to('logout_user')?>>Déconnexion</a></li>
            </ul>
    </nav>
<?php } ?>
<?= $this->renderSection('contenu') ?>
</body>

</html>