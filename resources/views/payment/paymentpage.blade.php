
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
            
                    <div class="col-sm-12 clearfix">
                        <div class="bill-to">
                            <p> Shipping/Bill To</p>
                            <div class="form-one">
                                
                                          
                                <div class="total_area">
                                    <ul>
                                
                                        <li>Payment Status
                                            @if($payment_info['status'] == 'on_hold')

                                                <span>not paid yet</span>

                                            @endif

                                        </li>
                                        <li>Shipping Cost <span>Free</span></li>
                                        <li>Total <span>{{$payment_info['price']}}</span></li>
                                    </ul>
                                    <a class="btn btn-default update" href="">Update</a>
                                    <a class="btn btn-default check_out" href="" >Pay Now</a>
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












{{--<script src="https://www.paypalobjects.com/api/checkout.js"></script>--}}
{{--<script>--}}
  {{--paypal.Button.render({--}}
    {{--// Configure environment--}}
    {{--env: 'sandbox',--}}
    {{--client: {--}}
      {{--sandbox: 'YOUR_SANDBOX_CLIENT_ID',--}}
      {{--production: 'YOUR_PRODUCTION_CLIENT_ID'--}}
    {{--},--}}
    {{--// Customize button (optional)--}}
    {{--locale: 'en_US',--}}
    {{--style: {--}}
      {{--size: 'small',--}}
      {{--color: 'gold',--}}
      {{--shape: 'pill',--}}
    {{--},--}}

    {{--// Enable Pay Now checkout flow (optional)--}}
    {{--commit: true,--}}

    {{--// Set up a payment--}}
    {{--payment: function(data, actions) {--}}
      {{--return actions.payment.create({--}}
        {{--transactions: [{--}}
          {{--amount: {--}}
            {{--total: "{{$payment_info['price']}}",--}}
            {{--currency: 'USD'--}}
          {{--}--}}
        {{--}]--}}
      {{--});--}}
    {{--},--}}
    {{--// Execute the payment--}}
    {{--onAuthorize: function(data, actions) {--}}
      {{--return actions.payment.execute().then(function() {--}}
        {{--// Show a confirmation message to the buyer--}}
        {{--window.alert('Thank you for your purchase!');--}}

        {{--window.location = './paymentreceipt/'+data.paymentID+'/'+data.payerID;--}}


       {{----}}
      {{--});--}}
    {{--}--}}
  {{--}, '#paypal-button');--}}

{{--</script>--}}


