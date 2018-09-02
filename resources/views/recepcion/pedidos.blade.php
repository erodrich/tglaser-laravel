@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">Listado de Pedidos</h1>
    </div>
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <table class="table table-striped mt-3">
                <tr>
                    <th>Número</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Fecha Alta</th>
                    <th></th>
                </tr>
                @if(count($pedidos) > 0)
                    @foreach($pedidos as $pedido)
                    <tr>
                        <td><a href="#">{{$pedido->id}}</a></td>
                        <td>{{$pedido->descripcion}}</td>
                        <td>{{$pedido->estado}}</td>
                        <td>{{$pedido->created_at}}</td>
                        <td>
                                {!! Form::open(['action'=> ['PedidosController@recibido', $pedido->id],
                                                'method'=>'POST'])!!}
                                    {{Form::button('<span data-feather="edit"></span>', 
                                                    ['type' => 'submit','class'=>"btn btn-info", 'title'=>"Recibir"])}}
                                {!! Form::close()!!}
                        </td>
                                                
                    </tr>
                    @endforeach
                @else
                    <td>No hay pedidos para mostrar</td>
                @endif
            </table> 
            {!! Form::close() !!}
                     
                
        </div>
    </div>
</main>

@endsection