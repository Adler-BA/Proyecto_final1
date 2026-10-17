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
        $token = bin2hex(random_bytes(32));

        $data = [
            'name'             => $this->request->getPost('name'),
            'email'            => $this->request->getPost('email'),
            'password'         => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'active'           => 0,
            'activation_token' => $token
        ];
        $userModel = new \App\Models\UserModel();
        $userModel->insert($data);
        $emailService = \Config\Services::email();
        $config = [
            'protocol'   => 'smtp',
            'SMTPHost'   => 'smtp.gmail.com',
            'SMTPUser'   => 'adlerbatzin5@gmail.com', 
            'SMTPPass'   => 'tfydqxjyngbhpine', 
            'SMTPPort'   => 465,
            'SMTPCrypto' => 'ssl',
            'mailType'   => 'html',
            'charset'    => 'utf-8',
            'CRLF'       => "\r\n",
            'newline'    => "\r\n"
        ];
        $emailService->initialize($config);
        $emailService->setFrom('adlerbatzin5@gmail.com', 'Organizador de Tareas');
        $emailService->setTo($data['email']);
        $emailService->setSubject('Activa tu cuenta en Organizador de Tareas');
        
        $activationLink = base_url('activate/' . $token);
        
        $mensaje = "<h2>Hola, {$data['name']}</h2>";
        $mensaje .= "<p>Gracias por registrarte. Para activar tu cuenta, haz clic en el siguiente enlace:</p>";
        $mensaje .= "<a href='{$activationLink}' style='padding:10px 20px; background:#4caf50; color:white; text-decoration:none; border-radius:5px;'>Activar Mi Cuenta</a>";
        
        $emailService->setMessage($mensaje);

        if ($emailService->send()) {
            return redirect()->to(base_url('login'))->with('success', 'Registro exitoso. Revisa tu correo para activar tu cuenta.');
        } else {
            return redirect()->back()->with('error', 'Error al enviar el correo de activación.');
        }
    }

}