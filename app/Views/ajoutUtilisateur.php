<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>
    <h1>Ajout Utilisateur dans <?=$commune["NOM"]?></h1>

    <form method="post" action="<?=url_to("create_user",)?>">

            <input type="hidden" name="ID_UTILISATEURCOMMUNE" value="<?= $ID_UTILISATEURCOMMUNE?>">

            <label for="nom" >Nom </label>
            <input type="text" id="NOM" name="NOM"/>
            
            <label for="prenom" >Prenom </label>
            <input type="text" id="PRENOM" name="PRENOM"/>

            <label for="login" >Login </label>
            <input type="text" id="IDENTIFIANT" name="IDENTIFIANT"/>
            
            <label for="password" >Password </label>
            <input type="text" id="MOTDEPASSE" name="MOTDEPASSE"/>

            <button type="submit">Valider Ajout</button>
    </form>
<?= $this->endSection() ?>
