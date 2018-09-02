<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all();
        return view('products.index')->with('productos', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $proveedores = \App\Supplier::all()->pluck('nombre', 'id');
        return view('products.create')->with('proveedores', $proveedores);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         *  1. Llamar al proveedor (proveedor_id)
         *  2. Crear producto
         *  3. Crear tipo
         *  4. Relacion producto proveedor
         *  5. Relacion producto tipo
         */
        $proveedor = \App\Supplier::findOrFail($request->input('proveedor_id'));
        $producto = new \App\Product;
        $producto->codigo = $request->input('codigo');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio_venta = $request->input('precio_venta');
        $producto->precio_compra = $request->input('precio_compra');
        $producto->type_id = $request->input('tipo_id');
        try {

            $proveedor->products()->save($producto);
            $producto->save();
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
        $producto->fresh();
        return redirect('recepcion')->with('status', 'Producto creado');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $producto = \App\Product::findOrFail($id);
        $tipo = $producto->tipo_id;
        $data = [
            'producto' => $producto,
            'tipo' => $tipo,
        ];
        return view('products.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $proveedores = \App\Supplier::all()->pluck('nombre', 'id');
        $producto = \App\Product::findOrFail($id);
        $tipo = $producto->tipo_id;
        $data = [
            'producto' => $producto,
            'tipo' => $tipo,
            'proveedores' => $proveedores,
        ];
        return view('products.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /**
         *  1. Llamar al proveedor (proveedor_id)
         *  2. Crear producto
         *  3. Crear tipo
         *  4. Relacion producto proveedor
         *  5. Relacion producto tipo
         */
        $proveedor = \App\Supplier::findOrFail($request->input('proveedor_id'));
        $tipo = null;
        $producto = \App\Product::findOrFail($id);
        $producto->codigo = $request->input('codigo');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio_venta = $request->input('precio_venta');
        $producto->precio_compra = $request->input('precio_compra');
        if ($request->input('tipo') != $producto->tipo && $producto->tipo != 'montura') {
            $producto->tipo_id->delete();
        } else {
            $tipo = $producto->tipo_id;
        }
        $producto->tipo = $request->input('tipo');
        switch ($producto->tipo) {
            case 'lente':
                if ($tipo == null) {
                    $tipo = new \App\Contact;
                }
                $tipo->contact_op_1 = $request->input('contact_op_1');
                $tipo->contact_op_2 = $request->input('contact_op_2');
                break;
            case 'luna':
                if ($tipo == null) {
                    $tipo = new \App\Glass;
                }
                $tipo->glass_op_1 = $request->input('glass_op_1');
                $tipo->glass_op_2 = $request->input('glass_op_2');
                break;
        }

        try {
            if (!is_null($tipo)) {
                $tipo->save();
                $producto->tipo_id = $tipo->id;
            } else {
                $producto->tipo_id = 0;
            }
            $proveedor->products()->save($producto);
            $producto->save();
        } catch (Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
        return redirect('/products')->with('success', 'Producto actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $producto = \App\Product::findOrFail($id);
        $tipo = $producto->tipo_id;
        if($tipo != null){
            $tipo->delete();
        }
        $producto->delete();
        return redirect('/products')->with('success', 'Producto eliminado');
    }
}
