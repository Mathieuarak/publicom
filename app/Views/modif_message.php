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
            <legend>Modification de message de {nom de la commune}</legend>

            <label>Message :</label>
            <textarea name="message">
                message
            </textarea>

            <label>Titre :</label>
            <input name="titre" type="text" value="Titre">

            <label>Police de caractères du titre :</label>
            <input name="policeTitre" type="text" value="Police du titre">

            <label>Police de caractères du texte :</label>
            <input name="policeTexte" type="text" value="Police du texte">

            <label>Alignement</label>
            <fieldset>
                    <div>
                    <input type="radio" id="gauche" name="alignement" value="gauche" checked /> 
                    <label for="centre">Gauche</label>

                    <input type="radio" id="centre" name="alignement" value="centre" />
                    <label for="centre">Centre</label>
            
                    <input type="radio" id="droite" name="alignement" value="droite" />
                    <label for="centre">Droite</label>
                    </div>
            </fieldset>


            <label>Taille du titre :</label>
            <input name="tailleTitre" type="text" value="28">

            <label>Taille du texte :</label>
            <input name="tailleTexte" type="text" value="14">

            <label>Fond :</label>
            <input name="image de fond" type="text">

            <input type="submit" value="Valider">
        </fieldset>
    </form>
</body>
</html>
