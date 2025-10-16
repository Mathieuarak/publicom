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

        return view('listeCommunes', $data);
    }
    
}

