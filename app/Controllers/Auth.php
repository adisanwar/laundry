<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Auth extends Controller
{

    public function index()
    {
        echo view('login');
    }
    public function auth()
    {
        $usersModel = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $user = $usersModel->where('username', $username)->first();
    
        if (empty($user)) {
            session()->setFlashdata('message', 'Username atau Password Salah');
            return redirect()->to('login');
        }
    
        // Verifikasi password menggunakan password_verify()
        if (!password_verify($password, $user['password'])) {
            session()->setFlashdata('message', 'Username atau Password Salah');
            return redirect()->to('login');
        }
        session()->set('id', $user['id']);
        session()->set('username', $username);
        return redirect()->to('dashboard');
    }

    public function logout()
    {
        session()->remove('username');
        return redirect()->to('login');
    }
}
    