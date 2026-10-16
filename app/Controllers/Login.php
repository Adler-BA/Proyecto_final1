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
                if ($this->request->getPost('remember')) {
                    $this->response->setCookie('remember_user', $user['id'], 2592000);
                }
                return redirect()->to(base_url('dashboard'))->with('success', 'La sesión se ha iniciado correctamente.');
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
        return redirect()->to(base_url('/'))->with('success', 'La sesión se ha cerrado correctamente.');
    }
    public function forgotPassword()
    {
        return view('forgot_password_view');
    }

    public function sendResetLink()
    {
        $email = $this->request->getPost('email');
        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if (!$user) {
        return redirect()->to(base_url('forgot-password'))->with('error', 'Si el correo existe, te hemos enviado un enlace.');
        }
        $token = bin2hex(random_bytes(32));
        $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));
        $userModel->update($user['id'], [
            'reset_token' => $token,
            'reset_expires_at' => $expires
        ]);
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
        
        $emailService->setTo($email);
        $emailService->setSubject('Recuperación de Contraseña - Organizador de Tareas');
        
        $resetLink = base_url("reset-password/" . $token);
        
        $message = "
        <div style='font-family: Arial, sans-serif; padding: 20px; background-color: #f1f8e9;'>
            <h2 style='color: #2e7d32;'>Recuperación de Contraseña</h2>
            <p>Hola {$user['name']},</p>
            <p>Has solicitado restablecer tu contraseña. Haz clic en el siguiente enlace para crear una nueva:</p>
            <a href='{$resetLink}' style='background-color: #a5d6a7; color: #000; padding: 10px 15px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block;'>Restablecer mi contraseña</a>
            <p style='color: #d32f2f; font-size: 12px; margin-top: 20px;'>Este enlace expirará en 1 hora.</p>
        </div>";

        $emailService->setMessage($message);

       if ($emailService->send()) {
            echo "<h1>El correo se envió correctamente.</h1>";
            exit;
        } else {
            echo "<h1>Error al enviar:</h1>";
            echo $emailService->printDebugger(['headers']);
            exit;
        }
    }
    public function resetPassword($token = null)
    {
        $userModel = new \App\Models\UserModel();
        $user = $userModel->where('reset_token', $token)->first();

        if (!$user) {
            return redirect()->to(base_url('login'))->with('error', 'El enlace es inválido o ya fue usado.');
        }

        if (strtotime($user['reset_expires_at']) < time()) {
            return redirect()->to(base_url('login'))->with('error', 'El enlace ha expirado. Solicita uno nuevo.');
        }
        return view('reset_password_view', ['token' => $token]); 
    }
    public function updatePassword()
    {
        $token = $this->request->getPost('token');
        $password = $this->request->getPost('password');
        $repeatPassword = $this->request->getPost('repeat_password');

        if ($password !== $repeatPassword) {
            return redirect()->back()->with('error', 'Las contraseñas no coinciden.');
        }

        $userModel = new \App\Models\UserModel();
        $user = $userModel->where('reset_token', $token)->first();

        if ($user) {
            $data = [
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'reset_token' => null,
                'reset_expires_at' => null
            ];
            $userModel->update($user['id'], $data);

            return redirect()->to(base_url('login'))->with('success', 'Tu contraseña ha sido actualizada. ¡Inicia sesión!');
        }

        return redirect()->to(base_url('login'))->with('error', 'Error al actualizar la contraseña.');
    }
}

