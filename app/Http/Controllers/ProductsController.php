<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Mail\OrderCreatedEmail;
use Illuminate\Support\Facades\Mail;

class ProductsController extends Controller
{
    //
    public function index(){


//        $products =[0=>["Name"=>"Iphone","Category"=>"Smart phones"]];
//
//        return $products;

        $products = Product::paginate(9);

        return view("allproducts",compact("products"));

    }

    //Search fun
    public function search(Request $request){
        $searchText= $request->get('searchText');
        $products =Product::where('name','like',$searchText.'%')->paginate(6);
        return view("allproducts",compact("products"));
    }



    public function addProductToCart(Request $request,$id){

//        $request->session()->forget("cart");
//        $request->session()->flash();

       $prevCart =$request->session()->get('cart');
       $cart= new Cart($prevCart);

       $product= Product::find($id);

       $cart->addItem($id, $product);
       $request->session()->put('cart',$cart);

       return redirect()->route("allProducts");


//       dump($cart);

    }


    public function showCart(){

        $cart= Session::get('cart');

        //cart is not empty
        if($cart){
            return view('cartProducts',['cartItems'=>$cart]);

//            dump($cart);

            //cart is empty
        }else{
            return redirect()->route("allProducts");

//            echo "Cart is Empty";

        }


    }

    public function deleteItemFromCart(Request $request, $id){

        $cart= $request->session()->get("cart");
        if(array_key_exists($id,$cart->items)){
            unset($cart->items[$id]);

        }

        $prevCart= $request->session()->get("cart");
        $updatedCart= new Cart($prevCart);
        $updatedCart->updatePriceAndQuantity();

        $request->session()->put("cart",$updatedCart);

        return redirect()->route('cartProducts');

    }

    ///////////////////////////////////-- Start Increase & Decrease Single Product Functions --///////////

    public function increaseSingleProduct(Request $request,$id){

        $prevCart= $request->session()->get('cart');
        $cart= new Cart($prevCart);

        $product= Product::find($id);
        $cart->addItem($id,$product);
        $request->session()->put('cart',$cart);
        return redirect()->route('cartProducts');

        //dump($cart);
    }

    public function decreaseSingleProduct(Request $request,$id){

        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart);

        if( $cart->items[$id]['quantity'] > 1){
            $product = Product::find($id);
            $cart->items[$id]['quantity'] = $cart->items[$id]['quantity']-1;

            $cart->items[$id]['totalSinglePrice'] = $cart->items[$id]['quantity'] *  $product['price'];
            $cart->updatePriceAndQuantity();

            $request->session()->put('cart', $cart);
        }

        return redirect()->route("cartProducts");
    }
    //**************************************************************************************************//

    ///////////////////////////////////-- Create New Order Functions --//////////////////////////////////////

    public function createNewOrder(Request $request){

        $cart = Session::get('cart');

        $first_name = $request->input('first_name');
        $address = $request->input('address');
        $last_name = $request->input('last_name');
        $zip = $request->input('zip');
        $phone = $request->input('phone');
        $email = $request->input('email');

        //check if user is logged in or not
//        $isUserLoggedIn = Auth::check();


//        if($isUserLoggedIn){
//            //get user id
//            $user_id = Auth::id();  //OR $user_id = Auth:user()->id;
//
//        }else{
//            //user is guest (not logged in OR Does not have account)
//            $user_id = 0;
//
//        }

        //cart is not empty
        if($cart) {
            // dump($cart);
            $date = date('Y-m-d H:i:s');
            $newOrderArray = array("status"=>"on_hold","date"=>$date,"del_date"=>$date,"price"=>$cart->totalPrice,
                "first_name"=>$first_name, "address"=> $address, 'last_name'=>$last_name, 'zip'=>$zip,'email'=>$email,'phone'=>$phone);


            $created_order = DB::table("orders")->insert($newOrderArray);
            $order_id = DB::getPdo()->lastInsertId();;


            foreach ($cart->items as $cart_item){
                $item_id = $cart_item['data']['id'];
                $item_name = $cart_item['data']['name'];
                $item_price = $cart_item['data']['price'];
                $newItemsInCurrentOrder = array("item_id"=>$item_id,"order_id"=>$order_id,"item_name"=>$item_name,"item_price"=>$item_price);
                $created_order_items = DB::table("order_items")->insert($newItemsInCurrentOrder);
            }

            //send the email

            //delete cart
            Session::forget("cart");
            Session::flush();
//            print_r($newOrderArray);


//            $payment_info =  $newOrderArray;
//            $payment_info['order_id'] = $order_id;
//            $request->session()->put('payment_info',$payment_info);


            return redirect()->route("showPaymentPage");



        }else{

//            print_r('error');
            echo 'Some thing error';
//            return redirect()->route("allProducts");

        }

    }

    public function checkoutProducts(){

        return view('checkoutproducts');

    }
   //**************************************************************************************************//







    ///////////////////////////////////-- Start Categories Functions --//////////////////////////////////

    public function samsungProducts(){

        $products= DB::table('products')->where('brands','Samsung')->get();
        return view("samsung", compact("products"));

    }

    public function huaweiProducts(){
        $products= DB::table('products')->where('brands','Huawei')->get();
        return view("huawei", compact("products"));

    }

    public function appleProducts(){
        $products= DB::table('products')->where('brands','Apple')->get();
        return view("apple", compact("products"));

    }

    public function dellProducts(){
        $products= DB::table('products')->where('brands','Dell')->get();
        return view("dell", compact("products"));

    }

    public function lenovoProducts(){
        $products= DB::table('products')->where('brands','Lenovo')->get();
        return view("lenovo", compact("products"));

    }

    public function canonProducts(){
        $products= DB::table('products')->where('brands','Canon')->get();
        return view("canon", compact("products"));

    }

    public function nikonProducts(){
        $products= DB::table('products')->where('brands','Nikon')->get();
        return view("nikon", compact("products"));

    }

    public function headphonesProducts(){
        $products= DB::table('products')->where('brands','Headphones')->get();
        return view("headphonesng", compact("products"));

    }

    public function powerbanksProducts(){
        $products= DB::table('products')->where('brands','Power banks')->get();
        return view("powerbanks", compact("products"));

    }

    public function dronesProducts(){
        $products= DB::table('products')->where('brands','Drones')->get();
        return view("drones", compact("products"));

    }
    //**************************************************************************************************//








}
