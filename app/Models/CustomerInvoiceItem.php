<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerInvoiceItem extends Model
{
    use HasFactory;
    protected $fillable        = ['customer_id','product_name','product_id','customer_invoice_id','quantity','unit_price']; 
}
