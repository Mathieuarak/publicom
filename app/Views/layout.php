<!DOCTYPE html>
<html lang="fr">
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
    <ul class="main-nav">
        <li><a href=""> Liste des panneaux</a></li>
        <li><a href="<?= url_to('liste_messages',1) ?>">Liste des messages</a></li>
        <li><a href="">Liste des utilisateurs</a></li>
        <li class="push"><a href="">Sortir de la commune</a></li>
    </ul>
    </nav>
  <?= $this->renderSection('contenu')?>
</body>
</html>