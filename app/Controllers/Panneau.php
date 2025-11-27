<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Panneau extends BaseController
{
    public function liste(int $communeId)
    {
        $panneaux = model('PanneauModel')->where('ID_COMMUNEPANNEAUX', $communeId)->findAll();

        return view('Panneaux/panneauListe', [
            'panneauListe' => $panneaux,
            'communeId'    => $communeId
        ]);
    }

    public function map(int $communeId)
    {
        $panneaux = model('PanneauModel')->where('ID_COMMUNEPANNEAUX', $communeId)->findAll();

        return view('Panneaux/panneauMap', [
            'panneaux'  => $panneaux,
            'communeId' => $communeId
        ]);
    }

    public function ajout(int $communeId)
    {
        return view('Panneaux/PanneauAjout', ['communeId' => $communeId]);
    }

    public function modif(int $id, $communeId)
    {
        $panneau = model('PanneauModel')->where('ID_COMMUNEPANNEAUX', $communeId)->find($id);
        return view('Panneaux/PanneauModif', ['panneau' => $panneau, 'communeId' => $communeId]);
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

        return redirect()->to(url_to('panneauListe', 1));
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

        return redirect()->to(url_to('panneauListe', 1));
    }

    public function delete($id = null)
    {
        $id = $id ?? $this->request->getPost('id');

        if (!empty($id)) {
            model('PanneauModel')->delete($id);
        }

        return redirect()->to(url_to('panneauListe', 1));
    }
}