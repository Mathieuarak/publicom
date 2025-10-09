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
        return view('panneauMap');
    }
    public function ajout ($num)
    {
        return view('panneauAjout');
    }



    public function modif(int $panneauxId)
    {
        $numero = $this->request->getPost('numero');
        $latitude = $this->request->getPost('latitude');
        $longitude = $this->request->getPost('longitude');

        $panneauData = [
            'numero' => $numero,
            'latitude' => $latitude,
            'longitude' => $longitude,
        ];

        model('PanneauModel')->update($panneauxId, $panneauData);

        return redirect()->to(url_to('panneauListe'));
    }



    
    public function delete(int $panneauxId)
    {
        model('PanneauModel')->delete($panneauxId);
        return redirect()->to(url_to('panneauListe'));
    }
}