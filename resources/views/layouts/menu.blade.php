<li class="{{ Request::is('productCategories*') ? 'active' : '' }}">
    <a href="{!! route('productCategories.index') !!}"><i class="fa fa-edit"></i><span>Product Categories</span></a>
</li>

<li class="{{ Request::is('dealTypes*') ? 'active' : '' }}">
    <a href="{!! route('dealTypes.index') !!}"><i class="fa fa-edit"></i><span>Deal Types</span></a>
</li>

<li class="{{ Request::is('stores*') ? 'active' : '' }}">
    <a href="{!! route('stores.index') !!}"><i class="fa fa-edit"></i><span>Stores</span></a>
</li>

<li class="{{ Request::is('products*') ? 'active' : '' }}">
    <a href="{!! route('products.index') !!}"><i class="fa fa-edit"></i><span>Products</span></a>
</li>


