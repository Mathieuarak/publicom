<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>
    <h1>Ajout Utilisateur dans <?=$commune["nomCommune"]?></h1>

    <form method="post" action="<?=url_to("create_user",)?>">

            <label for="nom" >Nom </label>
            <input type="text" id="nom" name="nom"/>
            
            <label for="prenom" >Prenom </label>
            <input type="text" id="prenom" name="prenom"/>

            <label for="login" >Login </label>
            <input type="text" id="login" name="login"/>
            
            <label for="password" >Password </label>
            <input type="text" id="password" name="password"/>

            <button type="submit">Valider Ajout</button>
    </form>
<?= $this->endSection() ?>
