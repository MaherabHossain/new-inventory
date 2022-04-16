<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CustomerInvoice;
use App\Models\CustomerPayment;


class Customer extends Model
{
    use HasFactory;


    protected $fillable = [
        'name','email','phone'
    ]; 
    public function customer_invoice(){

        return $this->hasMany(CustomerInvoice::class);
    }
    public function payment(){

        return $this->hasMany(CustomerPayment::class);
    }
}
