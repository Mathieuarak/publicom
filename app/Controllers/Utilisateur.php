<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Utilisateur extends BaseController
{
    public function read()
    {
        dd($this->request->getPost());
        return;
    }
}
