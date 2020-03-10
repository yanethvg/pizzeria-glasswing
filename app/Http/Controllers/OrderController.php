<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function list(Request $request){
        $orders=Order::where('user_id',auth()->user()->id)->with('pizzas')->paginate(3);
        return [
            'pagination' => [
                'total'         => $orders->total(),
                'current_page'  => $orders->currentPage(),
                'per_page'      => $orders->perPage(),
                'last_page'     => $orders->lastPage(),
                'from'          => $orders->firstItem(),
                'to'            => $orders->lastItem(),
            ],
            'orders' => $orders
        ];
    }
}
