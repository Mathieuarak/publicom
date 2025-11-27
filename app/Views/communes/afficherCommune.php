<?= $this->extend('layout') ?>



 <?= $this->section('contenu') ?>
<body>
    <div class="container">
        <div class="commune-row">
           
            <h1>Commune : </h1>  
            <h2><?= $commune['NOM'] ?><br><br>
            
            <label for="nom">Code Postal</label>
            <h2><?= $commune['CODEPOSTAL'] ?><br><br>
            
            
            <h1>Description :
            <p><?= $commune['DESCRIPTION'] ?><br><br>
            


            

        </div>
    </div>
</body>
  <?= $this->endSection() ?> 