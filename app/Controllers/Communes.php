<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Communes extends BaseController
{
    public function liste()
    {
        $communeModel = new \App\Models\Commune();
        $communes = $communeModel-> findAll();

        $data = [
            'listeCommunes' => $communes
        ];

        return view('listeCommunes', ['communePage'=>true,'listeCommunes' => $communes]);
    }


    public function creation()
    
    {
        return view('creationCommunes');
    }

    public function create()
    
    {
    $communeModel = new \App\Models\Commune();
    /*$data= [
        $this->request->getPost('NOM'),
        $this->request->getPost('CODEPOSTAL'),
        $this->request->getPost('DESCRIPTION')
        
        
    ];*/
    $communeModel->insert($this->request->getPost());
    return redirect()->to('liste-communes');

    }
    public function modif( $communeID): string
    {
        $communeModel = model('Commune');
        $commune = $communeModel-> find($communeID);
        //dd($commune);
        return view('communeAccueil',$commune);
    }

    
    public function update($communeID){
        $communeModel = model('Commune');

        $data = [
            'NOM' => $this->request->getPost('NOM'),
            'CODEPOSTAL' => $this->request->getPost('CODEPOSTAL'),
            'DESCRIPTION'=>$this->request->getPost('DESCRIPTION')

        ];
        $communeModel->update($communeID);
        return view('communesAccueil',$commune);


    }









}

