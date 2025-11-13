<?= $this->extend('layout') ?>



 <?= $this->section('contenu') ?>

<section>
<a href="<?= url_to('creationCommune') ?>" class="bouton">Création Commune</a>
    <?php $table = new \CodeIgniter\View\Table();
    $table-> setHeading(['Nom','Modifier','Supprimer']);
       foreach ($listeCommunes as $commune){
        
        $table->addRow(
            $commune['NOM'],
            '<a href="' . url_to('modificationCommunes', $commune['ID']) . '" class="bouton">Modifier</a>',
            '<a href="' . url_to('supprimerCommunes', $commune['ID']) . '" class="bouton">Supprimer</a>',

        );
       }
       echo $table->generate();
        ?>
       </section>
 

    <?= $this->endSection() ?> 
    


    
    
        
