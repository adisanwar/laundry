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
        $username['username'] = session()->get();
        $id['user'] = session()->get();
        
        // Now you can use the $user_id as needed
        // if ($user_id !== null) {
        //     echo "User ID: "$user_id;
        // } else {
        //     echo "User ID not found in the session.";
        // }
        echo view('dashboard', ['username' => $username]);
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
