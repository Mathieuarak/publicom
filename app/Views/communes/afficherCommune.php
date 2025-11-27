<?= $this->extend('layout') ?>



 <?= $this->section('contenu') ?>
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
  <?= $this->endSection() ?> 