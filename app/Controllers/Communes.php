<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Communes extends BaseController
{
    public function liste()
    {
        $communeModel = model('Commune');
        $communes = $communeModel->findAll();

        return view('communes/listeCommunes', [
            'communePage' => true,
            'listeCommunes' => $communes
        ]);
    }

    

    public function creation()
    {
        return view('communes/creationCommunes');
    }

    public function create()
    {
        $communeModel = model('Commune');
        $communeModel->insert($this->request->getPost());
        return redirect()->to('liste-communes');
    }

    public function modif($communeID)
    {
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
        $communeModel = model('Commune');
        //dd($this->request->getPost('ID'));             
        $data = [
            'NOM'=> $this->request->getPost('NOM'),
            'CODEPOSTAL' => $this->request->getPost('CODEPOSTAL'),
            'DESCRIPTION'=> $this->request->getPost('DESCRIPTION'),
        ];
        // dd($data);
        $communeModel->update($this->request->getPost('ID'), $data);

        return redirect()->to('liste-communes');
    }

    public function delete()
    {
        $communeModel = model('Commune');
        $communeModel->delete($this->request->getPost('CommuneId'));
        return redirect()->to('liste-communes');
    }


    
    public function accueil($communeId)
    {
    $communeModel = model('Commune');
    $commune = $communeModel->find($communeId);

    return view('communes/afficherCommune', [
        'commune' => $commune
    ]);
    }
}



    











