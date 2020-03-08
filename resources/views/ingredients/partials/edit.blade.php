<form method="POST"  v-on:submit.prevent="updateIngredient">
        <div class="modal fade" id='edit' >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Editar Ingrediente</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label">Nombre de Ingrediente</label>
                        <input :class="['form-control', errors.name_ingredient ? 'is-invalid' : '']" type="text" v-model="fillIngredient.name_ingredient" name="name_ingredient" placeholder="Ingrese Nombre del Ingrediente">
                        <div v-if='errors.name_ingredient' class="form-control-feedback text-danger">@{{ errors.name_ingredient[0] }}</div>

                    </div>
                    <div class="form-group">
                        <label class="control-label">Precio de Ingrediente</label>
                        <input :class="['form-control', errors.price ? 'is-invalid' : '']" type="number" step="0.01" v-model="fillIngredient.price" name="price" placeholder="Ingrese Precio ">
                        <div v-if='errors.price' class="form-control-feedback text-danger">@{{ errors.price[0] }}</div>

                    </div>



                <div class="modal-footer">
                  <button class="btn btn-primary" type="submit">Actualizar</button>
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </form>
