@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">Listado de Almacenes </h1>
    </div>
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <a href="{{ route('warehouses.create') }}" class="btn btn-primary">Añadir Almacén</a>
            <a href="/recepcion" class="btn btn-primary">Recepción de Productos</a>
            <a href="/" class="btn btn-primary float-right">Volver</a>

            <table class="table table-striped mt-3">
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th></th>
                    <th></th>
                </tr>
                @if(count($almacenes) > 0)
                    @foreach($almacenes as $almacen)
                    <tr>
                        <td><a href="{{ route('warehouses.show', ['id'=>$almacen->id ]) }}">{{$almacen->nombre}}</a></td>
                        <td>{{$almacen->descripcion}}</td>
                        <td>
                            <a href="{{ route('warehouses.edit', ['id'=>$almacen->id ]) }}" class="btn btn-primary">
                                <span data-feather="edit"></span>        
                            </a>
                        </td>
                        <td>
                            {!! Form::open(['action'=> ['WarehousesController@destroy', $almacen->id],
                                            'method'=>'POST'])!!}
                                {{Form::hidden('_method','DELETE')}}
                                {{Form::button('<span data-feather="delete"></span>', 
                                                ['type' => 'submit','class'=>"btn btn-danger", 'title'=>"Eliminar"])}}
                            {!! Form::close()!!}
                        </td>
                                                
                    </tr>
                    @endforeach
                @else
                    <td>No hay almacenes para mostrar</td>
                @endif
            </table> 
                     
                
        </div>
    </div>
</main>

@endsection