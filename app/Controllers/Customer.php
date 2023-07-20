<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customer extends BaseController
{
    protected $customers;

    function __construct()

    {
        $this->customers = new CustomerModel();
    }
    public function index()
    {

        $data['customers'] = $this->customers->findAll();
        return view('customer', $data);
    }

    public function store()
    {
        $data = [
            'full_name' => $this->request->getPost('full_name'),
            'alamat' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
            'no_hp' => $this->request->getPost('no_hp'),
            'created_at' => $this->request->getPost('created_at'),
            'updated_at' => $this->request->getPost('updated_at'),
        ];
        // var_dump($data);
        $this->customers->insert($data);
        return redirect('customer')->with('success', 'Data Added Successfully');
    }

    public function edit($id)
    {
        $data = [
            'full_name' => $this->request->getPost('full_name'),
            'alamat' => $this->request->getPost('alamat'),
            'email' => $this->request->getPost('email'),
            'no_hp' => $this->request->getPost('no_hp'),
            'created_at' => $this->request->getPost('created_at'),
            'updated_at' => $this->request->getPost('updated_at'),
        ];
    
        $this->customers->update($id, $data);
        return redirect('customer')->with('success', 'Data Updated Successfully');
    }
    

    public function delete($id)
    {
        $this->customers->delete($id);
        return redirect('customer')->with('success', 'Data Deleted Successfully');
    }
}
