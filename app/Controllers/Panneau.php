<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Panneau extends BaseController
{
    public function liste(): string
    {
        $panneaux = model('PanneauModel')->findAll();
        return view('panneauListe', ['panneauListe' => $panneaux]);
    }

    public function map()
    {
        $panneaux = model('PanneauModel')->findAll();
        return view('panneauMap', ['panneaux' => $panneaux]);
    }
    
    public function ajout(int $communeId)
    {
        return view('PanneauAjout', ['communeId' => $communeId]);
    }

    public function modif(int $panneauxId): string
    {
        $panneau = model('PanneauModel')->find($panneauxId);
        return view('PanneauModif', ['panneau' => $panneau]);
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        if (empty($id)) {
            return redirect()->to(url_to('panneauListe'));
        }

        $numero = $this->request->getPost('numero');
        $latitude = $this->request->getPost('latitude');
        $longitude = $this->request->getPost('longitude');

        $panneauData = [
            'NUMERO'   => $numero,
            'LATITUDE' => $latitude,
            'LONGITUDE'=> $longitude,
        ];

        model('PanneauModel')->update((int)$id, $panneauData);

        return redirect()->to(url_to('panneauListe'));
    }

    public function create()
    {
        $numero = trim($this->request->getPost('numero'));
        $latitude = trim($this->request->getPost('latitude'));
        $longitude = trim($this->request->getPost('longitude'));
        $idCommune = $this->request->getPost('ID');

        if ($numero === '' || $latitude === '' || $longitude === '') {
            return redirect()->back()->withInput()->with('error', 'Veuillez remplir tous les champs.');
        }

        $panneauData = [
            'NUMERO'                => $numero,
            'LATITUDE'              => $latitude,
            'LONGITUDE'             => $longitude,
            'ID_COMMUNEPANNEAUX'    => $idCommune,
        ];

        model('PanneauModel')->insert($panneauData);

        return redirect()->to(url_to('panneauListe'));
    }

    public function delete($panneauxId = null)
    {
        $id = $panneauxId ?? $this->request->getPost('id');
        if (empty($id)) {
            return redirect()->to(url_to('panneauListe'));
        }

        model('PanneauModel')->delete((int)$id);
        return redirect()->to(url_to('panneauListe'));
    }
}