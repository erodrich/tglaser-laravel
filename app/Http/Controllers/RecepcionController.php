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
            'product_value' => $product_value,
            'next_codigo' => $next_codigo,
        ];

        return view('recepcion.create')->with($data);
    }

    public function store(Request $request){
        $tipo = \App\ProductType::find($request->tipo_id);
        $producto = new \App\Product;

        //En caso se trate de una montura se debe crear el producto y luego el movimiento
        if(strtolower($tipo->nombre) == strtolower('montura')){
            //Creando producto
            try {
                $proveedor = \App\Supplier::findOrFail($request->input('proveedor_id'));
                $producto->codigo = $request->input('codigo');
                $producto->descripcion = $request->input('descripcion');
                $producto->precio_venta = $request->input('precio_venta');
                $producto->precio_compra = $request->input('precio_compra');
                $producto->type_id = $request->input('tipo_id');
                $proveedor->products()->save($producto);
                $producto->save();
            } catch (Exception $e) {
                echo 'Excepción capturada: ', $e->getMessage(), "\n";
            }
            $producto->fresh();
        }
        //Creando movimiento
        $mov = new \App\Movement;
        $mov->entrada = true;
        $mov->cantidad = $request->cantidad;
        $mov->product_id = $producto->id;
        $mov->warehouse_id = $request->almacen_id;
        $mov->save();
        //Creando o actualizando inventario
        $search_keys = [
            'product_id' => $producto->id,
            'warehouse_id' => $request->almacen_id,
        ];
        $inv = \App\Stock::firstOrNew($search_keys);
        $inv->cantidad += $request->cantidad;
        $inv->save();
        return redirect('recepcion/monturas')->with('status', 'Montura registrada correctamente');
         
    }

    public function monturas(){
        $proveedores = \App\Supplier::all()->pluck('nombre', 'id');
        $almacenes = \App\Warehouse::all()->pluck('nombre', 'id');
        $data = [
            'proveedores' => $proveedores,
            'almacenes' => $almacenes
        ];
        return view('recepcion.monturas')->with($data);
    }
    public function pedidos(){
        $pedidos = \App\Pedido::all();
        $almacenes = \App\Warehouse::all()->pluck('nombre', 'id');
        $data = [
            'pedidos' => $pedidos,
            'almacenes' => $almacenes
        ];
        return view('recepcion.pedidos')->with($data);
    }

    public function show(){

    }
    
}
