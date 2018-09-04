@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">Detalle de producto</h1>
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
                      <h3>{{$producto->codigo}} : {{$producto->descripcion}}</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Precio de venta: {{$producto->precio_venta}}</li>
                        <li class="list-group-item">Precio de compra: {{$producto->precio_compra}}</li>
                        <li class="list-group-item">Tipo: {{$producto->type->nombre}}</li>

                    </ul>
                <a href="{{ url()->previous()}}" class="btn btn-primary">Volver</a>
                </div>
            </div>
                     
                
        </div>
    </div>
</main>

@endsection