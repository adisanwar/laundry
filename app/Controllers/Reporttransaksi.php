<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\UserModel;
use App\Models\LaundryOrderModel;
use Dompdf\Dompdf;

class Reporttransaksi extends BaseController
{
    public function index()
    {
        // Load the models
        $customerModel = new CustomerModel();
        $userModel = new UserModel();
        $orderModel = new LaundryOrderModel();

        // Fetch the data using a join query
        $data['customers'] = $customerModel
            ->select('customers.*, users.username, orders.order_date')
            ->join('users', 'users.id = customers.user_id')
            ->join('orders', 'orders.customer_id = customers.id')
            ->findAll();

        // Load the view
        return view('customer', $data);
    }
    public function generate()
    {
        

        $filename = date('y-m-d-H-i-s'). '-qadr-labs-report';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        // $dompdf->loadHtml(view('pdf_view'));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);

        echo view('laporan');
    }
}
