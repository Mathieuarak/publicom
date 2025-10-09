<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>
    <h1>Modification Utilisateur de <?=$utilisateur["nomCommune"]?></h1>

    <form method="post" action="<?=url_to("update_user")?>">

            <input type="hidden" name="id" value="<?= $utilisateur["id"]?>">
            
            <label for="nom" >Nom </label>
            <input type="text" id="nom" name="nom" value="<?=$utilisateur["nom"]?>"/>
            
            <label for="prenom" >Prenom </label>
            <input type="text" id="prenom" name="prenom" value="<?=$utilisateur["prenom"]?>"/>

            <label for="nomCommune" >Commune </label>
            <input type="text" id="nomCommune" name="nomCommune" value="<?=$utilisateur["nomCommune"]?>"/>

             <label for="login" >Login </label>
            <input type="text" id="login" name="login" value="<?=$utilisateur["login"]?>"/>
            
            <label for="password" >Password </label>
            <input type="text" id="password" name="password"/>



            <button type="submit">Valider Modification</button>
    </form>
<?= $this->endSection() ?>