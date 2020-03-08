<form method="POST"  v-on:submit.prevent="createPizza">
    <div class="modal fade" id='create' style="overflow:hidden;" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Agregar Pizza</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label class="control-label">Nombre Pizza</label>
                    <input :class="['form-control', errors.name_pizza ? 'is-invalid' : '']" type="text" v-model="newPizza.name_pizza" name="name_pizza" placeholder="Ingrese el Nombre Pizza">
                    <div v-if='errors.name_pizza' class="form-control-feedback text-danger">@{{ errors.name_pizza[0] }}</div>
                </div>
                <div class="form-group">
                    <label class="control-label">Precio Pizza</label>
                    <input :class="['form-control', errors.price ? 'is-invalid' : '']" type="number" step="0.01" v-model="newPizza.price" name="price" placeholder="Ingrese el Precio de Pizza">
                    <div v-if='errors.price' class="form-control-feedback text-danger">@{{ errors.price[0] }}</div>
                </div>
                <div class="form-group">
                    <label for="selectIngredient" class="control-label">Ingrediente a Agregar</label>
                    <multiselect :class="[ errors.ingredients ? 'is-invalid' : '']"   v-model="newPizza.ingredients" :options="ingredients" track-by="name_ingredient" label="name_ingredient" :multiple="true"></multiselect>
                    <div v-if='errors.ingredients' class="form-control-feedback text-danger">@{{ errors.ingredients[0] }}</div>
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

