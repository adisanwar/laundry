<?php

namespace App\Controllers;

use App\Models\LaundryOrderModel;
use CodeIgniter\Controller;

class LaundryOrderController extends Controller
{
    public function __construct()
    {
        // Load the LaundryOrderModel
        $this->laundryOrderModel = new LaundryOrderModel();
    }

    public function index()
    {
        // Fetch all laundry orders from the database and pass them to the view
        $data['orders'] = $this->laundryOrderModel->findAll();

        // Load the view to display the orders
        return view('laundry_order/index', $data);
    }

    public function create()
    {
        // Load the view to create a new laundry order
        return view('laundry_order/create');
    }

    public function store()
    {
        // Get the input data from the form
        $jenis = $this->request->getPost('jenis');
        $qty = $this->request->getPost('qty');
        $harga = $this->request->getPost('harga');
        $pembayaran = $this->request->getPost('pembayaran');
        $total = $qty * $harga;

        // Get the customer_id from the currently logged-in user
        $customer_id = $this->getCurrentUserId();

        // Create an array with the data to be inserted into the database
        $data = [
            'customer_id' => $customer_id,
            'jenis' => $jenis,
            'qty' => $qty,
            'harga' => $harga,
            'pembayaran' => $pembayaran,
            'total' => $total,
        ];

        // Insert the data into the database
        $this->laundryOrderModel->insert($data);

        // Redirect to the index page with a success message
        return redirect()->to('/laundry-order')->with('success', 'Laundry order created successfully.');
    }

    private function getCurrentUserId()
    {
        // Implement your logic to get the customer_id from the currently logged-in user.
        // You might need to use the session or any authentication mechanism you are using in your application.
        // For the sake of this example, let's assume you have a session variable 'user_id'.
        return session()->get('user_id');
    }
}
