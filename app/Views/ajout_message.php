<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Publicom</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <form method="post" action="#">
       <fieldset> 
            <legend>Ajout de message de {nom de la commune}</legend>

            <label>Message :</label>
            <textarea name="message">
            </textarea>

            <label>Titre :</label>
            <input name="titre" type="text">

            <label>Police de caractères du titre :</label>
            <input name="policeTitre" type="text">

            <label>Police de caractères du texte :</label>
            <input name="policeTexte" type="text">

            <label>Alignement du texte :</label>
            <input name="alignement" type="text">

            <label>Taille du titre :</label>
            <input name="tailleTitre" type="text">

            <label>Taille du texte :</label>
            <input name="tailleTexte" type="text">

            <label>Fond :</label>
            <input name="fond" type="text">
            
            <input type="submit" value="Valider">
        </fieldset>
    </form>
</body>
</html>