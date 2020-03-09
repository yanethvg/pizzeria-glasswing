new Vue({
    el: "#pizzas",
    created() {
        this.getPizzas();
    },
    data:{
        pizzas:[],
        pizzasSlice:[],
        ingredients:[],
        pagination: {
            'total': 0,
            'current_page': 0,
            'per_page': 0,
            'last_page': 0,
            'from': 0,
            'to': 0
        },
        errors:{},
        offset:2,
    },
    filters:{
        toTable: function(value){
            if(!value)
                return 'https://res.cloudinary.com/dgi2nmgsy/image/upload/w_468,h_351,c_scale/v1583767799/2747815cc4a7c1258da3f330d71bef8d_bvvree.jpg'
            return value.toString().replace('upload/','upload/w_468,h_351,c_scale/')
        }
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
            let url="/pedidos/list?page="+this.pagination.current_page;
            axios.get(url).then(response=> {
                this.pizzas=response.data.pizzas.data;
                this.ingredients = response.data.ingredients;
                this.pagination=response.data.pagination;
                this.pizzasSlice=[this.pizzas.slice(0,3),this.pizzas.slice(3,6)]
            });
        },
        changePage: function(page) {
			this.pagination.current_page = page;
			this.getPizzas(page);
        },
        showPizza: function(pizza){
            this.fillPizza={
                'id':pizza.id,
                'name_pizza':pizza.name_pizza,
                'price':pizza.price,
                'ingredients': pizza.ingredients,
                'file':pizza.img
            }
            this.image = pizza.img;
            this.errors={};

          $("#edit").modal('show');
        }

    }

});
  // register globally



