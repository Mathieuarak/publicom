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
            else{
                
                $session = session();
                $session->setFlashdata('errorMessage', 'Echec auth');
                //$_SESSION['error'] = 'Echec Auth';
                //$session->markAsFlashdata('error');
                //dd($_SESSION['error']);

            }
        }
        
        return redirect()->back()/*->with('errorMessage',"Echec auth")*/;
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
        #Fonctionnelle (rajouter if si param vide)
        
        $model=model('Utilisateur');
        //dd($this->request->getPost());
        $model->insert($this->request->getPost());
        
        $numCommune=$this->request->getPost("ID_UTILISATEURCOMMUNE");
        //dd($numCommune);
        return redirect()->to('listes-des-utilisateurs-'.$numCommune);
    }

    public function preUpdate($idUtilisateur)
    {
       /*$data=
            ["id"=>"2",
            "nomCommune"=>"albainc",
            "nom"=>"mathieu",
            "prenom"=>"Arak",
            "login"=>"ArakMat"];*/
        $model=model('Utilisateur');
        $data=$model->user($idUtilisateur);
        //dd($data);
        return view("modifierUtilisateur.php",["utilisateur"=>$data[0]]);
    }
    public function update()
    {
        $model=model('Utilisateur');
        $data=[
            "PRENOM"=>$this->request->getPost('PRENOM'),
            "NOM"=>$this->request->getPost('NOM'),
            "IDENTIFIANT"=>$this->request->getPost('IDENTIFIANT'),
            "MOTDEPASSE"=>$this->request->getPost('MOTDEPASSE')
        ];

        
        $model->update($this->request->getPost('ID'),$data);
        //dd($this->request->getPost());

        return redirect()->to('listes-des-utilisateurs-1');
    }
    public function delete()
    {
        //dd($this->request->getPost());
        model('Utilisateur')->delete($this->request->getPost());
        return redirect()->to('listes-des-utilisateurs-1');
    }
}
