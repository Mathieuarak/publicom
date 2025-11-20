<?= $this->extend('layout') ?>

<?= $this->section('contenu') ?>
    <a href="<?=url_to('preCreate_user',$idCommune)?>" class='bouton'>Ajouter un Utilisateur</a>
    <?php
            //dd($listeUtilisateurs);
            $table = new \CodeIgniter\View\Table();
            $table->setHeading('nom', 'prenom',"modifier","supprimer");
            foreach ($listeUtilisateurs as $utilisateur) {
                $table->addRow([
                    $utilisateur['NOM'],
                    $utilisateur['PRENOM'], 
                    '<a href="'.url_to('preUpdate_user', $utilisateur['ID']).'" class=\'bouton\'>modifierUtilisateur</a>',
                    
                    '<form method="post" action="'.url_to('delete_user').'"><input name="ID"  type="hidden" value='.$utilisateur['ID'].' /><button class="bouton" type="submit" onclick= "'. "return confirm('Are you sure?')".'"> Supprimer </button></form>'
                ]);
            }
            echo $table->generate();

            ?>
<?= $this->endSection() ?>