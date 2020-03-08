//variables
const carrito = document.getElementById('carrito');
const cursos = document.getElementById('lista-cursos');
const listaCursos = document.querySelector('#lista-carrito tbody');
const vaciarCarritoBtn = document.getElementById('vaciar-carrito');

//listener
cargarEventListeners();
function cargarEventListeners(){
    //dispara cuando se presiona agregar carrito
    cursos.addEventListener('click',comprarCurso);
    //cuando se elimina un curso del carrito
    carrito.addEventListener('click',eliminarCurso);
    vaciarCarritoBtn.addEventListener('click',vaciarCarrito);
    //al cargar el documento mostrar localstorage
    document.addEventListener('DOMContentLoaded',leerLocalStorage);
}
//funciones
//función que añade el curso al carrito
function comprarCurso(e){
    e.preventDefault();
    //reacciona al codigo cuando se presiona el carrito Delagation
    if(e.target.classList.contains('agregar-carrito')){
        const curso = e.target.parentElement.parentElement;
        //envuar el curso seleccionado para extraer los datos
        leerDatosCurso(curso);
    }
}
//función que lee los datos del curso de cada card
function leerDatosCurso(curso){
    const infoCurso ={
        imagen: curso.querySelector('img').src,
        titulo: curso.querySelector('h4').textContent,
        precio: curso.querySelector('.precio span').textContent,
        id: curso.querySelector('a').getAttribute('data-id')
    }
    insertarCarrito(infoCurso);
}
//Muestra el curso seleccionado en el carrito

function insertarCarrito(curso){
    let cursosLS;
    cursosLS= obtenerCursoLocalStorage();
    let agregado = false;
    cursosLS.forEach(function(cursoLS){
        if(cursoLS.id === curso.id){
            agregado = true;
        }
    })

    const row = document.createElement('tr');
    if(agregado){
        alert('Ha sido agregado ya el curso')
    }else{
        row.innerHTML = `
        <td> 
            <img src="${curso.imagen}" width=100 >
        </td>
        <td>${curso.titulo}</td>
        <td>${curso.precio}</td>
        <td>
            <a href="#" class="borrar-curso" data-id="${curso.id}"> X </a>
        </td>
        `;
        listaCursos.appendChild(row);
    guardarCursoLocalStorage(curso);
    }
    
}
//Eliminar el curso de las lista de cursos dentro del carrito en el DOM
function eliminarCurso(e){
    e.preventDefault();
    let curso, cursoId;
    if(e.target.classList.contains('borrar-curso')){
        e.target.parentElement.parentElement.remove();
        curso = e.target.parentElement.parentElement;
        cursoId= curso.querySelector('a').getAttribute('data-id');
    }
    eliminarCursoLocalStorage(cursoId);
}
//Elimina los cursos del carrito en el DOM
function vaciarCarrito(){
    //forma lenta
    //listaCursos.innerHTML = '';
    //forma rapida (recomendada)
    while(listaCursos.firstChild){
        listaCursos.removeChild(listaCursos.firstChild);
    }
   
    //vaciar localstorage
    vaciarLocalStorage();
    return false;
}
//almacena cursos en el carrito al local storage
function guardarCursoLocalStorage(curso){
   let cursos;
   //toma el valor de un arreglo con datos de LS o vacio
   cursos = obtenerCursoLocalStorage();
   //el curso seleccionado se agrega al arreglo
   cursos.push(curso);
   localStorage.setItem('cursos',JSON.stringify(cursos));
}
//para revisar si hay algo en el local storage
//comprueba que haya elementos en local storage
function obtenerCursoLocalStorage(){
    let cursosLS;
    //comprobamos si hay algo en localStorage
    if(localStorage.getItem('cursos') === null ){
        cursosLS = [];
    }else{
        cursosLS = JSON.parse(localStorage.getItem('cursos'));
    }
    return cursosLS;
}
//Imprime los cursos del LocalStorage en el carrito
function leerLocalStorage(){
    let cursosLS;
    cursosLS= obtenerCursoLocalStorage();
    cursosLS.forEach(function(curso){
        const row = document.createElement('tr');
        row.innerHTML = `
        <td> 
            <img src="${curso.imagen}" width=100 >
        </td>
        <td>${curso.titulo}</td>
        <td>${curso.precio}</td>
        <td>
            <a href="#" class="borrar-curso" data-id="${curso.id}"> X </a>
        </td>
    `;
    listaCursos.appendChild(row);
    })
}
//Elimina el curso por el id en el localStorage
function  eliminarCursoLocalStorage(cursoId){
    let cursosLS;
    //obtener el arreglo de cursos
    cursosLS= obtenerCursoLocalStorage();
    //Iteramos comparando el ID del curso borrado con el del LS
    cursosLS.forEach(function(cursoLS,index){
        if(cursoLS.id === cursoId){
            cursosLS.splice(index,1);
        }
    })
    //añadir el arreglo actual a storage
    localStorage.setItem('cursos',JSON.stringify(cursosLS));
}
//Elimina todos los cursos del local storage
function vaciarLocalStorage() {
    localStorage.clear();
}