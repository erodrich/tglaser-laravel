@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">Añadir de Cliente</h1>
    </div>
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            
            <h2>Datos de Cliente</h2>
            {!! Form::open(['action' => 'ClientsController@store','method'=>'POST']) !!}
                <div class="form-group">
                    {{Form::label('nombre','Nombre y apellido: ')}}
                    {{Form::text('nombre','',['class'=>'form-control','placeholder'=>''])}}
                </div>
                <div class="form-group">
                    {{Form::label('numero_documento','Número de documento: ')}}
                    {{Form::text('numero_documento','',['class'=>'form-control','placeholder'=>''])}}
                </div>
                <div class="form-group">
                    {{Form::label('telefono','Teléfono: ')}}
                    {{Form::number('telefono','',['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('email','Email: ')}}
                    {{Form::email('email','',['class'=>'form-control'])}}
                </div>

                {{Form::submit('Guardar',['class'=>'btn btn-primary'])}}
            <a href="{{route('clients.index')}}" class="btn btn-primary">Volver</a>
            {!! Form::close() !!}
        </div>
    </div>
</main>

 
@endsection