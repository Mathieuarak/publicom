<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Panneau extends BaseController
{
    public function liste()
    {
        $communeId = session()->get('IdCommune') ?? ($_SESSION['IdCommune'] ?? null);
        $panneaux = model('PanneauModel')->where('ID_COMMUNEPANNEAUX', $communeId)->findAll();

        return view('Panneaux/panneauListe', [
            'panneauListe' => $panneaux,
            'communeId'    => $_SESSION['IdCommune']
        ]);
    }

    public function map()
    {
        $communeId = session()->get('IdCommune') ?? ($_SESSION['IdCommune'] ?? null);
        $panneaux = model('PanneauModel')->where('ID_COMMUNEPANNEAUX', $communeId)->findAll();

        return view('Panneaux/panneauMap', [
            'panneaux'  => $panneaux,
            'communeId' => $_SESSION['IdCommune']
        ]);
    }

    public function ajout()
    {
        return view('Panneaux/PanneauAjout', ['communeId' => $_SESSION['IdCommune']]);
    }

    
    public function modif(int $id)
    {
        $session = session();
        $panneaux = model('PanneauModel')->find($id);

        return view('Panneaux/PanneauModif', [
            'panneau'   => $panneaux,
            'communeId' => $_SESSION['IdCommune']
        ]);
    }
    

    public function update()
    {
        $id = $this->request->getPost('id');

        if (empty($id)) {
            return redirect()->to(url_to('panneauListe'));
        }

        $data = [
            'NUMERO'   => $this->request->getPost('numero'),
            'LATITUDE' => $this->request->getPost('latitude'),
            'LONGITUDE'=> $this->request->getPost('longitude'),
        ];

        model('PanneauModel')->update($id, $data);

        return redirect()->to(url_to('panneauListe', $_SESSION['IdCommune']));
    }

    public function create()
    {
        $numero    = trim($this->request->getPost('numero'));
        $latitude  = trim($this->request->getPost('latitude'));
        $longitude = trim($this->request->getPost('longitude'));
        $idCommune = $this->request->getPost('ID');

        $data = [
            'NUMERO'             => $numero,
            'LATITUDE'           => $latitude,
            'LONGITUDE'          => $longitude,
            'ID_COMMUNEPANNEAUX' => $idCommune,
        ];

        model('PanneauModel')->insert($data);

        return redirect()->to(url_to('panneauListe', $_SESSION['IdCommune']));
    }

    public function delete($id = null)
    {
        $id = $id ?? $this->request->getPost('id');

        if (!empty($id)) {
            model('PanneauModel')->delete($id);
        }

        return redirect()->to(url_to('panneauListe', $_SESSION['IdCommune']));
    }
}