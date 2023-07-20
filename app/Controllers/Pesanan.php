<?php

namespace App\Controllers;

use App\Models\LaundryOrderModel;
use App\Models\CustomerModel;
// use CodeIgniter\Controller;

class Pesanan extends BaseController
{
    protected $order;
    protected $customer;
    public function __construct()
    {
        // Load the LaundryOrderModel
        $this->order = new LaundryOrderModel();
        $this->customer = new CustomerModel();
    }

    public function index()
    {
        $data['customers'] = $this->customer->findAll();
        // Melakukan operasi JOIN antara tabel "laundry_orders" dan "customers" dengan alias yang berbeda
        $data['orders'] = $this->order->select('customers.id, customers.full_name, customers.alamat, customers.no_hp, orders.paket_laundry, orders.jenis, orders.berat, orders.harga, orders.pembayaran, orders.total, orders.status')
            ->join('customers', 'customers.id = orders.customer_id')
            ->findAll();

        // Menampilkan data hasil JOIN ke view atau lakukan sesuai kebutuhan
        return view('pesanan', $data);
    }

    public function store()
    {

        $data = [
            'customer_id' => $this->request->getPost('customer_id'),
            'paket_laundry' => $this->request->getPost('paket_laundry'),
            'jenis' => $this->request->getPost('jenis'),
            'berat' => $this->request->getPost('berat'),
            'harga' => $this->request->getPost('harga'),
            'pembayaran' => $this->request->getPost('pembayaran'),
            'total' => $this->request->getPost('total'),
            'status' => $this->request->getPost('status'),
            'created_at' => $this->request->getPost('created_at'),
            'updated_at' => $this->request->getPost('updated_at'),
        ];

        // Simpan data order ke dalam tabel "orders"
        $this->order->insert($data);
        return redirect('pesanan')->with('success', 'Order Added Successfully');

    }
    public function edit($id)
    {
        $data = [
            'customer_id' => $this->request->getPost('customer_id'),
            'paket_laundry' => $this->request->getPost('paket_laundry'),
            'jenis' => $this->request->getPost('jenis'),
            'berat' => $this->request->getPost('berat'),
            'harga' => $this->request->getPost('harga'),
            'pembayaran' => $this->request->getPost('pembayaran'),
            'total' => $this->request->getPost('total'),
            'status' => $this->request->getPost('status'),
            'created_at' => $this->request->getPost('created_at'),
            'updated_at' => $this->request->getPost('updated_at'),
        ];

        // Simpan data order ke dalam tabel "orders"
        $this->order->update($id, $data);
        return redirect('pesanan')->with('success', 'Order Changed Successfully');

    }

    public function delete($id)
    {
        $this->order->delete($id);
        return redirect('pesanan')->with('success', 'Data Deleted Successfully');
    }

}