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

Route::get('/', ['uses'=>'ProductsController@index', 'as'=>'allProducts']);

//Show all products
Route::get('products',['uses'=>'ProductsController@index', 'as'=>'allProducts']);

//Search
Route::get('search',['uses'=>'ProductsController@search', 'as'=>'searchProducts']);


///////////////////////////////////-- Start Categories pages --//////////////////////////////////

//Samsung products
Route::get('products/samsung',['uses'=>'ProductsController@samsungProducts', 'as'=>'samsung']);

//Apple products
Route::get('products/apple',['uses'=>'ProductsController@appleProducts', 'as'=>'apple']);

//Huawei products
Route::get('products/huawei',['uses'=>'ProductsController@huaweiProducts', 'as'=>'huawei']);

//Dell products
Route::get('products/dell',['uses'=>'ProductsController@dellProducts', 'as'=>'dell']);

//Lenovo products
Route::get('products/lenovo',['uses'=>'ProductsController@lenovoProducts', 'as'=>'lenovo']);

//Canon products
Route::get('products/canon',['uses'=>'ProductsController@canonProducts', 'as'=>'canon']);

//Nikon products
Route::get('products/nikon',['uses'=>'ProductsController@nikonProducts', 'as'=>'nikon']);

//Headphones products
Route::get('products/headphones',['uses'=>'ProductsController@headphonesProducts', 'as'=>'headphones']);

//Power banks products
Route::get('products/powerbanks',['uses'=>'ProductsController@powerbanksProducts', 'as'=>'powerbanks']);

//Drones products
Route::get('products/drones',['uses'=>'ProductsController@dronesProducts', 'as'=>'drones']);

///////////////////////////////////-- End Categories pages --//////////////////////////////////


//Add to cart
Route::get('product/addToCart/{id}',['uses'=>'ProductsController@addProductToCart','as'=>'AddToCartProduct']);

//show cart item
Route::get('cart',['uses'=>'ProductsController@showCart', 'as'=>'cartProducts']);

//delete item from cart
Route::get('product/deleteItemFromCart/{id}',['uses'=>'ProductsController@deleteItemFromCart','as'=>'DeleteItemFromCart']);

//Increase single product in cart
Route::get('product/increaseSingleProduct/{id}',['uses'=>'ProductsController@increaseSingleProduct','as'=>'IncreaseSingleProduct']);

//Decrease single product in cart
Route::get('product/decreaseSingleProduct/{id}',['uses'=>'ProductsController@decreaseSingleProduct','as'=>'DecreaseSingleProduct']);

//checkout page
Route::get('product/checkoutProducts/',['uses'=>'ProductsController@checkoutProducts','as'=>'checkoutProducts']);

//process checkout page
Route::post('product/createNewOrder/',['uses'=>'ProductsController@createNewOrder','as'=>'createNewOrder']);

//payment page
Route::get('payment/paymentpage', ["uses"=> "Payment\PaymentsController@showPaymentPage", 'as'=> 'showPaymentPage']);





//Create an order
Route::get('product/createOrder/',['uses'=>'ProductsController@createOrder','as'=>'createOrder']);



//user Authentication
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//admin panel
Route::get('admin/products',['uses'=>'Admin\AdminProductsController@index', 'as'=>'adminDisplayProducts'])->middleware('restrictToAdmin');

//Display Edit product form
Route::get('admin/editProductForm/{id}',['uses'=>'Admin\AdminProductsController@editProductForm', 'as'=>'adminEditProductForm']);

//Display Edit product image form
Route::get('admin/editProductImageForm/{id}',['uses'=>'Admin\AdminProductsController@editProductImageForm', 'as'=>'adminEditProductImageForm']);

//update product image
Route::post('admin/updateProductImage/{id}', ["uses"=>"Admin\AdminProductsController@updateProductImage", "as"=> "adminUpdateProductImage"]);

//update product data
Route::post('admin/updateProduct/{id}', ["uses"=>"Admin\AdminProductsController@updateProduct", "as"=> "adminUpdateProduct"]);

//Display Create product form
Route::get('admin/createProductForm',['uses'=>'Admin\AdminProductsController@createProductForm', 'as'=>'adminCreateProductForm']);

// Send new product data to database
Route::post('admin/sendCreateProductForm/', ["uses"=>"Admin\AdminProductsController@sendCreateProductForm", "as"=> "adminSendCreateProductForm"]);

//delete product
Route::get('admin/deleteProduct/{id}', ["uses"=>"Admin\AdminProductsController@deleteProduct", "as"=> "adminDeleteProduct"]);


