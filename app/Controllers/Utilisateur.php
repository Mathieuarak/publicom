<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Utilisateur extends BaseController
{

    public function login()
    {
        return view('auth.php');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect("login_user");
    }

    public function auth()
    {
        $session = session();
        $session->set(['isLogIn' => False]);
        $login = $this->request->getPost('user_login');
        $mdp = $this->request->getPost('user_password');
        //dd(password_hash($mdp,PASSWORD_BCRYPT));
        $adminMdp = model('Admin')->getAdminMdp($login);
        //dd($adminMdp);
        if (/*true||*/!empty($adminMdp) && password_verify($mdp, $adminMdp["MOTDEPASSE"])) {
            $session->set(['isLogIn' => true]);
            $session->set(['isAdmin' => true]);
            return redirect("listeCommunes");
        } else {
            $model2 = model('Utilisateur');

            // dans getUserMdp : $user = $model2->where('col', 'val')->first();

            $user = $model2->getUserMdp($login);
            //dd($mdp);
            //dd($userMdp["MOTDEPASSE"]);
            //dd(password_verify($mdp, $userMdp["MOTDEPASSE"]));
            if (!empty($user) && password_verify($mdp, $user["MOTDEPASSE"])) {
                $session->set(['isLogIn' => true]);
                $session->set(['isAdmin' => false]);
                //dd($user["ID_UTILISATEURCOMMUNE"]);
                //dd($session->get('IdCommune'));
                //dd($_SESSION['IdCommune']);
                //dd($user[0]);
                return redirect()->to("commune-accueil-".$user["ID_UTILISATEURCOMMUNE"]);
            }
            //else{
            // $session->set(['isLogIn' => false]);
            //$session = session();
            //$session->setFlashdata('errorMessage', 'Echec auth');
            //$_SESSION['error'] = 'Echec Auth';
            //$session->markAsFlashdata('error');
            //dd($_SESSION['error']);

            // }
        }

        return redirect()->back()/*->with('errorMessage',"Echec auth")*/;
    }

    public function reads($numCommune)
    {
        #Fonctionnel
        $model = model('Utilisateur');
        $log = $model->usersInCommune($numCommune);
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

        return view("utilisateur/listeUtilisateurs.php", ["listeUtilisateurs" => $log, "idCommune" => $numCommune]);
    }

    public function preCreate($numCommune)
    {
        #Fonctionnel
        $model = model('Commune');
        $log = $model->userCommune($numCommune);
        /*$data=
            ["nomCommune"=>"albainc"];*/
        return view("utilisateur/ajoutUtilisateur.php", ["commune" => $log[0], "ID_UTILISATEURCOMMUNE" => $numCommune]);
    }

    public function create()
    {
        #Fonctionnelle (rajouter if si param vide)

        $model = model('Utilisateur');
        //dd($this->request->getPost());
        $data = [
            "PRENOM" => $this->request->getPost('PRENOM'),
            "NOM" => $this->request->getPost('NOM'),
            "ID_UTILISATEURCOMMUNE" => $this->request->getPost('ID_UTILISATEURCOMMUNE'),
            "IDENTIFIANT" => $this->request->getPost('IDENTIFIANT'),
            "MOTDEPASSE" => password_hash($this->request->getPost('MOTDEPASSE'), PASSWORD_BCRYPT)
        ];

        $model->insert($data);

        $numCommune = $this->request->getPost("ID_UTILISATEURCOMMUNE");
        //dd($numCommune);
        return redirect()->to('listes-des-utilisateurs-' . $numCommune);
    }

    public function preUpdate($idUtilisateur)
    {
        /*$data=
            ["id"=>"2",
            "nomCommune"=>"albainc",
            "nom"=>"mathieu",
            "prenom"=>"Arak",
            "login"=>"ArakMat"];*/
        $model = model('Utilisateur');
        $data = $model->user($idUtilisateur);
        //dd($data);
        return view("utilisateur/modifierUtilisateur.php", ["utilisateur" => $data[0]]);
    }
    public function update()
    {
        $model = model('Utilisateur');
        $data = [
            "PRENOM" => $this->request->getPost('PRENOM'),
            "NOM" => $this->request->getPost('NOM'),
            "IDENTIFIANT" => $this->request->getPost('IDENTIFIANT'),
            "MOTDEPASSE" => password_hash($this->request->getPost('MOTDEPASSE'), PASSWORD_BCRYPT)
        ];


        $model->update($this->request->getPost('ID'), $data);
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
