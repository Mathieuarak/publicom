<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Utilisateur extends BaseController
{
    public function auth()
    #Fonctionnel
    {
        $model=model('Admin');
        $log=$model->isAdmin($this->request->getPost('user_login'),$this->request->getPost('user_password'));
        if (count($log)!=0){
            return redirect("listeCommunes");
        }
        else{
            $model2=model('Utilisateur');
            $log2=$model2->isUser($this->request->getPost('user_login'),$this->request->getPost('user_password'));
            if (count($log2)){
                $communeId=$log2[0];
                return view("communeAccueil",$communeId);
            }
        }
        return redirect()->back();
    }

    public function reads($numCommune){
        #Fonctionnel
        $model=model('Utilisateur');
        $log=$model->usersInCommune($numCommune);
        //dd($log);

        /*$data=[
            ["id"=>"1",
            "nom"=>"mathieu",
            "prenom"=>"Arak",
            "idCommune"=>"2"],
            ["id"=>"1",
            "nom"=>"Cedric",
            "prenom"=>"boing",
            "idCommune"=>"2"]
        ];*/
        
        return view("listeUtilisateurs.php",["listeUtilisateurs"=>$log,"idCommune"=>$numCommune]);
    }

    public function preCreate($numCommune){
        #Fonctionnel
        $model=model('Commune');
        $log=$model->userCommune($numCommune);
        /*$data=
            ["nomCommune"=>"albainc"];*/
        return view("ajoutUtilisateur.php",["commune"=>$log[0],"ID_UTILISATEURCOMMUNE"=>$numCommune]);
    }

    public function create()
    {
        dd($this->request->getPost('ID_UTILISATEURCOMMUNE'));
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
