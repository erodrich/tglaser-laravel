<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecepcionController extends Controller
{
    //
    public function index()
    {
        
        return view('recepcion.index');
    }

    public function create($monturas = null)
    {
        $almacenes = \App\Warehouse::all()->pluck('nombre', 'id');
        $product_value = null;
        if($monturas == 'monturas'){
            $product_value = \App\ProductType::where('nombre','=','montura')->first();
        }
        $product_types = \App\ProductType::all()->pluck('nombre', 'id');
        $data = [
            'almacenes' => $almacenes,
            'product_types' => $product_types,
            'product_value' => $product_value
        ];

        return view('recepcion.create')->with($data);
    }

    public function store(Request $request){

        //return $request->input('product_type');
        return 'hola'.$request->input('warehouse_id');
    }
}
