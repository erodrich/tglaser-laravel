@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">Detalle de almacén</h1>
    </div>
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                      <h3>{{$almacen->nombre}}</h3>
                </div>
                <div class="card-body">
                    <p class="card-text">{{$almacen->descripcion}}</p>
                    <a href="/almacenes" class="btn btn-primary float-right">Volver</a>
                </div>
                
            </div>
                     
                
        </div>
    </div>
</main>

@endsection