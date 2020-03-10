new Vue({
    el: "#confirmacion",
    created() {
        this.getLocalStorage();
    },
    data:{
        carrito:[],
    },
    filters:{
        toConfirm: function(value){
            console.log(value);
            if(!value)
                return 'No hay Ingredientes Extra'
            return value.join('-')
        },
        toCard: function(value){
            if(!value)
                return 'https://res.cloudinary.com/dgi2nmgsy/image/upload/w_80,h_80,c_scale/v1583767799/2747815cc4a7c1258da3f330d71bef8d_bvvree.jpg'
            return value.toString().replace('upload/','upload/w_80,h_80,c_scale/')
        }
    },

    methods: {
        getLocalStorage: function(){
            let carro = localStorage.getItem('carrito');
            this.carrito = JSON.parse(carro);
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
            this.carrito=[];
            localStorage.clear();
        },
        sendData: function () {
            let url = '/pedidos';
            let pizzas=[]
            let prices=[]
            this.carrito.forEach(el=>{
                let pizza={
                    id:el.id,
                    ingredientesExtras:el.extraIngredients?el.extraIngredients.map(i => i.id):[]
                }
                prices.push(this.totalSum(el.extraIngredients,el.price))
                pizzas.push(pizza)
            })
            let sum =prices.reduce((acu,val)=>{
                return acu+parseFloat(val);
            } ,0);
            let amount = sum;
            console.log(prices);
            let envio ={
                pizzas,
                amount
            }

            axios.post(url,envio)
                .then(response => {
                    setTimeout(() => {
                        toastr.success('Pedido Realizado  con éxito')
                    }, 2000)
                })
                .catch(error => {
                    console.log(error)
                })
        },
    }

});
  // register globally



