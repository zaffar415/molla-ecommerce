@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($products as $product)
                <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                    <x-product :product="$product"></x-product>            
                </div>
            @endforeach    
        </div>
        
        {{ $products->links('pagination::bootstrap-4') }}
        
    </div>    
@endsection