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

    public function modif(int $panneauxId): string
    {
        $panneau = model('PanneauModel')->find($panneauxId);
        return view('PanneauModif', ['panneau' => $panneau]);
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        $numero = $this->request->getPost('numero');
        $latitude = $this->request->getPost('latitude');
        $longitude = $this->request->getPost('longitude');

        $panneauData = [
            'NUMERO' => $numero,
            'LATITUDE' => $latitude,
            'LONGITUDE' => $longitude,
        ];

        model('PanneauModel')->update($panneauData);

        return redirect()->to(url_to('panneauListe'));
    }


    public function create()
    {
        $numero = $this->request->getPost('numero');
        $latitude = $this->request->getPost('latitude');
        $longitude = $this->request->getPost('longitude');
        $idCommune = $this->request->getPost('ID');

        $panneauData = [
            'NUMERO' => $numero,
            'LATITUDE' => $latitude,
            'LONGITUDE' => $longitude,
            'ID' => $idCommune,
        ];

        model('PanneauModel')->insert($panneauData);

        return redirect()->to(url_to('panneauListe'));
    }


    public function delete(int $panneauxId)
    {
        model('PanneauModel')->delete($panneauxId);
        return redirect()->to(url_to('panneauListe'));
    }
}