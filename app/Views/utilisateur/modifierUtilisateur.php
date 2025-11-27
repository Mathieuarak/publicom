<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>
    <h1>Modification Utilisateur de <?=$utilisateur["nomCommune"]?></h1>

    <form method="post" action="<?=url_to("update_user")?>">

            <input type="hidden" name="ID" value="<?= $utilisateur["ID"]?>">
            
            <label for="nom" >Nom </label>
            <input type="text" id="nom" name="NOM" value="<?=$utilisateur["NOM"]?>"/>
            
            <label for="prenom" >Prenom </label>
            <input type="text" id="prenom" name="PRENOM" value="<?=$utilisateur["PRENOM"]?>"/>

             <label for="login" >Login </label>
            <input type="text" id="login" name="IDENTIFIANT" value="<?=$utilisateur["IDENTIFIANT"]?>"/>
            
            <label for="password" >Password </label>
            <input type="password" id="password" name="MOTDEPASSE" value="<?=$utilisateur["MOTDEPASSE"]?>"/>



            <button type="submit">Valider Modification</button>
    </form>
<?= $this->endSection() ?>