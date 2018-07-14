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
        return view('almacenes.index')->with('almacenes', $almacenes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('almacenes.create');
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
        return redirect('almacenes')->with('success', 'Almacén añadido');
        

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
        $almacen = \App\Warehouse::findOrFail($id);
        return view('almacenes.show')->with('almacen', $almacen);
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
        return view('almacenes.edit')->with('almacen', $almacen);
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
        return redirect('almacenes')->with('success', 'Almacén modificado');
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

        return redirect('almacenes')->with('success', 'Almacén eliminado');
    }
}
