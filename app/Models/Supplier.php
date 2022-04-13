<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SupplierInvoice;
class Supplier extends Model
{
    use HasFactory;
    protected $fillable        = ['name','email','phone']; 
    public function supplier_invoice(){

        return $this->hasMany(SupplierInvoice::class);
    }
}
