new Vue({
    el: '#crud',
    created () {
        this.getIngredients()
    },
    data: {
        ingredients: [],
        image: '',
        pagination: {
            total: 0,
            current_page: 0,
            per_page: 0,
            last_page: 0,
            from: 0,
            to: 0
        },
        newIngredient: {
            name_ingredient: null,
            price: null,
            file: null
        },
        fillIngredient: {
            name_ingredient: null,
            price: null,
            file: null
        },

        errors: {},
        offset: 2,
        ingredientActual: ''
    },
    filters:{
        toTable: function(value){
            if(!value)
                return 'https://res.cloudinary.com/dgi2nmgsy/image/upload/w_80,h_80,c_scale/v1583768036/d43c12cc0053b2636250ba55d5c9d805_th9kkn.jpg'
            return value.toString().replace('upload/','upload/w_80,h_80,c_scale/')
        }
    },

    computed: {
        isActived: function () {
            return this.pagination.current_page
        },
        pagesNumber: function () {
            if (!this.pagination.to) {
                return []
            }

            var from = this.pagination.current_page - this.offset
            if (from < 1) {
                from = 1
            }

            var to = from + this.offset * 2
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page
            }

            var pagesArray = []
            while (from <= to) {
                pagesArray.push(from)
                from++
            }
            return pagesArray
        }
    },
    methods: {
        getIngredients: function (page) {
            let url = '/ingredients/list?page=' + this.pagination.current_page
            axios.get(url).then(response => {
                this.ingredients = response.data.ingredients.data
                this.pagination = response.data.pagination
            })
        },
        changePage: function (page) {
            this.pagination.current_page = page
            this.getIngredients(page)
        },
        showCreate: function () {
            this.errors = {}
            $('#create').modal('show')
        },

        createIngredient: function () {
            let url = ''
            this.newIngredient.file =this.image;
            axios.post(url, this.newIngredient)
                .then(response => {
                    this.getIngredients()
                    this.errors = {}
                    this.ingredientActual = response.data.ingredient
                    setTimeout(() => {
                        $('#create').modal('hide')
                        toastr.success('Nuevo ingrediente creado con éxito')
                    }, 2000)

                    this.newIngredient = {
                        name_ingredient: null,
                        price: null
                    }
                    this.image = null;
                })
                .catch(error => {
                    console.log(error)
                    this.errors = error.response.data.errors
                })
        },

        toggleIngredient: function (id) {
            let url = 'ingredients/toggle/' + id
            axios
                .put(url)
                .then(response => {
                    this.getIngredients()

                    toastr.success(response.data.estado)
                })
                .catch(error => {
                    console.log(error)
                })
        },
        showIngredient: function (ingredient) {
            this.fillIngredient = {
                id: ingredient.id,
                name_ingredient: ingredient.name_ingredient,
                price: ingredient.price
            }
            this.image = ingredient.img;
            this.errors = {}

            $('#edit').modal('show')
        },
        updateIngredient: function () {
            this.errors = {}
            let url = 'ingredients/update/' + this.fillIngredient.id
            this.fillIngredient.file =this.image;
            axios.put(url, this.fillIngredient)
                .then(response => {
                    this.getIngredients()
                    this.errors = {}
                    this.ingredientActual = response.data.respuesta
                    $('#edit').modal('hide')
                    toastr.success(response.data.respuesta)
                    this.image = null;
                })
                .catch(error => {
                    this.errors = error.response.data.errors
                })
        },
        onFileChange (e) {
            var files = e.target.files || e.dataTransfer.files
            if (!files.length) return
            this.createImage(files[0])
        },
        createImage (file) {
            var image = new Image()
            var reader = new FileReader()
            var vm = this

            reader.onload = e => {
                vm.image = e.target.result
            }
            reader.readAsDataURL(file)
        },
        removeImage: function (e) {
            this.image = ''
        }
    }
})
