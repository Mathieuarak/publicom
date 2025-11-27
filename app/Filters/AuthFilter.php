<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthFilter implements FilterInterface
{
    /*Exécuté avant la requête*/
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session(); // Démarre ou récupère la session

        // Exemple : vérifier si l'utilisateur est connecté
        if (!$session->get('isLogIn')) {
            // Redirige vers la page de connexion
            return redirect('login_user');
        }
    }

    /*Exécuté après la requête*/
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}