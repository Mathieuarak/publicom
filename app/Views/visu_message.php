<?= $this->extend('layout')?>

<?= $this->section('css')?>
    <link rel="stylesheet" href="css/visu_message.css">
<?= $this->endSection()?>

<?= $this->section('contenu') ?>
    <h1>visualisation des message de {nom de la comunne}</h1>

    <a class="bouton left" href='#'> Précédent </a>  <a class="bouton right" href='#'> Suivant </a>
    <article class="visu_message">
        <h2> Titre du message </h2>
        <p>Hanc regionem praestitutis celebritati diebus invadere parans dux ante edictus per solitudines<BR>
            Aboraeque amnis herbidas ripas, suorum indicio proditus, qui admissi flagitii metu exagitati ad <BR>
            praesidia descivere Romana. absque ullo egressus effectu deinde tabescebat immobilis.<p>
        
    </article>
<?= $this->endSection()?>
