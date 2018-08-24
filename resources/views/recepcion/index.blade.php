@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">Recepción de Productos</h1>
    </div>
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <ul>
                <li><a href="/recepcion/monturas" class="btn btn-info">Monturas</a></li>
                <li><a href="#" class="btn btn-info">Pedidos</a></li>
            </ul>

            
            <a href="/" class="btn btn-primary">Volver</a>
            <!-- 
            <table class="table table-striped mt-3">
                <tr>
                    <th>Nombre</th>
                    <th>Ruc</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th></th>
                    <th></th>
                </tr>
                
            </table> 
        -->
                     
                
        </div>
    </div>
</main>

@endsection