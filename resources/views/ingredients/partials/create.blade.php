<form method="POST"  v-on:submit.prevent="createIngredient">
    <div class="modal fade" id='create' >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Agregar Ingrediente</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label class="control-label">Nombre del Ingrediente</label>
                    <input :class="['form-control', errors.name_ingredient ? 'is-invalid' : '']" type="text" v-model="newIngredient.name_ingredient" name="name_ingredient" placeholder="Ingrese el Nombre del Ingrediente">
                    <div v-if='errors.name_ingredient' class="form-control-feedback text-danger">@{{ errors.name_ingredient[0] }}</div>
                </div>
                <div class="form-group">
                    <label class="control-label">Precio del Ingrediente</label>
                    <input :class="['form-control', errors.price ? 'is-invalid' : '']" type="number" step="0.01" v-model="newIngredient.price" name="price" placeholder="Ingrese el Precio del Ingrediente">
                    <div v-if='errors.price' class="form-control-feedback text-danger">@{{ errors.price[0] }}</div>
                </div>


                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Registrar</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
      </div>
    </div>
</form>
