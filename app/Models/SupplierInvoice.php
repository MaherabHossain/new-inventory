<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SupplierInvoiceItem;
class SupplierInvoice extends Model
{
    use HasFactory;
    protected $fillable        = ['date','description','supplier_id']; 

    public function supplier_invoice_item(){

        return $this->hasMany(SupplierInvoiceItem::class,'supplier_invoice_id', 'id');
    }
}
