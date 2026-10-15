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
        $data['user'] = $userModel->find($session->get('id'));

        return view('profile_view', $data);
    }
    public function update()
    {
        $session = session();
        $userModel = new UserModel();
        $userId = $session->get('id');
        $user = $userModel->find($userId);
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');

        $dataToUpdate = [
            'name' => $name,
            'email' => $email
        ];

        $current_password = $this->request->getPost('current_password');
        $new_password = $this->request->getPost('new_password');
        $repeat_password = $this->request->getPost('repeat_password');

        if(!empty($current_password)) {
            if (password_verify($current_password, $user['password'])) {
                if($new_password === $repeat_password && !empty($new_password)) {
                      $dataToUpdate['password'] = password_hash($new_password, PASSWORD_DEFAULT);
                } else {
                    die("Error. Las contraseñas ingresadas no coinciden.");
                }
            } else {
                die("Error. La contraseña actual es incorrecta.");
            }
        }
        $userModel->update($userId, $dataToUpdate);
        $session->set([
            'name' => $name,
            'email' => $email
        ]);
    return redirect()->to(base_url('profile'));
    }
}