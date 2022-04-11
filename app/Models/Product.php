<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;
class Product extends Model
{
    use HasFactory;
    protected $fillable        = ['product_name','description','brand_id']; 

    public function brand(){

    	return $this->belongsTo(Brand::class);
    }
}
