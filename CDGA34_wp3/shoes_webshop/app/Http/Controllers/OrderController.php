<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shoes;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;

class OrderController extends Controller
{
    public function addcart(Request $request, $id)
    {
       if(Auth::id())
       {
           $user=auth()->user();
           $shoe=shoes::find($id);
           $cart = new cart;

           $cart->name=$user->name;
           $cart->email=$user->email;
           $cart->product_title=$shoe->model_name;
           $cart->price=$shoe->price;
           $cart->quantity=$request->quantity;
           $cart->save();
           return redirect('/shoes/index');
       }
       else
       {
           return redirect('/shoes/index');
       }
    }
}
