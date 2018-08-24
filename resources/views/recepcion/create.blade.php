@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">Montura</h1>
    </div>
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            
            <h2>Datos</h2>
            {!! Form::open(['action' => 'RecepcionController@store','method'=>'POST']) !!}
                <div class="form-group">
                    {{Form::label('almacen','Seleccione almacén: ')}}
                    {{Form::select('warehouse_id',$almacenes),['class'=>'form-control']}}
                </div>
                @if($product_value != null)
                    <div class="form-group">
                        {{Form::label('tipo','Tipo de producto:')}}
                        {{Form::text('tipo',$product_value->nombre,['class'=>'form-control'])}}
                    </div>
                @else
                    <div class="form-group">
                        {{Form::label('tipo','Tipo de producto: ')}}
                        {{Form::select('product_type_id',$product_types),['class'=>'form-control']}}
                    </div>
                @endif
                <div class="form-group">
                    {{Form::label('codigo','Codigo')}}
                    {{Form::text('codigo','',['class'=>'form-control','placeholder'=>''])}}
                </div>
                <div class="form-group">
                    {{Form::label('precio_compra','Precio de Compra')}}
                    {{Form::text('precio_compra','',['class'=>'form-control','placeholder'=>''])}}
                </div>
                <div class="form-group">
                    {{Form::label('precio_venta','Precio de Venta')}}
                    {{Form::text('precio_venta','',['class'=>'form-control','placeholder'=>''])}}
                </div>
                <div class="form-group">
                    {{Form::label('caontidad','Cantidad')}}
                    {{Form::text('cantidad','',['class'=>'form-control','placeholder'=>''])}}
                </div>
                {{Form::submit('Guardar',['class'=>'btn btn-primary'])}}
                <a href="/recepcion" class="btn btn-primary">Volver</a>
            {!! Form::close() !!}
        </div>
    </div>
</main>
@endsection