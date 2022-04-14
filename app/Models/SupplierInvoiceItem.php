<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierInvoiceItem extends Model
{
    use HasFactory;
    protected $fillable        = ['product_name','supplier_invoice_id','quantity','unit_price']; 
    
}
