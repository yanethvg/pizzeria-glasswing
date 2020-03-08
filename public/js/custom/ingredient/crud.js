new Vue({

    el: "#crud",
    created() {
        this.getIngredients();
    },
    data:{
        ingredients:[],
        pagination: {
            'total': 0,
            'current_page': 0,
            'per_page': 0,
            'last_page': 0,
            'from': 0,
            'to': 0
        },
        newIngredient: {
            'name_ingredient':null,
            'price':null
        },
        fillIngredient:{
            'name_ingredient':null,
            'price':null
        },

        errors:{},
        offset:2,
        ingredientActual: '',
    },

    computed: {
		isActived: function() {
			return this.pagination.current_page;
		},
		pagesNumber: function() {
			if(!this.pagination.to){
				return [];
			}

			var from = this.pagination.current_page - this.offset;
			if(from < 1){
				from = 1;
			}

			var to = from + (this.offset * 2);
			if(to >= this.pagination.last_page){
				to = this.pagination.last_page;
			}

			var pagesArray = [];
			while(from <= to){
				pagesArray.push(from);
				from++;
			}
			return pagesArray;
        }

    },
    methods: {
        getIngredients: function(page){
            let url="/ingredients/list?page="+this.pagination.current_page;
            axios.get(url).then(response=> {
                this.ingredients=response.data.ingredients.data;
                this.pagination=response.data.pagination;
            });
        },
        changePage: function(page) {
			this.pagination.current_page = page;
			this.getIngredients(page);
        },
        showCreate: function(){
            this.errors={};
            $("#create").modal('show');
        },

        createIngredient: function() {
            let url = '';
            axios.post(url, this.newIngredient)
                .then(response => {
                    this.getIngredients();
                    this.errors = {};
                    this.ingredientActual=response.data.ingredient;
                    setTimeout(()=>{
                        $('#create').modal('hide');
                        toastr.success('Nuevo ingrediente creado con éxito');
                    },2000);

                    this.newIngredient=  {
                        'name_ingredient':null,
                        'price':null,
                    } ;

			    }).catch(error => {
                    console.log(error);
                    this.errors=error.response.data.errors
            	});
        },

        toggleIngredient: function(id){
            let url='ingredients/toggle/'+id;
            axios.put(url).then((response)=>{
                this.getIngredients();

                toastr.success(response.data.estado);
            })
            .catch((error)=>{
                console.log(error);
            });
        },
        showIngredient: function(ingredient){
            this.fillIngredient={
                'id':ingredient.id,
                'name_ingredient':ingredient.name_ingredient,
                'price':ingredient.price
            }

            this.errors={};

          $("#edit").modal('show');
        },
        updateIngredient: function(){
            this.errors={};
            let url='update/'+this.fillIngredient.id;
            axios.put(url, this.fillIngredient ).then((response)=>{
                this.getIngredients();
                this.errors = {};
                this.ingredientActual=response.data.respuesta;
                $("#edit").modal('hide');
                toastr.success(response.data.respuesta);
            })
            .catch((error)=>{
                this.errors=error.response.data.errors
            });
        }
    }

});
