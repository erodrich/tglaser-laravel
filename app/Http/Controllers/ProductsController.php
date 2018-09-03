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
        $tipos = \App\ProductType::all()->pluck('nombre', 'id');
        $data = [
            'tipos' => $tipos,
            'proveedores' => $proveedores
        ];
        return view('products.create')->with($data);
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
        return redirect()->back()->with('status', 'Producto registrado correctamente');

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
        $tipos = \App\ProductType::all()->pluck('nombre', 'id');
        $data = [
            'producto' => $producto,
            'tipos' => $tipos,
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
        

        try {
            $proveedor = \App\Supplier::findOrFail($request->input('proveedor_id'));
            $producto = \App\Product::findOrFail($id);
            $producto->codigo = $request->input('codigo');
            $producto->descripcion = $request->input('descripcion');
            $producto->precio_venta = $request->input('precio_venta');
            $producto->precio_compra = $request->input('precio_compra');
            $proveedor->products()->save($producto);
            $producto->type_id = $request->input('tipo_id');
            $producto->save();
        } catch (App\Exception $e) {
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
        return redirect('/products')->with('status', 'Producto actualizado');

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
        try {
            $producto->delete();
            return redirect('/products')->with('status', 'Producto eliminado');
        } catch (Exception $e){
            return redirect('/products')->with('status', 'Error al eliminar producto');
        }
        
        
    }
}
