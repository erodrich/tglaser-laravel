<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //
    protected $fillable = ['product_id', 'warehouse_id'];

    public function product(){
        return $this->belongsTo('\App\Product');
    }
}
