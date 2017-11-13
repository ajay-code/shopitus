<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Product Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_category_id', 'Product Category Id:') !!}
    {!! Form::select('product_category_id', $productCategories, isset($product) ? $product->product_category_id : null , ['class' => 'form-control']) !!}
</div>

<!-- Deal Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deal_type_id', 'Deal Type Id:') !!}
    {!! Form::select('deal_type_id', $dealTypes, isset($product) ? $product->deal_type_id : null , ['class' => 'form-control']) !!}
</div>

<!-- Store Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('store_id', 'Store Id:') !!}
    {!! Form::select('store_id', $stores, isset($product) ? $product->store_id : null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image') !!}
</div>
<div class="clearfix"></div>

<!-- Link Field -->
<div class="form-group col-sm-6">
    {!! Form::label('link', 'Link:') !!}
    {!! Form::text('link', null, ['class' => 'form-control']) !!}
</div>

<!-- Text Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('text', 'Text:') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('products.index') !!}" class="btn btn-default">Cancel</a>
</div>
