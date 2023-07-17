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

    public function laporan()
    {
        echo view('laporan');
    }
    public function register()
    {
        echo view('register');
    }
    
}
