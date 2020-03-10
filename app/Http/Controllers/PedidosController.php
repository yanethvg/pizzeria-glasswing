<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Pizza;
use Illuminate\Http\Request;

class PedidosController extends Controller
{

    public function list(Request $request){
        $pizzas = Pizza::orderby('id','DESC')
                         ->with('ingredients')
                         ->paginate(6);
         $ingredients = Ingredient::all();

         //dd($pizzas);
         return [
             'pagination' => [
                 'total'         => $pizzas->total(),
                 'current_page'  => $pizzas->currentPage(),
                 'per_page'      => $pizzas->perPage(),
                 'last_page'     => $pizzas->lastPage(),
                 'from'          => $pizzas->firstItem(),
                 'to'            => $pizzas->lastItem(),
             ],
             'pizzas' => $pizzas,
             'ingredients' => $ingredients
         ];
     }

    public function store(Request $request)
    {

    }


    public function show($id)
    {

    }


    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {

    }
}
