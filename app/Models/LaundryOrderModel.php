<?php

namespace App\Models;

use CodeIgniter\Model;

class LaundryOrderModel extends Model
{
    protected $table = 'orders'; // Replace 'laundry_orders' with your actual table name
    protected $primaryKey = 'id'; // Replace 'id' with your primary key column name

    protected $allowedFields = ['customer_id', 'jenis', 'qty', 'harga', 'pembayaran', 'total'];
}
