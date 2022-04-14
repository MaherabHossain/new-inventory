<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;
class SupplierInvoiceItem extends Model
{
    use HasFactory;
    protected $fillable        = ['supplier_id','status','product_name','product_id','supplier_invoice_id','quantity','unit_price']; 
    
    public function supplier(){

    	return $this->belongsTo(Supplier::class);
    }  
}
