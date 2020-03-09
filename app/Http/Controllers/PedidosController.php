<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Pizza;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
