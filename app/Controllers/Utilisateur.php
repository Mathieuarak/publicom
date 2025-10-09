<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Utilisateur extends BaseController
{
    public function auth()
    {
        dd($this->request->getPost());

        return;
    }
    public function reads($numCommune)
    {
        $data=[

            ["id"=>"1",
            "nom"=>"mathieu",
            "prenom"=>"Arak",
            "idCommune"=>"2"],
            ["id"=>"1",
            "nom"=>"Cedric",
            "prenom"=>"boing",
            "idCommune"=>"2"]
        ];
        
        return view("listeUtilisateurs.php",["listeUtilisateurs"=>$data]);
    }
    public function preCreate($numCommune)
    {
        $data=
            ["nomCommune"=>"albainc"];
        
        return view("ajoutUtilisateur.php",["commune"=>$data]);
    }
    public function create()
    {
        
        
        return redirect()->to('listes-des-utilisateurs-1');
    }
    public function preUpdate($idUtilisateur)
    {
       $data=
            ["id"=>"2",
            "nomCommune"=>"albainc",
            "nom"=>"mathieu",
            "prenom"=>"Arak",
            "login"=>"ArakMat"];
        
        return view("modifierUtilisateur.php",["utilisateur"=>$data]);
    }
    public function update()
    {
        return redirect()->to('listes-des-utilisateurs-1');
    }
    public function delete()
    {
        return redirect()->to('listes-des-utilisateurs-2');
    }
}
