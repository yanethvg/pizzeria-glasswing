<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function list(Request $request){
        $orders=Order::where('user_id',auth()->user()->id)->with('pizzas')->get();
        return $orders;
    }
}
