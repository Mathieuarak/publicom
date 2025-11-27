<?= $this->extend('layout') ?>



<?= $this->section('contenu') ?>
    <div class="container">
        <div class="commune-row">
           <form action="<?= url_to('updateCommunes') ?>" method="post">

            <input type="hidden" name="ID" value="<?= $commune["ID"]?>">
            <label for="nom">Éditer nom </label>
            <input type="text" id="nom" name="NOM" value="<?= $commune['NOM'] ?>"/><br><br>
            
            <label for="nom">Éditer le code code Postal (Chiffres uniquement)</label>
            <input type="text" id="codePostal" name="CODEPOSTAL" value="<?= $commune['CODEPOSTAL'] ?>"><br><br>
            
            <label for="nom">Éditer la description </label>
            <input type="text" id="description" name="DESCRIPTION" value="<?= $commune['DESCRIPTION'] ?>"><br><br>
            <input type="submit" value="Valider">

                
            </form>

        </div>
    </body>

<?= $this->endSection() ?> 