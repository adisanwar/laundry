<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\UserModel;
use App\Models\LaundryOrderModel;
use Dompdf\Dompdf;

class Reporttransaksi extends BaseController
{
    protected $order;
    protected $customer;
    protected $user;
    
    public function __construct()
    {
        // Load the LaundryOrderModel
        $this->order = new LaundryOrderModel();
        $this->customer = new CustomerModel();
        $this->user = new UserModel();
    }
    public function index()
    {
        // Fetch the data using a join query
        // $data['customers'] = $this->customer
        //     ->select('customers.*, users.username')
        //     ->join('users', 'users.id = customers.id')
        //     ->join('orders', 'orders.customer_id = customers.id')
        //     ->findAll();
        $data['customers'] = $this->order->select('customers.id, customers.full_name, customers.alamat, customers.no_hp, orders.paket_laundry, orders.jenis, orders.berat, orders.harga, orders.pembayaran, orders.total, orders.status')
            ->join('customers', 'customers.id = orders.customer_id')
            ->findAll();
        // Load the view
        return view('laporan', $data);
    }
    public function generate()
    {
        

        $filename = date('y-m-d-H-i-s'). '-qadr-labs-report';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $dompdf->loadHtml(view('pdf_view'));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);

        echo view('laporan');
    }
}
