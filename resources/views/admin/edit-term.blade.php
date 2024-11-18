@extends('layouts.admin')

@section('content')
    <div class="admin-content">
        <div class="container">
            
            {!! Form::model($term,['url' => route('category.update', $term->id), 'method' => 'PUT']) !!}
                @include('admin.term-form')
                {!! Form::submit('Update '.ucwords($term_type), ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}                                    
        </div>
    </div>
@endsection


