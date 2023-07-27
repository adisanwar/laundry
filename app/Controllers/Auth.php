<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Auth extends Controller
{
    protected $users;

    public function __construct() {
        $this->users = new UserModel;
    }

    public function index()
    {
        echo view('login');
    }
    public function login()
    {
        
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $user = $this->users->where('username', $username)->first();
        if (empty($user)) {
            session()->setFlashdata('message', 'Username Salah');
            return redirect()->to('/login');
        }
        if ($user['password'] != $password) {
            session()->setFlashdata('message', 'Password Salah');
            return redirect()->to('/login');
        }
        session()->set('username', $username);
        return redirect()->to('/dashboard');

        // Verifikasi password menggunakan password_verify()
        // if (!password_verify($password, $user['password'])) {
        //     session()->setFlashdata('message', 'Username atau Password Salah');
        //     return redirect()->to('login');
        // }
        // session()->set('id', $user['id']);
        // session()->set('username', $username);
        // return redirect()->to('dashboard');
    }

    public function logout()
    {
        session()->remove('username');
        return redirect()->to('login');
    }
}
    