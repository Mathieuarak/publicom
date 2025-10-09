<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Panneau extends BaseController
{
    public function liste()
    {
        return view('panneauListe');
    }
    public function map()
    {
        return view('panneauMap');
    }
    public function ajout ($num)
    {
        return view('panneauAjout');
    }
    public function modif ($num)
    {
        return view('panneauModif');
    }
}

