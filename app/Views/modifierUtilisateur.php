<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome Publicom</title>
    <link rel="stylesheet" href="css\form.css">
    

    <!-- STYLES -->

    <style {csp-style-nonce}>
        .bouton{
            padding: 1px 6px;
            border: 1px outset buttonborder;
            border-radius: 3px;
            color: buttontext;
            background-color: buttonface;
            text-decoration: none;
        }

    </style>
</head>
<body>
    <h1>Modification Utilisateur de <?=$utilisateur["nomCommune"]?></h1>

    <form method="post" action="<?=url_to("update_user")?>">

            <input type="hidden" name="id" value="<?= $utilisateur["id"]?>">
            
            <label for="nom" >Nom </label>
            <input type="text" id="nom" name="nom" value="<?=$utilisateur["nom"]?>"/>
            
            <label for="prenom" >Prenom </label>
            <input type="text" id="prenom" name="prenom" value="<?=$utilisateur["prenom"]?>"/>

            <label for="nomCommune" >Commune </label>
            <input type="text" id="nomCommune" name="nomCommune" value="<?=$utilisateur["nomCommune"]?>"/>



            <button type="submit">Valider Modification</button>



    </form>
</body>  