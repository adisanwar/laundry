<?php

namespace App\Models;

use CodeIgniter\Model;

class LaundryOrderModel extends Model
{
    protected $table = 'orders'; // Replace 'laundry_orders' with your actual table name
    protected $primaryKey = 'id'; // Replace 'id' with your primary key column name

    protected $allowedFields = ['customer_id','paket_laundry', 'berat', 'jenis', 'qty', 'harga', 'pembayaran', 'total', 'status', 'created_at', 'update_at'];
}
