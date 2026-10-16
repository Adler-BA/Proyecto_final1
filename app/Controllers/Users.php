<?php

namespace App\Controllers;
use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $session = session();
        if(!$session->get('isLoggedIn') || $session->get('administrator') !=1) {
            return redirect()->to(base_url('tasks'));
        }
        $userModel = new UserModel();
        $data['users'] = $userModel->orderBy('id', 'DESC')->paginate(5);
        $data['pager'] = $userModel->pager;
        return view('users_view', $data);
    }
    public function create()
    {
        $session = session();
        if(!$session->get('isLoggedIn') || $session->get('administrator') != true) {
            return redirect()->to(base_url('tasks'));
        } 
         return view('user_new_view');
    }
    public function store()
    {
    $session = session();
    if (!$session->get('isLoggedIn') || $session->get('administrator') != true) {
        return redirect()->to(base_url('tasks'));
    }
    $userModel = new UserModel();
    $data = [ 
        'name'  => $this->request->getPost('name'),
        'email'  => $this->request->getPost('email'),
        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'active'  => $this->request->getPost('active') ? 1 : 0,
        'administrator' => $this->request->getPost('administrator') ? 1 : 0,
    ];
    $userModel->insert($data);
        return redirect()->to(base_url('users'));
    }
}