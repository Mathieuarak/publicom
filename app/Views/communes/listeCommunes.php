<?= $this->extend('layout') ?>



 <?= $this->section('contenu') ?>

<section>
<a href="<?= url_to('creationCommune') ?>" class="bouton">Création Commune</a>
    <?php $table = new \CodeIgniter\View\Table();
    $table-> setHeading(['Nom','Modifier','Supprimer','Commune Accueil']);

    if (session()->getFlashData('msg')!==null){
        echo'<p>'.session()->getFlashData('msg').'<p>';
    }
    // dd('getFlashData');

       foreach ($listeCommunes as $commune){
        
        $table->addRow(
            $commune['NOM'],
            '<a href="' . url_to('modificationCommune', $commune['ID']) . '" class="bouton">Modifier</a>',
            '<a href="' . url_to('supprimerCommune', $commune['ID']) . '" class="bouton" onclick="return confirm(\'Voulez-vous vraiment supprimer cette commune ?\');">Supprimer</a>',
            '<a href="' . url_to('communeAccueil',$commune['ID']) .'" class="bouton">Accueil</a>'

        );
       }
       echo $table->generate();
        ?>
       </section>
 

    <?= $this->endSection() ?> 
    


    
    
        
