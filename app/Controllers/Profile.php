<?php

namespace App\Controllers;
use App\Models\UserModel;

class Profile extends BaseController
{
    public function index()
    {
        $session = session();
        if(!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }
        $userModel = new UserModel();
        $data['user_info'] = $userModel->find($session->get('id'));

        return view('profile_view', $data);
    }
    public function update()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }
        $userModel = new UserModel();
        $userId = $session->get('id');
        $currentUser = $userModel->find($userId);

        $current_password = $this->request->getPost('current_password');
        if(!password_verify($current_password, $currentUser['password'])) {
            $session->setFlashdata('Error.', 'Contraseñal actual incorrecta. Los cambios no han sido guardados');
            return redirect()->to(base_url('profile'));
        }

        $new_password = $this->request->getPost('new_password');
        if (!empty($new_password)) {
            $data['password'] = password_hash($new_password, PASSWORD_DEFAULT);
        }
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ];
        $new_password = $this->request->getPost('new_password');
        if (!empty($new_password)) {
            $data['password'] = password_hash($new_password, PASSWORD_DEFAULT);
        }
        $file = $this->request->getFile('profile_image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $imageName = $file->getRandomName();
            $file->move('uploads/', $imageName);
            $data['profile_image'] = $imageName;
        }
        $userModel->update($userId, $data);
        $session->set('name', $data['name']);
        $session->setFlashdata('Completado.', 'Perfil actualizado');

        return redirect()->to(base_url('profile'));
    }
    public function forgotPassword()
    {
        return view('forgot_password_view');
    }
    public function sendResetLink()
    {
        $email = $this->request->getPost('email');
        $userModel = new \App\Models\UserModel();
        $user = $userModel->where('email', $email)->first();
        if ($user) {
            return redirect()->back()->with('Error.', 'Si el correo es el correcto, se te ha enviado un enlace');      
    }
    $token = bin2hex(random_bytes(32));
    $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));
    $userModel->update($user['id'], [
        'reset_token' => $token,
        'reset_expires' => $expires
    ]);
    $emailService = \Config\Services::email();
    $emailService->setTo($email);
    $emailService->setSubject('Recuperacion de Contraseña');
    $resetLink = base_url("reset-password/" . $token);
    $message = "<div style='font-family: Arial, sans-serif; padding: 20px; background-color: #f1f8e9;'>
            <h2 style='color: #2e7d32;'>Recuperación de Contraseña</h2>
            <p>Hola {$user['name']},</p>
            <p>Has solicitado restablecer tu contraseña. Haz clic en el siguiente enlace para crear una nueva contraseña:</p>
            <a href='{$resetLink}' style='background-color: #a5d6a7; color: #000; padding: 10px 15px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block;'>Restablecer mi contraseña</a>
            <p style='color: #d32f2f; font-size: 12px; margin-top: 20px;'>Este link expirará en una hora.</p>
            <p>Si no solicitaste un cambio. Ignora este correo</p>
        </div>";
    $emailService->setMessage($message);
    if ($emailService->send()) {
        return redirect()->back()->with('success', 'Se te ha enviado un enlace de recuperación a tu correo electrónico.');
    } else {
        return redirect()->back()->with('error', 'No se pudo enviar el enlace de recuperación.');
    }
}
}