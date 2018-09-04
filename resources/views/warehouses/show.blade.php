@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">Detalle de almacén</h1>
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
                      <h3>{{$almacen->nombre}}</h3>
                </div>
                <div class="card-body">
                    <a href="{{ route('warehouses.index') }}" class="btn btn-primary">Volver</a>
                    <table class="table table-striped mt-3">
                            <tr>
                                <th>Producto</th>
                                <th>Tipo</th>
                                <th>Cantidad</th>
                                <th>Último movimiento</th>
                                <th></th>
                            </tr>
                            @if(count($stocks) > 0)
                                @foreach($stocks as $stock)
                                <tr>
                                    <td><a href="/products/{{$stock->product->id}}">{{$stock->product->descripcion}}</a></td>
                                    <td>{{$stock->product->type->nombre}}</td>
                                    <td>{{$stock->cantidad}}</td>
                                    <td>{{$stock->updated_at}}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" 
                                        data-toggle="modal" 
                                        data-id="{{ $stock->id }}"
                                        data-target="#exampleModalCenter">
                                        Mover Producto
                                    </button>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <td>No hay productos en este almacén</td>
                            @endif
                        </table> 
                    
                </div>
                
            </div>
                     
                
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Mover producto</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            {!! Form::open(['action' => ['WarehousesController@move', $almacen->id],'method'=>'POST']) !!}
            <div class="modal-body">
                <div class="form-group">
                        {{Form::label('almacen','Seleccione almacén destino: ')}}
                        {{Form::select('destino_id',$almacenes),['class'=>'form-control']}}
                    </div>
                   
                    <div class="form-group">
                        {{Form::label('cantidad','Cantidad: ')}}
                        {{Form::number('cantidad','',['class'=>'form-control'])}}
                    </div>
                    {{ Form::hidden('id','stock_id') }}
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              {{Form::submit('Mover',['class'=>'btn btn-primary'])}}
            </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
</main>
<script>
$(function() {
    $('#exampleModalCenter').on("show.bs.modal", function (e) {
        alert('Hola');
         $("#exampleModalCenterTitle").html($(e.relatedTarget).data('title'));
         $("#stock_id").val($(e.relatedTarget).data('id'));
    });
});

</script>

@endsection