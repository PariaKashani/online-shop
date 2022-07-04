<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Session;
Route::get('search','MainPage@showQueryProducts')->name('searchProd');
Route::get('/', function (Request $request) {
    $products = Product::all();
    $categories =Category::all();
    return view('EShop',['products'=>$products,'categories'=>$categories]);
});

Route::get('/products/{id}','ProductController@showProduct');
Route::put('/products/{id}','ProductController@addToCart');
Route::get('/user/{username}/cartItems','MainPage@showUserCart');
Route::delete('/user/{username}/cartItems/{id}','MainPage@minus');
Route::put('/user/{username}/cartItems/{id}','MainPage@plus');

Route::prefix('admin')->group(function (){
    Route::get('','AdminController@showAdminPage');
    Route::get('newproduct','ProductController@showAddProductForm')->name('admin.newproduct');
    Route::post('newproduct' , 'ProductController@storeProduct');
    Route::get('products' , 'ProductController@showProductsList');
    Route::delete('product/{id}','ProductController@destroy');
    Route::get('product/{id}/edit','ProductController@showEditProductForm');
    Route::post('product/{id}/edit','ProductController@updateProduct');
});

Route::get('a', function () {
    return view('login');
});
Route::get('/signup','auth@showSignupForm')->name('signup_r');
Route::post('/signup', 'auth@sign_up');

Route::get('/signin','auth@showSigninForm')->name('login');
Route::post('/signin', 'auth@sign_in');

Route::get('/logout','auth@sign_out');

Route::get('welcome', 'welcome@welcome');



//Route::post('sign_up', 'auth@sign_up');