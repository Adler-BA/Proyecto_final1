<?php

namespace App\Controllers;
use App\Models\TaskModel;

class Tasks extends BaseController
{
    public function index()
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }
        $taskModel = new TaskModel();
        $data['tasks'] = $taskModel->orderBy('id', 'DESC')->findAll();
        return view('tasks_view', $data);
    }
    public function store()
    {
        $session = session();
        if(!$session->get('isLoggedIn')) return redirect()->to(base_url('login'));
       
        $taskModel = new TaskModel();
        $description = $this->request->getPost('description');  
        
        if(!empty($description)) {
            $taskModel->insert([
                'description' => $description
            ]);
        }
        return redirect()->to(base_url('tasks'));
    }
    public function delete($id = null)
    {
        $session = session();
        if (!$session->get('isLoggedIn')) return redirect()->to(base_url('login'));

        $taskModel = new TaskModel();
        
        if ($id) {
            $taskModel->delete($id);
        }

        return redirect()->to(base_url('tasks'));
    }
}