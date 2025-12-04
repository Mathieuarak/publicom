<?php

namespace App\Controllers;

use App\Controllers\BaseController;
$session=session();
class Communes extends BaseController
{
    public function liste()
    {
        if (!$_SESSION["isAdmin"]){
             return redirect()->to("commune-accueil-".$_SESSION["IdCommune"]);
        }
        
        if (isset($_SESSION['IdCommune'])){
            unset($_SESSION['IdCommune']);
        }
        if (isset($_SESSION['NomCommune'])){
            unset($_SESSION['NomCommune']);
        }
        $communeModel = model('Commune');
        $communes = $communeModel->findAll();

        return view('communes/listeCommunes', [
            'communePage' => true,
            'listeCommunes' => $communes
        ]);
    }

    

    public function creation()
    {
        if (!$_SESSION["isAdmin"]){
             return redirect()->to("commune-accueil-".$_SESSION["IdCommune"]);
        }

        return view('communes/creationCommunes');
    }

    public function create()
    {
        if (!$_SESSION["isAdmin"]){
             return redirect()->to("commune-accueil-".$_SESSION["IdCommune"]);
        }

        $communeModel = model('Commune');
        $communeModel->insert($this->request->getPost());
        return redirect()->to('liste-communes');
    }

    public function modif($communeID)
    {
        if (!$_SESSION["isAdmin"]){
             return redirect()->to("commune-accueil-".$_SESSION["IdCommune"]);
        }

        $communeModel = model('Commune');
        $commune = $communeModel->find($communeID);

        if (empty($commune)) {
            return redirect()->to('liste-communes');
        }

        return view('communes/communeAccueil', [
            'communePage' => true,
            'commune' => $commune
        ]);
    }

    public function update()
    {
        if (!$_SESSION["isAdmin"]){
             return redirect()->to("commune-accueil-".$_SESSION["IdCommune"]);
        }

        $communeModel = model('Commune');
        $data = [
            'NOM'=> $this->request->getPost('NOM'),
            'CODEPOSTAL' => $this->request->getPost('CODEPOSTAL'),
            'DESCRIPTION'=> $this->request->getPost('DESCRIPTION'),
        ];
        
        $communeModel->update($this->request->getPost('ID'), $data);

        return redirect()->to('liste-communes');
    }

    public function delete($communeId)
    {
        if (!$_SESSION["isAdmin"]){
             return redirect()->to("commune-accueil-".$_SESSION["IdCommune"]);
        }

        $communeModel = model('Commune');
        $communeModel->delete($communeId);
        return redirect()->to('liste-communes');
    }


    
    public function accueil($communeId)
    {
    $session=session();
    $session->set(['IdCommune'=>$communeId]);
    $communeModel = model('Commune');
    $commune = $communeModel->find($communeId);
    $session->set(['NomCommune'=>$commune['NOM']]);
    return view('communes/afficherCommune', [
        'commune' => $commune
    ]);
   

}
}



    











