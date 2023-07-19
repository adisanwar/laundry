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
            'no_hp' => $this->request->getPost('no_hp')
        ];
    
        $this->customers->update($id, $data);
        return redirect('customer')->with('success', 'Data Updated Successfully');
    }
    

    public function delete($id)
    {
        // Cek apakah data dengan id tertentu ada di database
        $customer = $this->customers->find($id);
        if (!$customer) {
            return redirect()->to(base_url('customer'))->with('error', 'Data not found.');
        }
        // Hapus data dari database
        $this->customers->delete($id);
        return redirect()->to(base_url('customer'))->with('success', 'Data Deleted Successfully');
    }
}
