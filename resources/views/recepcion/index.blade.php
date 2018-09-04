@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">Recepción</h1>
    </div>
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h1>Monturas</h1>
                                    </div>
                                    <p>Ingresa las monturas recibidas. No olvide seleccionar almacén y proveedor.</p>
                                    <a href="{{ route('recepcion.monturas')}}" class="btn btn-primary">Monturas</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h1>Pedidos</h1>
                                    </div>
                                    <p>Registre la llegada de pedidos.</p>
                                    <a href="{{ route('recepcion.pedidos')}}" class="btn btn-primary">Pedidos</a>
                                </div>
                            </div>
                        </div>
            </div>
                     
                
        </div>
    </div>
</main>

@endsection