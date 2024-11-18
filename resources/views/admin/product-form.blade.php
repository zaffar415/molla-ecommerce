
@if ($errors)
    <div class="text-danger">
        {{ $errors->first() }}
    </div>
@endif

<div class="form-group">
    {{ Form::label('name', 'Title') }}
    <div class="input-group">
        {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Product Title', 'id' => 'name']) }}
    </div>
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    <div class="input-group">
        {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Add Slug', 'id' => 'slug', 'required' => true]) !!}
    </div>
</div>
<div class="form-group">
    {{ Form::label('small_description', 'Description') }}
    <div class="input-group">
        {{ Form::text('small_description', null, ['class' => 'form-control', 'placeholder' => 'Product Short Description']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('description', 'Content') }}
    <div class="input-group">
        {{ Form::textarea('description', null, ['data-msg' => 'Please write Description', 'class' => 'form-control', 'id'=>"summernote-description", 'rows' => 10]) }}        
    </div>
</div>
<div class="form-group">
    {{ Form::label('additional_information', 'Additional Information') }}
    <div class="input-group">
        {{ Form::textarea('additional_information', null, ['class' => 'form-control summernote', 'data-msg' => 'Additional Information', 'id'=>"summernote-add-info"]) }}
    </div>
</div>
<div class="form-group">
    {!! Form::label('category', 'Category') !!}
    <div class="input-group">        
        @if (isset($product) && isset($selected_terms))
        {!! Form::select('category[]', $category, $selected_terms, ['class' => 'form-control select2', 'id' => 'category', 'multiple' => true]) !!}    
        @else
        {!! Form::select('category[]', $category, null, ['class' => 'form-control select2', 'id' => 'category', 'multiple' => true]) !!}
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('sizes', 'Select Available Sizes') !!}
    <div class="input-group">        
        @if (isset($product) && isset($selected_terms))
        {!! Form::select('sizes[]', $sizes, $selected_terms, ['class' => 'form-control select2', 'id' => 'sizes', 'multiple' => true]) !!}    
        @else
        {!! Form::select('sizes[]', $sizes, null, ['class' => 'form-control select2', 'id' => 'sizes', 'multiple' => true]) !!}
        @endif
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="form-group">
            {{ Form::label('price', 'Price') }}
            <div class="input-group">
                {{ Form::text('price', null, ['class' => 'form-control', 'placeholder' => 'Price']) }}
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            {{ Form::label('sale_price', 'Sale Price') }}
            <div class="input-group">
                {{ Form::text('sale_price', null, ['class' => 'form-control', 'placeholder' => 'Sale Price']) }}
            </div>
        </div>
    </div>
</div>

<div class="input-colors-container">
    @if (isset($product) && isset($selected_terms)) 
        @php $i = 0; @endphp
        @foreach ($product->terms as $index=>$term) 
            @if ($term->terms->term == 'color')
                <div class="color-{{ $i }}">
                    @if ($i > 0)
                        <a href="#" class="btn btn-danger remove-color float-right">Remove Color</a>                    
                    @endif                    
                    <div class="form-group">
                        <div class="form-group">
                            {!! Form::label('color', 'Select Color') !!}
                            <div class="input-group">        
                                {!! Form::select('color[]', $color, $term->terms->id, ['class' => "form-control product-color select2", 'id' => 'color']) !!}      
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('image', 'Product Images') !!}
                        <div class="input-group">
                            {!! Form::file("images[$i][]", ['multiple' => true, 'accept' => 'image/*', 'class'=> 'form-control product-images', 'id' => 'image']) !!}
                        </div>
                    </div>                
                </div>
                @php $i++; @endphp
            @endif    
        @endforeach
    @else 
    <div class="color-0">
        <div class="form-group">
            <div class="form-group">
                {!! Form::label('color', 'Select Color') !!}
                <div class="input-group">                        
                    {!! Form::select('color[]', $color, null, ['class' => 'form-control product-color', 'id' => 'color']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('image', 'Product Images') !!}
            <div class="input-group">
                {!! Form::file('images[0][]', ['multiple' => true, 'accept' => 'image/*', 'class'=> 'form-control product-images', 'id' => 'image']) !!}
            </div>
        </div>    
    </div>
    @endif
</div>

<button id="add-color" class="btn btn-dark">
    Add More Colors    
</button>