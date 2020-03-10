new Vue({
    el: "#pizzas",
    components:{ Multiselect:window.VueMultiselect.default},
    created() {
        this.getPizzas();
    },
    data:{
        pizzas:[],
        carrito:[],
        pizzasSlice:[],
        ingredients:[],
        total:null,
        extraIngredientsAvaible:[],
        pagination: {
            'total': 0,
            'current_page': 0,
            'per_page': 0,
            'last_page': 0,
            'from': 0,
            'to': 0
        },
        fillPizza:{
            'id':"",
            'name_pizza':"",
            'price':"",
            'ingredients': [],
            extraIngredients:[],
            'img':""
        },
        errors:{},
        offset:2,
    },
    filters:{
        toTable: function(value){
            if(!value)
                return 'https://res.cloudinary.com/dgi2nmgsy/image/upload/w_468,h_351,c_scale/v1583767799/2747815cc4a7c1258da3f330d71bef8d_bvvree.jpg'
            return value.toString().replace('upload/','upload/w_468,h_351,c_scale/')
        },
        toModal: function(value){
            if(!value)
                return 'https://res.cloudinary.com/dgi2nmgsy/image/upload/w_60,h_60,c_scale/v1583768036/d43c12cc0053b2636250ba55d5c9d805_th9kkn.jpg'
            return value.toString().replace('upload/','upload/w_60,h_60,c_scale/')
        },
        toCard: function(value){
            if(!value)
                return 'https://res.cloudinary.com/dgi2nmgsy/image/upload/w_80,h_80,c_scale/v1583767799/2747815cc4a7c1258da3f330d71bef8d_bvvree.jpg'
            return value.toString().replace('upload/','upload/w_80,h_80,c_scale/')
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
        customLabel ({name_ingredient,price}){
            return `${name_ingredient} - $ ${price}`
        },
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
                 extraIngredients : [],
                'img':pizza.img
            }
            ingredientes=this.ingredients;
            pizzaIngredients=this.fillPizza.ingredients;
            ingredientes.forEach(ingredient=>{
                isExtra=true;
                pizzaIngredients.forEach(pingredient=>{
                    if(ingredient.id==pingredient.id){
                        isExtra=false;
                    }
                })
                if(isExtra)
                    this.extraIngredientsAvaible.push(ingredient)
            })

            this.errors={};
            let modal = document.getElementById("myModal");
            modal.style.display = "block";

        },
        closeModal: function(){
            let modal = document.getElementById("myModal");
            modal.style.display = "none";
        },
        totalSum:function(extraIngredients, price){
            if(!extraIngredients){
                return parseFloat(price).toFixed(2);
            }
            let sum =extraIngredients.reduce((acu,val)=>{
                price_ingredient= parseFloat(val.price);
                return acu+parseFloat(price_ingredient)

            } ,0);
            sum+=parseFloat(price);
            return sum.toFixed(2);
        },
        addCarrito: function(pizza){
            this.carrito = [...this.carrito,pizza];
        },
        addIngredientesExtras: function(){
              this.carrito=  [...this.carrito,this.fillPizza]
        },
        deleteCarrito: function(pizza){
            this.carrito= this.carrito.filter( el => el.id != pizza.id)
        },
        cleanCarrito: function(){
            this.carrito=[]
            localStorage.clear();
        },
        saveStorage: function(){
            localStorage.setItem("carrito",JSON.stringify(this.carrito));
            location.href="/confirmacion";
        }

    }

});
  // register globally



