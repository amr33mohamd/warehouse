<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded =[];
    public  function Storage_unit(){
        return $this->belongsTo(StorageUnit::class,'storage_unit_id','id');
    }
}
