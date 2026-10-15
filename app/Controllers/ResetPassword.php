<?php

namespace App\Controllers;

class ResetPassword extends BaseController
{
    public function index()
    {
        return view('reset_password_view');
    }
}

