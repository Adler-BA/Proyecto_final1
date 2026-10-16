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
}