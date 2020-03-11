<?php

namespace App\Http\Controllers;

use App\DetailsIngredient ;
use App\Ingredient;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    public function clientesFrecuentes()
    {
        $orders = Order::with('users')->select('user_id',DB::raw('count(*) as cantidad, sum(amount) as total'))
        ->groupBy('user_id')->orderby('cantidad','DESC')->take('5')->get();
        //dd($orders);
        return view('consultas.clientesFrecuentes',compact('orders'));
    }
    public function clientesGastan()
    {
        $orders = Order::with('users')->select('user_id',DB::raw('count(*) as cantidad, sum(amount) as total'))
        ->groupBy('user_id')->orderby('total','DESC')->take('5')->get();
        //dd($orders);
        return view('consultas.clientesGastan',compact('orders'));
    }
    public function ingredientesPopulares()
    {
        $detailsIngredient = DetailsIngredient::with('ingredient')->select('ingredient_id',DB::raw('count(*) as cantidad'))
        ->groupBy('ingredient_id')->orderby('cantidad','DESC')->take('5')->get();
        //dd($detailsIngredient);
        return view('consultas.IngredientesPopulares',compact('detailsIngredient'));
    }
}
