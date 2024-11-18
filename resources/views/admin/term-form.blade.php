
@if ($errors)
<div class="text-danger">
    {{ $errors->first() }}
</div>
@endif
{!! Form::hidden('term', strtolower($term_type)) !!}
<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    <div class="input-group">
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Add '.ucwords($term_type).' Name', "id" => 'name' ]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('term-slug', 'Slug') !!}
    <div class="input-group">
        {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Add '.ucwords($term_type).' Slug', 'id' => 'slug', 'required' => true]) !!}
    </div>
</div>