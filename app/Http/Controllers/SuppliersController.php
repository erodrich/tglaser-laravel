<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $proveedores = Supplier::all();
        return view('suppliers.index')->with('proveedores',$proveedores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('suppliers.create');
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
        $this->validate($request, [
            'nombre' => 'required',
            'ruc' => 'required'
        ]);

        $proveedor = new Supplier;
        $proveedor->nombre = $request->input('nombre');
        $proveedor->ruc = $request->input('ruc');
        $proveedor->descripcion = $request->input('descripcion');
        $proveedor->save();

        return redirect('suppliers')->with('success', 'Proveedor añadido');
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
        $proveedor = Supplier::findOrFail($id);
        return view('suppliers.show')->with('proveedor',$proveedor);
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
        
        $proveedor = Supplier::findOrFail($id);
        return view('suppliers.edit')->with('proveedor', $proveedor);
        
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
        $this->validate($request, [
            'nombre' => 'required',
            'ruc' => 'required'
        ]);
        
        $proveedor = Supplier::findOrFail($id);
        $proveedor->nombre = $request->input('nombre');
        $proveedor->ruc = $request->input('ruc');
        $proveedor->descripcion = $request->input('descripcion');
        $proveedor->save();

        return redirect('/suppliers')->with('success', 'Proveedor modificado');
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
        $proveedor = Supplier::find($id);
        // Check for correct user
        /*
        if(auth()->user()->id !== $proveedor->user_id){
            return redirect('/devices')->with('error', 'Unauthorized page');
        }
        */

        $proveedor->delete();
        return redirect('suppliers')->with('success', 'Proveedor eliminado');
    }
}
