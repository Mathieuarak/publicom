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
}
