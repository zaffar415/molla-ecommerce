<div class="product product-7 text-center">
    <figure class="product-media">
        <span class="product-label label-new">New</span>
        <a href="/product/{{$product->id}}">
            @php
            $colors = [];
            $images = (array)json_decode($product->images);
            foreach ($product->terms as $term) {
                if ($term->terms->term == 'color') {
                    $colors[] = $term->terms->id;
                }            
            }            
            @endphp
            <img src="/product/{{ $images[$colors[0]][0] }}" alt="Product image" class="product-image">
        </a>

        <div class="product-action-vertical">
            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
            <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
        </div><!-- End .product-action-vertical -->

        <div class="product-action">
            {!! Form::open(['url' => route('cart.store'), 'method' => 'POST', 'role' => 'form', "id" => 'add-to-cart-'.$product->id]) !!}
                {!! Form::hidden('product_id', $product->id) !!}            
                {!! Form::hidden('quantity', 1) !!}
            {!! Form::close() !!}
            <a href="#" onclick="$('#add-to-cart-{{$product->id}}').submit(); return false;  " class="btn-product btn-cart"><span>add to cart</span></a>
        </div><!-- End .product-action -->
    </figure><!-- End .product-media -->

    <div class="product-body">
        <div class="product-cat">
            @foreach ($product->terms as $term)
                @if ($term->terms->term == 'category')
                    <a href="/category/{{$term->terms->slug}}">{{ $term->terms->name }} &nbsp;</a>                                                                                                
                @endif
            @endforeach                                    
            {{-- <a href="#">Women</a> --}}
        </div><!-- End .product-cat -->
        <h3 class="product-title"><a href="/product/{{$product->id}}">{{$product->title}}</a></h3><!-- End .product-title -->
        <div class="product-price">
            ${{$product->sale_price ? $product->sale_price : $product->price}}
        </div><!-- End .product-price -->
        <div class="ratings-container">
            <div class="ratings">
                <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
            </div><!-- End .ratings -->
            <span class="ratings-text">( 2 Reviews )</span>
        </div><!-- End .rating-container -->

        <div class="product-nav product-nav-thumbs">
            @foreach ($colors as $index=>$color)
                <a href="/product/{{ $images[$color][0] }}" {{ $index == 0 ? 'class="active"' : '' }}>
                    <img src="/product/{{ $images[$color][0] }}" alt="product desc">
                </a>                                
            @endforeach
            {{-- <a href="#">
                <img src="/assets/images/products/product-4-2-thumb.jpg" alt="product desc">
            </a>

            <a href="#">
                <img src="/assets/images/products/product-4-3-thumb.jpg" alt="product desc">
            </a> --}}
        </div><!-- End .product-nav -->
    </div><!-- End .product-body -->
</div><!-- End .product -->    