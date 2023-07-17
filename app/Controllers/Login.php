<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Auth\Auth;

class Login extends Controller
{
    protected $auth;

    public function __construct()
    {
        $this->auth = new Auth();
    }

    public function index()
    {
        if ($this->auth->check()) {
            $user = $this->auth->user();
            $data['username'] = $user->username;
            $data['email'] = $user->email;
            $data['password'] = $user->password;
        } else {
            echo view();
        }
        echo view('dashboard', $data);
    }
}

