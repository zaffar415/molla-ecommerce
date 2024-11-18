@extends('layouts.admin')

@section('content')
    <div class="admin-content">
        <div class="container">            
            {{ Form::open(['url' => route('product.store'), 'method' => 'POST', 'role' => 'form', 'files' => true ]) }}
                @include('admin.product-form')
                {!! Form::submit('Create Product', ['class' => 'btn btn-success']) !!}
                
            {{ Form::close() }}    
        </div>
    </div>
@endsection


