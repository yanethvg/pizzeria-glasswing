<form method="POST"  v-on:submit.prevent="updatePizza">
    <div class="modal fade" id='edit' >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Editar Pizza</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label class="control-label">Nombre de Pizza</label>
                    <input :class="['form-control', errors.name_pizza ? 'is-invalid' : '']" type="text" v-model="fillPizza.name_pizza" name="name_pizza" placeholder="Ingrese Nombre Pizza">
                    <div v-if='errors.name_pizza' class="form-control-feedback text-danger">@{{ errors.name_pizza[0] }}</div>

                </div>
                <div class="form-group">
                    <label class="control-label">Precio de Pizza</label>
                    <input :class="['form-control', errors.price ? 'is-invalid' : '']" type="number" step="0.01" v-model="fillPizza.price" name="price" placeholder="Ingrese Precio ">
                    <div v-if='errors.price' class="form-control-feedback text-danger">@{{ errors.price[0] }}</div>
                </div>
                <div class="form-group">
                    <label for="selectIngredient" class="control-label">Ingrediente a Agregar</label>
                    <multiselect :class="[ errors.ingredients ? 'is-invalid' : '']"   v-model="fillPizza.ingredients" :options="ingredients" track-by="name_ingredient" label="name_ingredient" :multiple="true"></multiselect>
                    <div v-if='errors.ingredients' class="form-control-feedback text-danger">@{{ errors.ingredients[0] }}</div>
                </div>
            <div class="modal-footer">
              <button class="btn btn-primary" type="submit">Actualizar</button>
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </form>
