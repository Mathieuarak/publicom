<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Panneau extends BaseController
{
    public function liste(): string
    {
        $panneaux = model('PanneauModel')->findAll();
        return view('Panneaux/panneauListe', ['panneauListe' => $panneaux]);
    }

    public function map()
    {
        $panneaux = model('PanneauModel')->findAll();
        return view('Panneaux/panneauMap', ['panneaux' => $panneaux]);
    }

    public function ajout(int $communeId)
    {
        return view('Panneaux/PanneauAjout', ['communeId' => $communeId]);
    }

    public function modif(int $id)
    {
        $panneau = model('PanneauModel')->find($id);
        return view('Panneaux/PanneauModif', ['panneau' => $panneau]);
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

        return redirect()->to(url_to('panneauListe'));
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

        return redirect()->to(url_to('panneauListe'));
    }

    public function delete($id = null)
    {
        $id = $id ?? $this->request->getPost('id');

        if (!empty($id)) {
            model('PanneauModel')->delete($id);
        }

        return redirect()->to(url_to('panneauListe'));
    }
}
