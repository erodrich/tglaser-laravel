<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clientes = \App\Client::all();
        return view('clients.index')->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clients.create');
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
        try{
            $cliente = new \App\Client;
            $cliente->nombre = $request->nombre;
            $cliente->numero_documento = $request->numero_documento;
            $cliente->telefono = $request->telefono;
            $cliente->email = $request->email;
            $cliente->save();
            return redirect('clients')->with('status', 'Cliente registrado correctamente');
        } catch (Exception $e){
            
        }
        

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
        $cliente = \App\Client::findOrFail($id);
        return view('clients.show')->with('cliente', $cliente);
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
        $cliente = \App\Client::findOrFail($id);
        return view('clients.edit')->with('cliente', $cliente);
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
        try{
            $cliente = \App\Client::findOrFail($id);
            
            
            $cliente->nombre = $request->nombre;
            $cliente->numero_documento = $request->numero_documento;
            $cliente->telefono = $request->telefono;
            $cliente->email = $request->email;
            $cliente->save();
            
            return redirect('clients')->with('status', 'Cliente actualizado correctamente');
        } catch (Exception $e){
            
        }
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
        try{
            \App\Client::findOrFail($id)->delete();
            return redirect('clients')->with('status', 'Cliente eliminado correctamente');
        } catch (Exception $e) {

        }
    }
}
