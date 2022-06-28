<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded =[];
    public  function product(){
       return $this->hasOne(Product::class,'id','product_id');
    }
    public  function storage_unit(){
       return $this->hasOne(StorageUnit::class,'id','storage_unit_id');
    }
}
