<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;

class Worker extends Model
{

 
    public function payment(){
    	return $this->belongsTo(Payment::class,'payment_id','id');
    }

    protected $fillable = [
        'name',
        'q_id',
        'q_id_Exp',
        'pp',
        'pp_exp',
        'q_id_img',
        'pp_img',
        'user_img',
        'service',
        'amount',
        'remark',
      ];

    use HasFactory;
}
