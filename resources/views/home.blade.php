@extends('layouts.app')

@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <!-- Cabecera de Contenido -->
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h1">Sistema de Ventas</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <button class="btn btn-sm btn-outline-secondary">Share</button>
        <button class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
      <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
        <span data-feather="calendar"></span>
        This week
      </button>
    </div>
  </div>
  <!-- Contenido principal -->
  <div class="row mt-3">
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title">Ventas</h3>
          <p class="card-text">En esta opción podrá: Registrar una nueva venta y consultar ventas realizadas</p>
          <a href="#" class="btn btn-primary">Ir a Ventas</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
            <h3 class="card-title">Recepcion</h3>
            <p class="card-text">En esta opción podrá: Registrar la recepción de productos, consultar stock y mover productos
              de un almacén a otro.
            </p>
            <a href="{{ route('recepcion') }}" class="btn btn-primary">Ir a Recepción de Productos</a>
        </div>
      </div>
    </div>
  </div>
</main>
    
@endsection
