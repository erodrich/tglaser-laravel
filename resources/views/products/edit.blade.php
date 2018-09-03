@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">Modificar de Producto</h1>
    </div>
    <div class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            
            <h2>Datos de Producto</h2>
            {!! Form::open(['action' => ['ProductsController@update', $producto->id],'method'=>'POST']) !!}
            
                <div class="form-group">
                    {{Form::label('proveedor','Seleccione proveedor: ')}}
                    {{Form::select('proveedor_id',$proveedores, $producto->supplier->id),['class'=>'form-control']}}
                </div>
                <div class="form-group">
                    {{Form::label('codigo','Código: ')}}
                    {{Form::text('codigo',$producto->codigo,['class'=>'form-control','placeholder'=>''])}}
                </div>
                <div class="form-group">
                    {{Form::label('descripcion','Descripción: ')}}
                    {{Form::text('descripcion',$producto->descripcion,['class'=>'form-control','placeholder'=>''])}}
                </div>
                <div class="form-group">
                    {{Form::label('precio_venta','Precio de Venta: ')}}
                    {{Form::number('precio_venta',$producto->precio_venta,['class'=>'form-control','step'=>'any'])}}
                </div>
                <div class="form-group">
                    {{Form::label('precio_compra','Precio de Compra: ')}}
                    {{Form::number('precio_compra',$producto->precio_compra,['class'=>'form-control','step'=>'any'])}}
                </div>
                <div class="form-group">
                    {{Form::label('tipo','Seleccione tipo de producto: ')}}
                    {{Form::select('tipo_id',$tipos, $producto->type->id),['class'=>'form-control']}}
                </div>
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Guardar',['class'=>'btn btn-primary'])}}
                <a href="/products" class="btn btn-primary">Volver</a>
            {!! Form::close() !!}
        </div>
    </div>
</main>
<script>
    $(document).ready(function(){
        switch($("#tipo").val()){
            case 'luna':
                $("#lunaSection").attr('class','border p-3');
                break;
            case 'lente':
                $("#lenteSection").attr('class','border p-3');
                break;
        }
        $("#tipo").on("change", function(){
            switch (this.value) { 
                case 'luna': 
                    //Ocultar la seccion lente de contacto
                    //y poner sus valores a null
                    $("#lenteSection").attr('class', 'd-none border p-3');
                    //mostrar seccion lunas
                    $("#lunaSection").attr('class','border p-3');
                    break;
                case 'lente': 
                    //Ocultar la seccion lunas
                    //y poner sus valores a null
                    $("#lunaSection").attr('class','d-none border p-3');
                    // mostrar seccion lentes de contacto
                    $("#lenteSection").attr('class','border p-3');
                    break;
                case 'montura': 
                    // Ocultar las otras secciones
                    $("#lunaSection").attr('class','d-none');
                    $("#lenteSection").attr('class','d-none');
                    break;
            }
        });

    });
    
</script>
@endsection