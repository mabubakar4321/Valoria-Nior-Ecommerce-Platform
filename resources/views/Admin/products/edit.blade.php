@extends('Admin.Dashbaord.layout')

@section('content')
<div class="main-content">
    <form action="{{ route('admin.products.update',$product->id) }}"
      method="POST"
      enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="card shadow">
<div class="card-header">
    <h4>Edit Product</h4>
</div>

<div class="card-body">

<input type="text"
       name="name"
       value="{{ $product->name }}"
       class="form-control mb-2"
       placeholder="Product Name">

<select name="category_id" class="form-control mb-2">
<option value="">Select Category</option>
@foreach($categories as $cat)
<option value="{{ $cat->id }}"
    {{ $product->category_id == $cat->id ? 'selected' : '' }}>
    {{ $cat->title }}
</option>
@endforeach
</select>

<textarea name="description"
          class="form-control mb-2"
          placeholder="Description">{{ $product->description }}</textarea>

<input type="text"
       name="product_type"
       value="{{ $product->product_type }}"
       class="form-control mb-2"
       placeholder="Product Type">

<input type="text"
       name="original_price"
       value="{{ $product->original_price }}"
       class="form-control mb-2"
       placeholder="Original Price">

<input type="text"
       name="discount_price"
       value="{{ $product->discount_price }}"
       class="form-control mb-2"
       placeholder="Discount Price">

<input type="text"
       name="sku"
       value="{{ $product->sku }}"
       class="form-control mb-2"
       placeholder="SKU Code">

<input type="text"
       name="quantity"
       value="{{ $product->quantity }}"
       class="form-control mb-2"
       placeholder="Quantity">

<label>Upload New Images</label>
<input type="file" name="images[]" multiple class="form-control mb-3">

<hr>

<h5>Current Images</h5>
<div class="mb-3">
@foreach($product->images as $image)
    <img src="{{ asset('storage/'.$image->image) }}"
         width="80"
         class="me-2 mb-2">
@endforeach
</div>

<hr>

<h5>Select Attributes</h5>

@php
$selectedValues = $product->attributeValues->pluck('id')->toArray();
@endphp

@foreach($attributes as $attribute)
    <div class="mb-2">
        <label><strong>{{ $attribute->name }}</strong></label>

        <div>
        @foreach($attribute->values as $value)
            <label class="me-2">
                <input type="checkbox"
                       name="attribute_values[{{ $attribute->id }}][]"
                       value="{{ $value->id }}"
                       {{ in_array($value->id,$selectedValues) ? 'checked' : '' }}>
                {{ $value->value }}
            </label>
        @endforeach
        </div>
    </div>
@endforeach

<button class="btn btn-primary mt-3">Update Product</button>

</div>
</div>

</form>
</div>