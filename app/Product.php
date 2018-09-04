<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['codigo'];

    public function supplier()
    {
        return $this->belongsTo('\App\Supplier', 'supplier_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo('App\ProductType', 'type_id', 'id');
    }

}
