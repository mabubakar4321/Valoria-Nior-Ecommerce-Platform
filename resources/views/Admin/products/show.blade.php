@extends('Admin.Dashbaord.layout')

@section('content')
<div class="main-content">

<div class="card shadow-lg border-0 p-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h5 class="mb-0 text-muted">Product Details</h5>
        </div>

        <div>
            <a href="{{ route('admin.products.index') }}"
               class="btn btn-light border rounded-pill px-4">
                ← Back to Products
            </a>
        </div>

    </div>

    <div class="row">

        {{-- LEFT : IMAGE SECTION --}}
        <div class="col-md-6">

            <div class="product-image-wrapper text-center mb-3">
                @if($product->images->first())
                    <img id="mainImage"
                         src="{{ asset('storage/'.$product->images->first()->image) }}"
                         class="img-fluid rounded"
                         style="max-height:500px; object-fit:contain;">
                @endif
            </div>

            {{-- Thumbnails --}}
            <div class="d-flex gap-2 justify-content-center">
                @foreach($product->images as $image)
                    <img src="{{ asset('storage/'.$image->image) }}"
                         width="90"
                         height="90"
                         class="border rounded p-1 thumb-img"
                         style="object-fit:cover; cursor:pointer;"
                         onclick="changeImage(this)">
                @endforeach
            </div>

        </div>

        {{-- RIGHT : DETAILS --}}
        <div class="col-md-6">

            <h2 class="fw-bold mb-2">{{ $product->name }}</h2>
            <div class="text-muted mb-3">SKU: {{ $product->sku ?? '-' }}</div>

            {{-- Category --}}
            <div class="mb-3">
                <span class="badge bg-dark px-3 py-2">
                    {{ $product->category->title ?? '-' }}
                </span>
            </div>

            {{-- Price --}}
            <div class="mb-4">
                @if($product->discount_price)
                    <span class="text-muted text-decoration-line-through fs-5">
                        {{ number_format($product->original_price,2) }}
                    </span>
                    <span class="fs-3 fw-bold text-success ms-3">
                        {{ number_format($product->discount_price,2) }}
                    </span>
                @else
                    <span class="fs-3 fw-bold">
                        {{ number_format($product->original_price,2) }}
                    </span>
                @endif
            </div>

            {{-- Stock --}}
            <div class="mb-4">
                @if($product->quantity > 0)
                    <span class="badge bg-success px-3 py-2">
                        {{ $product->quantity }} Available
                    </span>
                @else
                    <span class="badge bg-danger px-3 py-2">
                        Out of Stock
                    </span>
                @endif
            </div>

            {{-- Description --}}
            <div class="mb-4">
                <h6 class="fw-semibold">Description</h6>
                <p class="text-muted">
                    {{ $product->description ?? '-' }}
                </p>
            </div>

            {{-- ATTRIBUTES SECTION --}}
            @php
                $grouped = $product->attributeValues->groupBy(function($item){
                    return $item->attribute->name ?? '';
                });
            @endphp

            @foreach($grouped as $attributeName => $values)

                <div class="mb-4">
                    <h6 class="fw-semibold">{{ $attributeName }}</h6>

                    {{-- COLOR SWATCH --}}
                    @if(strtolower($attributeName) == 'color')
                        <div class="d-flex gap-3 mt-2">
                            @foreach($values as $value)
                                <div style="
                                    width:32px;
                                    height:32px;
                                    border-radius:50%;
                                    background: {{ strtolower($value->value) }};
                                    border:1px solid #ddd;
                                    box-shadow:0 2px 5px rgba(0,0,0,0.1);
                                " title="{{ $value->value }}"></div>
                            @endforeach
                        </div>

                    {{-- SIZE STYLE --}}
                    @elseif(strtolower($attributeName) == 'size')
                        <div class="d-flex gap-2 mt-2">
                            @foreach($values as $value)
                                <span class="border px-3 py-1 rounded-pill fw-semibold">
                                    {{ $value->value }}
                                </span>
                            @endforeach
                        </div>

                    {{-- OTHER ATTRIBUTES --}}
                    @else
                        <div class="d-flex flex-wrap gap-2 mt-2">
                            @foreach($values as $value)
                                <span class="badge bg-light text-dark border px-3 py-2">
                                    {{ $value->value }}
                                </span>
                            @endforeach
                        </div>
                    @endif

                </div>

            @endforeach

        </div>

    </div>

</div>

</div>

<script>
function changeImage(element){
    document.getElementById('mainImage').src = element.src;
}
</script>

