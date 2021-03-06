@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">Añadir Proveedor</h1>
    </div>
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            
            <h2>Datos de Proveedor</h2>
            {!! Form::open(['action' => 'SuppliersController@store','method'=>'POST']) !!}
                <div class="form-group">
                {{Form::label('nombre','Nombre')}}
                {{Form::text('nombre','',['class'=>'form-control','placeholder'=>''])}}
                </div>
                <div class="form-group">
                {{Form::label('ruc','RUC')}}
                {{Form::text('ruc','',['class'=>'form-control','placeholder'=>'12345678900'])}}
                </div>
                <div class="form-group">
                {{Form::label('descripcion','Descripción')}}
                {{Form::textarea('descripcion','',['class'=>'form-control','placeholder'=>'Información adicional', 'rows'=>'3'])}}
                </div>
                {{Form::submit('Guardar',['class'=>'btn btn-primary'])}}
                <a href="/suppliers" class="btn btn-primary">Volver</a>
            {!! Form::close() !!}
        </div>
    </div>
</main>
@endsection