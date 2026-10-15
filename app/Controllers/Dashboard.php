<?php
namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }
        echo "Inicio de sesión correcto. Bienvenido " . $session->get('name');
    }
}