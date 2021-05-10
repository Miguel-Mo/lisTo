

<!-- Modal -->
<div class="modal fade" id="nuevaZonaModal" tabindex="-1" role="dialog" aria-labelledby="nuevaZonaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-kiki">
        <h5 class="modal-title" id="nuevaZonaModalLabel">Añadir Nueva Zona</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="formNuevaZona">
                    <div class="form-group">
                        <label for="nombreZona">Nombre</label>
                        <input type="text" id="nombreZona" name="nombreZona" class="form-control form-control-sm" minlength="3" maxlength="200" required>
                    </div>
                </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" form="formNuevaZona" class="btn btn-kiki">Generar</button>
      </div>
    </div>
  </div>
</div>