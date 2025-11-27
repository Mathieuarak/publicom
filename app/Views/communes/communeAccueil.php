<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <style>
        button {
            padding-right: 150px;
        }
      
    </style>
</head>
<body>
    <div class="container">
        <div class="commune-row">
           <form action="<?= url_to('updateCommune') ?>" method="post">

            <input type="hidden" name="ID" value="<?= $commune["ID"]?>">
            
            
            <label for="nom">Éditer nom </label>
            <input type="text" id="nom" name="NOM" value="<?= $commune['NOM'] ?>"/><br><br>
            
            <label for="nom">Éditer le code code Postal</label>
            <input type="text" id="codePostal" name="CODEPOSTAL" value="<?= $commune['CODEPOSTAL'] ?>"><br><br>
            
            <label for="nom">Éditer la description </label>
            <input type="text" name="message" id="message" value="" style="height: 400px; width: 500px;" onclick="this.value=''" />
            <input type="text" id="description" name="DESCRIPTION" value="<?= $commune['DESCRIPTION'] ?>"><br><br>

            <input type="hidden" name="id" value="<?= $commune["ID"]?>">
            
                <input type="text" name="message" id="message" value="" style="height: 400px; width: 500px;" onclick="this.value=''" />

                <label for="nom">Éditer nom </label>
                <input type="text" id="nom" name="nom" value="<?= $commune['NOM'] ?>"><br><br>

                <label for="nom">Éditer le code code Postal</label>
                <input type="text" id="codePostal" name="code Postal" value="<?= $commune['CODEPOSTAL'] ?>"><br><br>

                <label for="nom">Éditer la description </label>
                <input type="text" id="description" name="description" value="<?= $commune['DESCRIPTION'] ?>"><br><br>

                
                <input type="submit" value="Valider">
                
            </form>

        </div>
    </body>