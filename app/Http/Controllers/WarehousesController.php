<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WarehousesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $almacenes = \App\Warehouse::all();
        return view('warehouses.index')->with('almacenes', $almacenes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('warehouses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $almacen = new \App\Warehouse;
        $almacen->nombre = $request->input('nombre');
        $almacen->descripcion = $request->input('descripcion');
        try{
            $almacen->save();
        } catch (Exception $e){
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
        return redirect('warehouses')->with('success', 'Almacén añadido');
        

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
        $almacenes = \DB::table('warehouses')->whereNotIn('id',[$id])->get()->pluck('nombre','id');
        $almacen = \App\Warehouse::findOrFail($id);
        $stocks = \App\Stock::where('warehouse_id','=',$id)->get();
        $data = [
            'almacen' => $almacen,
            'stocks' => $stocks,
            'almacenes' => $almacenes,
        ];
        return view('warehouses.show')->with($data);
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
        $almacen = \App\Warehouse::findOrFail($id);
        return view('warehouses.edit')->with('almacen', $almacen);
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
        //
        $almacen = \App\Warehouse::findOrFail($id);
        $almacen->nombre = $request->input('nombre');
        $almacen->descripcion = $request->input('descripcion');
        try{
            $almacen->save();
        } catch (Exception $e){
            echo 'Excepción capturada: ', $e->getMessage(), "\n";
        }
        return redirect('warehouses')->with('success', 'Almacén modificado');
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
        $almacen = \App\Warehouse::findOrFail($id);
        $almacen->delete();

        return redirect('warehouses')->with('success', 'Almacén eliminado');
    }

    public function move(Request $request){
        $stock = \App\Stock::find($request->id);
        //Crear movimiento de salida
        $mov = new \App\Movement;
        $mov->entrada = false;
        $mov->cantidad = $request->cantidad;
        $mov->product_id = $stock->product_id;
        $mov->warehouse_id = $stock->warehouse_id;
        $mov->save();
        //Creando o actualizando inventario
        $search_keys = [
            'product_id' => $stock->product_id,
            'warehouse_id' => $stock->warehouse_id,
        ];
        $inv = \App\Stock::firstOrNew($search_keys);
        $inv->cantidad -= $request->cantidad;
        $inv->save();

        //Crear movimiento de entrada
        $mov = new \App\Movement;
        $mov->entrada = true;
        $mov->cantidad = $request->cantidad;
        $mov->product_id = $stock->product_id;
        $mov->warehouse_id = $request->destino_id;
        $mov->save();
        //Creando o actualizando inventario
        $search_keys = [
            'product_id' => $stock->product_id,
            'warehouse_id' => $request->destino_id,
        ];
        $inv = \App\Stock::firstOrNew($search_keys);
        $inv->cantidad += $request->cantidad;
        $inv->save();
        
        return redirect()->back()->with('status', 'El producto se movió correctamente');

    }
}
