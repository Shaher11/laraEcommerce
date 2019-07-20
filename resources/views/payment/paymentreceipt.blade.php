
@extends('layouts.index')



@section('center')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
       
            <div class="shopper-informations">
                <div class="row">
            
                    <div class="col-sm-12 clearfix" style="margin-bottom:20px">
                        <div class="bill-to">
                            <p> Payment Receipt</p>
                            <div class="form-one">
                                
                                          <h1 class="text-center"> Thanks for choosing our product!</h1>
                                           <div class="total_area">
                                                    <ul>
                                                        <li>Order ID<span>{{$payment_receipt['order_id']}}</span></li>      
                                                        <li>Payer ID<span>{{$payment_receipt['paypal_payer_id']}}</span></li>
                                                        <li>Payment ID<span>{{$payment_receipt['paypal_payment_id']}}</span></li>
                                                        <li>Total <span id="amount">{{$payment_receipt['price']}}</span></li>
                                                    </ul>
                                                    <a class="btn btn-default update" href="{{route('allProducts')}}">Shop Again!</a>
                                                  
                                                </div>

                                          
                            </div>
                            <div class="form-two">
                                
                            </div>
                            
                            
                        </div>
                        
                        
                    </div>
                           
                </div>
            </div>
       
    </div>
</section> <!--/#payment-->



@endsection




