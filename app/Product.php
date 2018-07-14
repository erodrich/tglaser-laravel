<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function supplier()
    {
        return $this->belongsTo('\App\Supplier', 'supplier_id', 'id');
    }

    /**
     * Llamar detalle de tipo de producto
     * Ejm: Luna o Lente de Contacto
     * 
     * @return string
     */
    public function getTipoIdAttribute($tipo_id)
    {
        $tipoProducto = null;
        
        switch ($this->tipo) {
            case 'lente':
                $tipoProducto = \App\Contact::find($tipo_id);
                break;
            case 'luna':
                $tipoProducto = \App\Glass::find($tipo_id);
                break;
        }
        
        return $tipoProducto;
    }
}
