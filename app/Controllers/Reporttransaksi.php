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
        $data['customers'] = $this->order->select('customers.id, customers.full_name, customers.alamat, customers.no_hp, orders.paket_laundry, orders.jenis, orders.berat, orders.harga, orders.pembayaran, orders.total, orders.status, orders.created_at, orders.updated_at')
            ->join('customers', 'customers.id = orders.customer_id')
            ->findAll();
        // Load the view
        return view('laporan', $data);
    }

    public function view()
    {
        $data['customers'] = $this->order->select('customers.id, customers.full_name, customers.alamat, customers.no_hp, orders.paket_laundry, orders.jenis, orders.berat, orders.harga, orders.pembayaran, orders.total, orders.status, orders.created_at, orders.updated_at')
        ->join('customers', 'customers.id = orders.customer_id')
        ->findAll();
    // Load the view
    return view('pdf_view', $data);
    }
    public function generate()
{
    $data['customers'] = $this->order->select('customers.id, customers.full_name, customers.alamat, customers.no_hp, orders.paket_laundry, orders.jenis, orders.berat, orders.harga, orders.pembayaran, orders.total, orders.status, orders.created_at, orders.updated_at')
        ->join('customers', 'customers.id = orders.customer_id')
        ->findAll();

    $filename = date('y-m-d-H-i-s') . '-transaksi_laundry';

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();

    // load HTML content
    $dompdf->loadHtml(view('pdf_view', $data));

    // (optional) setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // render html as PDF
    $dompdf->render();

    // output the generated pdf
    $dompdf->stream($filename);

    exit(); // Add this line to stop further execution and prevent blank page issue
    
}

}
