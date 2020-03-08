new Vue({

    el: "#crud",
    components:{ Multiselect:window.VueMultiselect.default},
    created() {
        this.getPizzas();
    },
    data:{
        pizzas:[],
        ingredients:[],
        pagination: {
            'total': 0,
            'current_page': 0,
            'per_page': 0,
            'last_page': 0,
            'from': 0,
            'to': 0
        },
        newPizza: {
            'name_pizza':null,
            'price':null,
            'ingredients':[]
        },
        fillPizza:{
            'name_pizza':null,
            'price':null,
            'ingredients': []
        },
        errors:{},
        offset:2,
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
        getPizzas: function(page){
            let url="/pizzas/list?page="+this.pagination.current_page;
            axios.get(url).then(response=> {
                this.pizzas=response.data.pizzas.data;
                this.ingredients = response.data.ingredients;
                console.log(this.ingredients);
                this.pagination=response.data.pagination;
            });
        },
        changePage: function(page) {
			this.pagination.current_page = page;
			this.getPizzas(page);
        },
        showCreate: function(){
            this.errors={};
            $("#create").modal('show');
        },
        createPizza: function() {
            let url = '';
            this.newPizza.ingredients=this.newPizza.ingredients.map( el => el.id)
            axios.post(url, this.newPizza)
                .then(response => {
                    this.getPizzas();
                    this.errors = {};
                    this.pizzaActual=response.data.pizza;
                    setTimeout(()=>{
                        $('#create').modal('hide');
                        toastr.success('Nueva pizza creada con éxito');
                    },1000);

                    this.newPizza=  {
                        'name_pizza':null,
                        'price':null,
                        'ingredients':[]
                    } ;

			    }).catch(error => {
                    console.log(error);
                    this.errors=error.response.data.errors
            	});
        },
        togglePizza: function(id){
            let url='pizzas/toggle/'+id;
            axios.put(url).then((response)=>{
                this.getPizzas();
                toastr.success(response.data.estado);
            })
            .catch((error)=>{
                console.log(error);
            });
        },
        showPizza: function(pizza){
            this.fillPizza={
                'id':pizza.id,
                'name_pizza':pizza.name_pizza,
                'price':pizza.price,
                'ingredients': pizza.ingredients
            }

            this.errors={};

          $("#edit").modal('show');
        },
        updatePizza: function(){
            this.errors={};
            let url='pizzas/update/'+this.fillPizza.id;
            this.fillPizza.ingredients=this.fillPizza.ingredients.map( el => el.id)
            axios.put(url, this.fillPizza ).then((response)=>{
                this.getPizzas();
                this.errors = {};
                this.pizzaActual=response.data.respuesta;
                $("#edit").modal('hide');
                toastr.success(response.data.respuesta);
            })
            .catch((error)=>{
                this.errors=error.response.data.errors
            });
        }

    }

});
  // register globally



