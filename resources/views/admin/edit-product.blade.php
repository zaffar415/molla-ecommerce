@extends('layouts.admin', ['title' => 'Edit Product'])

@section('content')
    <div class="admin-content">
        <div class="container">                                           
            {{ Form::model($product, ['url' => route('product.update', $product->id), 'method' => 'PUT', 'role' => 'form', 'files' => true ]) }}
                @include('admin.product-form')
                {!! Form::submit('Update Product', ['class' => 'btn btn-success']) !!}
                
            {{ Form::close() }}
                
        </div>
    </div>
@endsection


