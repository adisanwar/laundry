<?php 

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\CustomerModel;
use CodeIgniter\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function processRegistration()
    {
        $validationRules = [
            'username' => 'required|min_length[3]|max_length[50]',
            'email' => 'required|valid_email|is_unique[customers.email]',
            'password' => 'required|min_length[3]',
            'full_name' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
        ];

        if ($this->validate($validationRules)) {
            // Create new user
            $userModel = new UserModel();
            $user = [
                'username' => $this->request->getPost('username'),
                // 'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'), PASSWORD_DEFAULT,
            ];
            $userId = $userModel->insert($user);

            // Create related customer record
            $customerModel = new CustomerModel();
            $customer = [
                'full_name' => $this->request->getPost('full_name'),
                'alamat' => $this->request->getPost('alamat'),
                'email' => $this->request->getPost('email'),
                'no_hp' => $this->request->getPost('no_hp'),
                'user_id' => $userId,
            ];
            $customerModel->insert($customer);

            // Redirect to a success page or login page
            return redirect()->to('/login')->with('success', 'Registration successful. You can now login.');
        } else {
            // Validation failed, redirect back to the registration form with errors
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }
}