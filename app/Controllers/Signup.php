<?php

namespace App\Controllers;
use App\Models\UserModel;

class Signup extends BaseController
{
    public function index()
    {
        return view('signup_view');
    }
    public function store()
    {
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $repeat_password = $this->request->getPost('repeat_password');
    
        if ($password !== $repeat_password) {
            return redirect()->back()->width('error', 'Las contraseñas no coinciden');
        }
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'active' => 1,
            'administrator' => 0
        ];
        $userModel = new UserModel();
        $userModel ->insert($data);

        return redirect()->to(base_url('login'));
    }
}