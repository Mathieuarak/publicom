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
           <form>
            
            
            <label for="nom">nom </label>
            <label type="text" id="nom" name="NOM" value="<?= $communes['NOM'] ?>"><br><br>
            
            <label for="nom">code Postal</label>
            <label type="text" id="codePostal" name="CODEPOSTAL" value="<?= $communes['CODEPOSTAL'] ?>"><br><br>
            
            <label for="nom">description </label>
            <label type="text" id="description" name="DESCRIPTION" value="<?= $communes['DESCRIPTION'] ?>"><br><br>
            <label type="text" name="message" id="message" value="" style="height: 400px; width: 500px;" onclick="this.value=''">
                
            </form>

        </div>
    </body>