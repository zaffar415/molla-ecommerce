@extends('layouts.admin')

@section('content')
    <div class="admin-content">
        <div class="container">
            
            {!! Form::open(['url' => route('category.store'), 'method' => 'POST']) !!}
                @include('admin.term-form')
                {!! Form::submit('Add '.ucwords($term_type), ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}                    
        </div>            
    </div>
@endsection


