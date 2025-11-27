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
    
            <input type="text" id="nom" name="NOM" value="<?= $commune['NOM'] ?>" disabled/><br><br>
            
            <label for="nom">Code Postal</label>
            <input id="codePostal" name="CODEPOSTAL" value="<?= $commune['CODEPOSTAL'] ?>"disabled><br><br>

            
            <label for="nom"> Description </label>
            <input type="text" id="description" name="DESCRIPTION" value="<?= $commune['DESCRIPTION'] ?>"disabled><br><br>

            
            

            </form>
        </div>
    </div>
</body>