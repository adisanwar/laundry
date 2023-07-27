<?php

namespace App\Models;

use CodeIgniter\Model;

class LaundryOrderModel extends Model
{
    protected $table = 'orders'; // Replace 'laundry_orders' with your actual table name
    protected $primaryKey = 'order_id'; // Replace 'id' with your primary key column name

    protected $allowedFields = ['order_id','customer_id','paket_laundry', 'berat', 'jenis', 'qty', 'harga', 'pembayaran', 'total', 'status', 'created_at', 'updated_at'];
}
