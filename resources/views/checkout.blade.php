@extends('layouts.default', ['title' => 'Checkout'])

@section('content')

    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="{{route('shop')}}">Shop</a></li>
        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
    </x-breadcrumb>

    <div class="page-content">
        <div class="checkout">
            <div class="container">
                <div class="checkout-discount">
                    <form action="#">
                        <input type="text" class="form-control" required id="checkout-discount-input">
                        <label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter your code</span></label>
                    </form>
                </div><!-- End .checkout-discount -->
                {!! Form::open(['url' => route('order.create'), 'method' => 'post', 'role' => 'form']) !!}
                    <div class="row">
                        <div class="col-lg-9">
                            <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        {!! Form::label('first-name', 'First Name *') !!}
                                        {!! Form::text('first_name', null, ['class' => 'form-control', 'id' => 'first-name', 'required' => 'true']) !!}                                            
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        {!! Form::label('last-name', 'Last Name *') !!}
                                        {!! Form::text('last_name', null, ['class' => 'form-control', 'id' => 'last-name', 'required' => 'true']) !!}                                            
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                {!! Form::label('address', "Address *") !!}                                
                                {!! Form::text('address', null, ['class' => 'form-control', 'id' => 'address', 'placeholder' => 'House Number and Street name', 'required' => true]) !!}                                
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        {!! Form::label('city', 'City / Town *') !!}
                                        {!! Form::text('city', null, ['class' => 'form-control', 'id' => 'city', 'required' => true]) !!}                                       
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        {!! Form::label('state', 'State *') !!}                                        
                                        {!! Form::text('state', null, ['class' => 'form-control', 'id' => 'state', 'required' => true]) !!}                                        
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                {!! Form::label('country', 'Country *') !!}
                                {!! Form::text('country', null, ['class' => 'form-control', 'id' => 'country', 'required' => true]) !!}                                


                                <div class="row">
                                    <div class="col-sm-6">
                                        {!! Form::label('pincode', 'Postcode / Zip *') !!}
                                        {!! Form::text('pincode', null, ['class' => 'form-control', 'id' => 'pincode', 'required' => true]) !!}                                        
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        {!! Form::label('phone', 'Phone *') !!}                                        
                                        {!! Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone', 'required' => true]) !!}                                        
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->                                   

                                {!! Form::label('notes', 'Order notes (optional)') !!}
                                {!! Form::textarea('notes', null, ['class' => 'form-control', 'placeholder' => 'Notes about your order, e.g. special notes for delivery']) !!}                                
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
                            <div class="summary">
                                <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td><a href="#">Beige knitted elastic runner shoes</a></td>
                                            <td>$84.00</td>
                                        </tr>

                                        <tr>
                                            <td><a href="#">Blue utility pinafore denimdress</a></td>
                                            <td>$76,00</td>
                                        </tr>
                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>$160.00</td>
                                        </tr><!-- End .summary-subtotal -->
                                        <tr>
                                            <td>Shipping:</td>
                                            <td>Free shipping</td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>$160.00</td>
                                        </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <div class="accordion-summary" id="accordion-payment">
                                    <div class="card">
                                        <div class="card-header" id="heading-1">
                                            <h2 class="card-title">
                                                <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                                    Direct bank transfer
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-payment">
                                            <div class="card-body">
                                                Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->

                                    <div class="card">
                                        <div class="card-header" id="heading-2">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                                    Check payments
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-payment">
                                            <div class="card-body">
                                                Ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. 
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->

                                    <div class="card">
                                        <div class="card-header" id="heading-3">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                                    Cash on delivery
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">
                                            <div class="card-body">Quisque volutpat mattis eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. 
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->

                                    <div class="card">
                                        <div class="card-header" id="heading-4">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                                    PayPal <small class="float-right paypal-link">What is PayPal?</small>
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-4" class="collapse" aria-labelledby="heading-4" data-parent="#accordion-payment">
                                            <div class="card-body">
                                                Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum.
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->

                                    <div class="card">
                                        <div class="card-header" id="heading-5">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
                                                    Credit Card (Stripe)
                                                    <img src="assets/images/payments-summary.png" alt="payments cards">
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordion-payment">
                                            <div class="card-body"> Donec nec justo eget felis facilisis fermentum.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Lorem ipsum dolor sit ame.
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->
                                </div><!-- End .accordion -->

                                <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="btn-text">Place Order</span>
                                    <span class="btn-hover-text">Proceed to Checkout</span>
                                </button>
                            </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                {!! Form::close() !!}
            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->

@endsection