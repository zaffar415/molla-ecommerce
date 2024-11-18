@extends('layouts.default', ['title' => 'Cart'])

@section('content')
    <x-breadcrumb>
        <li class="breadcrumb-item"><a href="{{ route('shop') }}">Shop</a></li>
        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
    </x-breadcrumb>
    
    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        
                        <table class="table table-cart table-mobile">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @if ($cart->count() > 0)
                                    @foreach ($cart as $item)
                                    @php
                                        $colors = [];
                                        $images = (array)json_decode($item->product->images);
                                        foreach ($item->product->terms as $term) {
                                            if ($term->terms->term == 'color') {
                                                $colors[] = $term->terms->id;
                                            }            
                                        }        
                                
                                        $price = $item->product->sale_price ? $item->product->sale_price : $item->product->price;
                                        $total += $item->quantity * $price;
                                    @endphp   

                                    <tr class="product">
                                        <td class="product-col">
                                            <div class="product">
                                                <figure class="product-media">
                                                    <a href="{{ route('product',$item->product->id) }}">
                                                        <img src="/product/{{ $images[$colors[0]][0] }}" alt="Product image">
                                                    </a>
                                                </figure>

                                                <h3 class="product-title">
                                                    <a href="{{ route('product',$item->product->id) }}">{{ $item->product->title }}</a>
                                                </h3><!-- End .product-title -->
                                            </div><!-- End .product -->
                                        </td>
                                        <td class="price-col">${{ $price }}</td>
                                        <td class="quantity-col">
                                            <div class="cart-product-quantity">
                                                <input type="number" class="form-control" value="{{ $item->quantity }}" min="1" max="10" step="1" data-decimals="0" data-id="{{$item->id}}" data-url="{{ route('cart.update', $item->id) }}" required>
                                            </div><!-- End .cart-product-quantity -->
                                        </td>
                                        <td class="total-col">${{ $item->quantity * $price }}</td>
                                        <td class="remove-col"><button class="btn-remove remove-cart" data-url="{{route('cart.destroy',$item->id)}}" data-amount="{{ $item->quantity * $price }}"><i class="icon-close"></i></button></td>
                                    </tr>
                                    @endforeach
                                    
                                @else
                                    <tr> 
                                        <td colspan="5">
                                            0 Items in your cart, Please add some items to check out
                                        </td>
                                    </tr>
                                @endif
                                {{-- <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="assets/images/products/table/product-1.jpg" alt="Product image">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a href="#">Beige knitted elastic runner shoes</a>
                                            </h3><!-- End .product-title -->
                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col">$84.00</td>
                                    <td class="quantity-col">
                                        <div class="cart-product-quantity">
                                            <input type="number" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                        </div><!-- End .cart-product-quantity -->
                                    </td>
                                    <td class="total-col">$84.00</td>
                                    <td class="remove-col"><button class="btn-remove"><i class="icon-close"></i></button></td>
                                </tr>
                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="assets/images/products/table/product-2.jpg" alt="Product image">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a href="#">Blue utility pinafore denim dress</a>
                                            </h3><!-- End .product-title -->
                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col">$76.00</td>
                                    <td class="quantity-col">
                                        <div class="cart-product-quantity">
                                            <input type="number" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                        </div><!-- End .cart-product-quantity -->                                 
                                    </td>
                                    <td class="total-col">$76.00</td>
                                    <td class="remove-col"><button class="btn-remove"><i class="icon-close"></i></button></td>
                                </tr> --}}
                            </tbody>
                        </table><!-- End .table table-wishlist -->

                        <div class="cart-bottom">
                            <div class="cart-discount">
                                <form action="#">
                                    <div class="input-group">
                                        <input type="text" class="form-control" required placeholder="coupon code">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
                                        </div><!-- .End .input-group-append -->
                                    </div><!-- End .input-group -->
                                </form>
                            </div><!-- End .cart-discount -->

                            {{-- <a href="#" id="update-cart" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></a> --}}
                        </div><!-- End .cart-bottom -->
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <tbody>
                                    <tr class="summary-subtotal">
                                        <td>Subtotal:</td>
                                        <td>${{$total}}</td>
                                    </tr><!-- End .summary-subtotal -->
                                    <tr class="summary-shipping">
                                        <td>Shipping:</td>
                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                {{-- <input type="radio" id="free-shipping" name="shipping" class="custom-control-input"> --}}
                                                {{-- <label class="custom-control-label" for="free-shipping">Free Shipping</label> --}}
                                                <span>Free Shipping</span>
                                            </div><!-- End .custom-control -->
                                        </td>                                        
                                        <td></td>
                                    </tr><!-- End .summary-shipping-row -->

                                    {{-- <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="standart-shipping" name="shipping" class="custom-control-input">
                                                <label class="custom-control-label" for="standart-shipping">Standart:</label>
                                            </div><!-- End .custom-control -->
                                        </td>
                                        <td>$10.00</td>
                                    </tr><!-- End .summary-shipping-row -->

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="express-shipping" name="shipping" class="custom-control-input">
                                                <label class="custom-control-label" for="express-shipping">Express:</label>
                                            </div><!-- End .custom-control -->
                                        </td>
                                        <td>$20.00</td>
                                    </tr><!-- End .summary-shipping-row --> --}}

                                    <tr class="summary-shipping-estimate">
                                        <td>Estimate for Your Country<br> <a href="dashboard.html">Change address</a></td>
                                        <td>&nbsp;</td>
                                    </tr><!-- End .summary-shipping-estimate -->

                                    <tr class="summary-total">
                                        <td>Total:</td>
                                        <td>${{$total}}</td>
                                    </tr><!-- End .summary-total -->
                                </tbody>
                            </table><!-- End .table table-summary -->

                            <a href="{{ route('checkout') }}" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
                        </div><!-- End .summary -->

                        <a href="{{ route('shop') }}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->

@endsection