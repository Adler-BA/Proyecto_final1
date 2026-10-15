<?php

namespace App\Controllers;

class ForgotPassword extends BaseController
{
    public function index()
    {
        return view('forgot_password_view');
    }
}