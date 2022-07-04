<?php

namespace App\Http\Controllers;
use App\Cart;
use App\Category;
use App\User;
use App\Product;
use Faker\Provider\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProductsList(){
        if (Session::has('user')){
            $temp = User::where('username',session('user'))->first();
            if ($temp->user_type === User::ADMIN_TYPE){
                $products = DB::table('products')
                    ->join('categories' , 'products.category_id','=','categories.id')
                    ->select('products.*','categories.name')
                    ->get();
                return view('admin/productList',['products'=>$products]);
            }
        }
        else{
            return back()->withErrors('you dont have permission for this page!');
        }
    }
    public function showAddProductForm(){
        if (Session::has('user')){
            $temp = User::where('username',session('user'))->first();
            if ($temp->user_type === User::ADMIN_TYPE){
                $categories =Category::all();
                return view('admin/addProduct',['categories'=>$categories]);
            }
        }
        else{
            return back()->withErrors('you dont have permission for this page!');
        }
    }

    public function showEditProductForm(Request $request , $id){
        if (Session::has('user')){
            $temp = User::where('username',session('user'))->first();
            if ($temp->user_type === User::ADMIN_TYPE){
                $product = DB::table('products')
                    ->join('categories' , 'products.category_id','=','categories.id')
                    ->where('products.id',$id)
                    ->select('products.*','categories.name')
                ->first();
                $categories =Category::all();
                return view('admin/editProduct',['categories'=>$categories,'product'=>$product]);
            }
        }
        else{
            return back()->withErrors('you dont have permission for this page!');
        }
    }
    public function updateProduct(Request $request,$id){
        $request->validate([
            'title' => 'required',
            'price' => 'required|regex:/(^[0-9]{1,4}(?:\.[0-9]{1,3})?$)/u',
            'cat_id' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
        ]);
        $product = Product::where('id' , $id)->first();
        $filename = $product->image;
        if ($request->hasFile('image')){
            Storage::delete('/app/public/uploads/products/'.$filename);
//            File::delete('F:/laravelProject/storage/app/public/uploads/products/'.$filename);
            $prod_im = $request->file('image');
            $filename = time() . '.' . $prod_im->getClientOriginalExtension();
            Image::make($prod_im)->resize(300,300)->save('F:/laravelProject/storage/app/public/uploads/products/'.$filename);

        }
        $product->edit($request->title ,$request->cat_id , $request->price , $filename,$request->description);
        return redirect('/admin/products')->with('message','Product Edited successfully!');
    }
    public function storeProduct(Request $request){
        $request->validate([
            'title' => 'required',
            'price' => 'required|regex:/(^[0-9]{1,4}(?:\.[0-9]{1,3})?$)/u',
            'cat_id' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);
        if ($request->hasFile('image') && $request->has(['title','price','description','cat_id'])){

            $prod_im = $request->file('image');
            $filename = time() . '.' . $prod_im->getClientOriginalExtension();
            $path = public_path('uploads/products/'.$filename);
            Image::make($prod_im)->resize(300,300)->save('F:/laravelProject/storage/app/public/uploads/products/'.$filename);

            $prod = new Product();
            $prod->insert($request->title ,$request->cat_id , $request->price , $filename,$request->description);
            //$prod->save();
            return redirect('/admin')->with('message','Product added successfully');
        }
        else{
            return back()->withInput();
        }
    }
    public function showProduct(Request $request,$id){
        $product = DB::table('products')
            ->join('categories' , 'products.category_id','=','categories.id')
            ->where('products.id',$id)
            ->select('products.*','categories.name')
            ->first();
//        return $product;
        return view('ProductDetails',['product'=>$product]);
    }
    public function destroy(Request $request,$id){
        $product = Product::where('id',$id);
        $product -> delete();
        return redirect('/admin/products')->with(['message'=>'product deleted successfully!']);
    }

    public function addToCart(Request $request,$id){
        if (!(Session::has('user'))){
            return back()->withErrors('login required for this action!');
        }
        $user_id = User::where('username',session('user'))->first()->id;
        $cart = new Cart();
        $cart->insert($user_id , $id);
        return back()->with(['message'=>'product added to card!']);
    }
    //
}
