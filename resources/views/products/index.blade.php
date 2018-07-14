@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">Listado de Productos</h1>
    </div>
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <a href="/products/create" class="btn btn-primary">Añadir Productos</a>
            <a href="/" class="btn btn-primary">Volver</a>

            <table class="table table-striped mt-3">
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha Alta</th>
                    <th></th>
                    <th></th>
                </tr>
                @if(count($productos) > 0)
                    @foreach($productos as $producto)
                    <tr>
                        <td><a href="/products/{{$producto->id}}">{{$producto->codigo}}</a></td>
                        <td>{{$producto->descripcion}}</td>
                        <td>{{$producto->created_at}}</td>
                        <td>
                            <a href="/products/{{$producto->id}}/edit" class="btn btn-primary">
                                <span data-feather="edit"></span>        
                            </a>
                        </td>
                        <td>
                            {!! Form::open(['action'=> ['ProductsController@destroy', $producto->id],
                                            'method'=>'POST'])!!}
                                {{Form::hidden('_method','DELETE')}}
                                {{Form::button('<span data-feather="delete"></span>', 
                                                ['type' => 'submit','class'=>"btn btn-danger", 'title'=>"Eliminar"])}}
                            {!! Form::close()!!}
                        </td>
                                                
                    </tr>
                    @endforeach
                @else
                    <td>No hay productos para mostrar</td>
                @endif
            </table> 
                     
                
        </div>
    </div>
</main>

@endsection