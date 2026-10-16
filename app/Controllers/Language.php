<?php

namespace App\Controllers;

class Language extends BaseController
{
    public function set($locale)
    {
        $session = session();
        $session->set('locale', $locale);
        return redirect()->back();
    }
}