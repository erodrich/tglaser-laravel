@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">Listado de Clientes</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <a href="{{route('clients.create')}}" class="btn btn-primary">Añadir Clientes</a>
            <a href="/" class="btn btn-primary">Volver</a>

            <table class="table table-striped mt-3">
                <tr>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th></th>
                    <th></th>
                </tr>
                @if(count($clientes) > 0)
                    @foreach($clientes as $cliente)
                    <tr>
                    <td><a href="{{route('clients.show', $cliente->id)}}">{{$cliente->nombre}}</a></td>
                        <td>{{$cliente->numero_documento}}</td>
                        <td>{{$cliente->telefono}}</td>
                        <td>{{$cliente->email}}</td>
                        <td>
                        <a href="{{route('clients.edit', $cliente->id)}}" class="btn btn-primary">
                                <span data-feather="edit"></span>        
                            </a>
                        </td>
                        <td>
                            {!! Form::open(['action'=> ['ClientsController@destroy', $cliente->id],
                                            'method'=>'POST'])!!}
                                {{Form::hidden('_method','DELETE')}}
                                {{Form::button('<span data-feather="delete"></span>', 
                                                ['type' => 'submit','class'=>"btn btn-danger", 'title'=>"Eliminar"])}}
                            {!! Form::close()!!}
                        </td>
                                                
                    </tr>
                    @endforeach
                @else
                    <td>No hay clientes para mostrar</td>
                @endif
            </table> 
                     
                
        </div>
    </div>
</main>

@endsection