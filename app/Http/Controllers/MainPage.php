<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Carbon\Carbon;
use App\Category;
use Illuminate\Support\Facades\Session;
use App\User;

class MainPage extends Controller
{
    //
    function getCategories(){

    }

    function showQueryProducts(Request $request){
        $categories =Category::all();
        global $products;
        $products = DB::table('products');
        $min_price = $request->has('min_price') ? $request->get('min_price') : null;
        $max_price = $request->has('max_price') ? $request->get('max_price') :null;
        $categoris = $request->has('category') ? $request->get('category'):null;
        $date = $request->has('date') ? $request->get('date') :null;
        $order = $request->has('order') ? $request->get('order'):null;
        if (isset($min_price)){
            $products = $products->where('price','>=',$min_price);
        }
        if (isset($max_price)){
            $products = $products->where('price' , '<=' , $max_price);
        }
        if (isset($categoris)){
            $products = $products->where('category_id' , $categoris);
//            return $products;
        }
        if (isset($date)){
            $products = $products->where('created_at' , '=' , $date.' 00:00:00');
        }
        if (isset($order)){
            if ($order === 'date_c'){
                $products = $products->orderBy('created_at');
            }
            elseif($order === 'price'){
                $products = $products->orderBy('price');
            }
            else{
                $products = $products->orderBy('title');
            }
        }
        $products = $products->get();
//        return $products;
        return view('Eshop',['products'=>$products,'categories'=>$categories]);
    }
    public function showUserCart(Request $request,$username){
        if (!(Session::has('user')) || !(session('user')===$username)){
            return back()->withErrors('access denied !');
        }
        $user_id = User::where('username',session('user'))->first()->id;
        $cart_items = DB::table('carts')->
            where('user_id',$user_id)->
            join('products','products.id','=','carts.product_id')->
            select('carts.*','products.title','products.description','products.price','products.image')->
            get();
//        return $cart_items;
        return view('cartItem',['cart_items'=>$cart_items]);
    }
    public function minus(Request $request ,$username , $id){
        if (!(Session::has('user')) || !(session('user')===$username)){
            return back()->withErrors('access denied !');
        }
        $cart = Cart::where('id',$id);
//        if (($cart->count) > 1 ) {
//            $cart->count_minus();
//            $cart->save();
//            return redirect('/user/'.$username.'/cartItems');
//        }
//        else{
            $cart->delete();
            return redirect('/user/'.$username.'/cartItems')->with(['message'=>'item deleted from cart!']);
//        }
    }
    public function plus(Request $request,$username,$id){
        if (!(Session::has('user')) || !(session('user')===$username)){
            return back()->withErrors('access denied !');
        }
        $cart = Cart::where('id',$id);
        $cart->count_plus();
        $cart->save();
        return redirect('/user/'.$username.'/cartItems');
    }


}
