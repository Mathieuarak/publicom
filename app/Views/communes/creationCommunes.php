<?= $this->extend('layout') ?>



 <?= $this->section('contenu') ?>
 <title>Création de communes </title>
 <h1> Création de communes :</h1>
 <form method= post  action="<?= url_to('createCommune') ?>">
    <input type="hidden" name="ID" value="<?= esc($communeId ?? 0) ?>">
        <label for="nom">Nom commune</label>
        <input type="text" id="NOM" name="NOM"><br><br>
  
        <label for="nom">Code Postal (Chiffres entiers)</label>
        <input type="text" id="CODEPOSTAL" name="CODEPOSTAL"><br><br>
  
        <label for="nom">Informations supplémentaires: </label>
        <input type="text" id= "DESCRIPTION" name= "DESCRIPTION"><br><br>
  
        <input type="submit" value="Valider">
    </form>
  <?= $this->endSection() ?> 

      