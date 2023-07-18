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
        $data['username'] = session()->get('username');
        $data['id'] = session()->get('id');
        echo view('dashboard', $data);
    }

    public function pesanan()
    {
        $data['id'] = session()->get('id');
        echo view('pesanan');
    }

    public function laporan()
    {
        $data['username'] = session()->get('username');
        echo view('laporan', $data);
    }
    public function register()
    {
        echo view('register');
    }
   
    
}
