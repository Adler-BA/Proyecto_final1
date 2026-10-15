<?php

namespace App\Controllers;
use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login_view');
    }

    public function authenticate()
    {
        $session = session();
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        $user = $userModel->where('email', $email)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $ses_data = [
                    'id'            => $user['id'],
                    'name'          => $user['name'],
                    'email'         => $user['email'],
                    'administrator' => $user['administrator'],
                    'isLoggedIn'    => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to(base_url('dashboard'));
            } else {
                return redirect()->back()->with('error', 'La contraseña es incorrecta');
            }
        } else {
            return redirect()->back()->with('error', 'El correo es invalido.');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
}