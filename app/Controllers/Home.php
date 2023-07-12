<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('layouts/admin');
    }

    public function dashboard()
    {
        echo view('dashboard');
    }

    public function pesanan()
    {
        echo view('pesanan');
    }
}
