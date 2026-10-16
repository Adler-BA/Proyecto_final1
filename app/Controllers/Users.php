<?php

namespace App\Controllers;
use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->get('isLoggedIn') || $session->get('administrator') != 1) {
            return redirect()->to(base_url('tasks'));
        }
        $userModel = new UserModel();
        $data['users'] = $userModel->orderBy('id', 'DESC')->paginate(5);
        $data['pager'] = $userModel->pager;

        return view('users_view', $data);
    }
}