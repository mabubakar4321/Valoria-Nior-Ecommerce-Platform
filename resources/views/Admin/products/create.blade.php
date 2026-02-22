@extends('Admin.Dashbaord.layout')

@section('content')
<div class="main-content">

<div class="card shadow-lg border-0">
    <div class="card-header bg-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">Create Product</h4>
        <a href="{{ route('admin.products.index') }}" class="btn btn-light">
            ← Back
        </a>
    </div>

    <div class="card-body">

<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="row">

    {{-- LEFT SIDE --}}
    <div class="col-md-8">

        {{-- Product Name --}}
        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text"
                   name="name"
                   class="form-control"
                   placeholder="Enter product name">
        </div>

        {{-- Category --}}
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-select">
                <option value="">Select Category</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">
                        {{ $cat->title }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description"
                      rows="4"
                      class="form-control"
                      placeholder="Enter product description"></textarea>
        </div>

        {{-- Attributes Section --}}
        <div class="card mt-4 border">
            <div class="card-header bg-light">
                <strong>Select Attributes</strong>
            </div>
            <div class="card-body">

                @foreach($attributes as $attribute)
                    <div class="mb-3">
                        <label class="fw-semibold">
                            {{ $attribute->name }}
                        </label>

                        <div class="mt-2 d-flex flex-wrap gap-3">
                            @foreach($attribute->values as $value)
                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           name="attribute_values[{{ $attribute->id }}][]"
                                           value="{{ $value->id }}"
                                           id="value{{ $value->id }}">
                                    <label class="form-check-label"
                                           for="value{{ $value->id }}">
                                        {{ $value->value }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>

    {{-- RIGHT SIDE --}}
    <div class="col-md-4">

        {{-- Product Type --}}
        <div class="mb-3">
            <label class="form-label">Product Type</label>
            <input type="text"
                   name="product_type"
                   class="form-control"
                   placeholder="e.g. Kurta Trouser">
        </div>

        {{-- Price Row --}}
        <div class="row">
            <div class="col-6 mb-3">
                <label class="form-label">Original Price</label>
                <input type="number"
                       step="0.01"
                       name="original_price"
                       class="form-control"
                       placeholder="0.00">
            </div>

            <div class="col-6 mb-3">
                <label class="form-label">Discount Price</label>
                <input type="number"
                       step="0.01"
                       name="discount_price"
                       class="form-control"
                       placeholder="Optional">
            </div>
        </div>

        {{-- SKU --}}
        <div class="mb-3">
            <label class="form-label">SKU Code</label>
            <input type="text"
                   name="sku"
                   class="form-control"
                   placeholder="Enter SKU">
        </div>

        {{-- Quantity --}}
        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="number"
                   name="quantity"
                   class="form-control"
                   placeholder="0">
        </div>

        {{-- Image Upload --}}
        <div class="mb-3">
            <label class="form-label">Upload Images</label>
            <input type="file"
                   name="images[]"
                   multiple
                   class="form-control">
            <small class="text-muted">
                You can upload multiple images
            </small>
        </div>

        {{-- Submit Button --}}
        <div class="d-grid mt-4">
            <button type="submit" class="btn btn-primary btn-lg">
                Save Product
            </button>
        </div>

    </div>

</div>

</form>

    </div>
</div>

</div>
