<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome Publicom</title>
    <link rel="stylesheet" href="css\tableaux.css">
    

    <!-- STYLES -->

    <style {csp-style-nonce}>
        .bouton{
            padding: 1px 6px;
            border: 1px outset buttonborder;
            border-radius: 3px;
            color: buttontext;
            background-color: buttonface;
            text-decoration: none;
        }

    </style>
</head>


<body>
    <?php
            //dd($listeUtilisateurs);
            $table = new \CodeIgniter\View\Table();
            $table->setHeading('nom', 'prenom',"modifier","supprimer");
            foreach ($listeUtilisateurs as $utilisateur) {
                $table->addRow([
                    $utilisateur['nom'],
                    $utilisateur['prenom'], 
                    '<a href="'.url_to('preUpdate_user', $utilisateur['id']).'" class=\'bouton\'>modifierUtilisateur</a>',
                    '<a href=" '.url_to('delete_user'/*, $utilisateur['id']*/).'"class=\'bouton\'>supprimer</a>'// regarder si opition post pour url to 
                ]);
            }
            echo $table->generate();
            ?>
</body>  