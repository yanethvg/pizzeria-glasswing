<?php

namespace App\Http\Controllers;

use App\Ingredient;
use App\Order;
use App\OrderDetails;
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
        //dd($request->all());
        $order = new Order;
        $order->amount = $request->amount;
        $order->save();
        foreach($request->pizzas as $pizza){
            $orderDetail = new OrderDetails;
            $orderDetail->order_id = $order->id;
            $orderDetail->pizza_id = $pizza['id'];
            $orderDetail->save();
            if($pizza['ingredientesExtras'])
                $orderDetail->ingredients()->sync($pizza['ingredientesExtras']);

        }
        return response()->json(['respuesta'=>'Orden Creada con éxito']);
    }

    public function destroy($id)
    {

    }
}
