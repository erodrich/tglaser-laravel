<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Detalle de proveedor</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    <div class="card">
                    <div class="card-body">
                        <ul>
                            <li>Nombre: {{$proveedor->nombre}}</li>
                            <li>Ruc: {{$proveedor->ruc}}</li>
                            <li>Descripción: {{$proveedor->descripcion}}</li>
                        </ul>
                        <hr>
                            <small>Creado el: {{$proveedor->created_at}}</small>
                        <hr>
                    </div>
                    </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <!-- <button type="button" class="btn btn-primary">Guardar</button>-->
            </div>
          </div>
        </div>
      </div>