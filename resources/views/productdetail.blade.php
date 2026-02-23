<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>{{ $product->name }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    font-family: 'Segoe UI', sans-serif;
    background: #fafafa;
}

.product-wrapper {
    padding: 80px 0;
}

.product-image-main {
    width: 100%;
    height: 600px;
    object-fit: cover;
}

.thumbnail {
    width: 90px;
    height: 110px;
    object-fit: cover;
    cursor: pointer;
    border: 1px solid #ddd;
    transition: 0.3s;
}

.thumbnail:hover {
    border-color: #000;
}

.price-old {
    text-decoration: line-through;
    color: #999;
}

.price-new {
    font-size: 28px;
    font-weight: 600;
}

/* COLOR */
.color-option {
    display: inline-block;
    cursor: pointer;
}

.color-circle {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    border: 2px solid transparent;
    display: inline-block;
    transition: 0.3s;
}

.color-option input:checked + .color-circle {
    border: 2px solid #000;
    transform: scale(1.1);
}

/* SIZE */
.size-option {
    display: inline-block;
    cursor: pointer;
}

.size-box {
    border: 1px solid #ddd;
    padding: 6px 16px;
    font-size: 14px;
    transition: 0.3s;
}

.size-option input:checked + .size-box {
    background: #000;
    color: #fff;
    border-color: #000;
}

/* GENERIC ATTRIBUTE */
.generic-option {
    display: inline-block;
    cursor: pointer;
}

.generic-box {
    border: 1px solid #ddd;
    padding: 6px 14px;
    font-size: 14px;
    transition: 0.3s;
}

.generic-option input:checked + .generic-box {
    background: #000;
    color: #fff;
    border-color: #000;
}

.btn-cart {
    background: #000;
    color: #fff;
    padding: 12px 30px;
    border: none;
}

.btn-buy {
    border: 1px solid #000;
    padding: 12px 30px;
    background: transparent;
}

@media(max-width: 768px){
    .product-image-main {
        height: 400px;
    }
}
</style>
</head>

<body>
    <header>
        <a href="{{ route(name: 'cart.index') }}">
Cart (<span id="cartCount">0</span>)
</a>
    </header>

<div class="container product-wrapper">

    <div class="row">

        <!-- LEFT SIDE IMAGES -->
        <div class="col-md-6">

            @if($product->images->first())
                <img id="mainImage"
                     src="{{ asset('storage/'.$product->images->first()->image) }}"
                     class="product-image-main mb-3">
            @endif

            <div class="d-flex gap-2 flex-wrap">
                @foreach($product->images as $image)
                    <img src="{{ asset('storage/'.$image->image) }}"
                         class="thumbnail"
                         onclick="changeImage(this)">
                @endforeach
            </div>

        </div>

        <!-- RIGHT SIDE DETAILS -->
        <div class="col-md-6">

            <h2 class="mb-3">{{ $product->name }}</h2>

            <!-- Price -->
            <div class="mb-4">
                @if($product->discount_price)
                    <span class="price-old">
                        RS {{ number_format($product->original_price,2) }}
                    </span>
                    <span class="price-new ms-3">
                        RS {{ number_format($product->discount_price,2) }}
                    </span>
                @else
                    <span class="price-new">
                        RS {{ number_format($product->original_price,2) }}
                    </span>
                @endif
            </div>

            <p class="text-muted">
                {{ $product->description }}
            </p>
<form id="cartForm">
    @csrf

    <input type="hidden" name="product_id" value="{{ $product->id }}">

    @php
        $grouped = $product->attributeValues
            ->groupBy(fn($item)=>$item->attribute->name ?? '');
    @endphp

    @foreach($grouped as $attributeName => $values)

        <div class="mb-4">
            <strong>{{ $attributeName }}:</strong>

            <div class="mt-2 d-flex gap-2 flex-wrap">

                @foreach($values as $value)

                    @if(strtolower($attributeName) == 'color')

                        <label class="color-option">
                            <input type="radio"
                                   name="color"
                                   value="{{ $value->value }}"
                                   hidden>
                            <span class="color-circle"
                                  style="background: {{ strtolower($value->value) }}"></span>
                        </label>

                    @elseif(strtolower($attributeName) == 'size')

                        <label class="size-option">
                            <input type="radio"
                                   name="size"
                                   value="{{ $value->value }}"
                                   hidden>
                            <span class="size-box">
                                {{ $value->value }}
                            </span>
                        </label>

                    @else

                        <label class="generic-option">
                            <input type="radio"
                                   name="{{ strtolower($attributeName) }}"
                                   value="{{ $value->value }}"
                                   hidden>
                            <span class="generic-box">
                                {{ $value->value }}
                            </span>
                        </label>

                    @endif

                @endforeach

            </div>
        </div>

    @endforeach

    <div class="mt-4 d-flex gap-3">
      <button type="button" id="addToCartBtn">Add To Cart</button>
        <button type="submit" class="btn-buy">
            Buy Now
        </button>
    </div>
</form>

        </div>

    </div>

</div>
<script>
function changeImage(el){
    document.getElementById('mainImage').src = el.src;
}

// Wait until DOM loads
document.addEventListener("DOMContentLoaded", function(){

    const btn = document.getElementById("addToCartBtn");

    if(btn){
        btn.addEventListener("click", function(){

            fetch("{{ route('cart.add', $product->id) }}",{
                method:"POST",
                headers:{
                    "X-CSRF-TOKEN":"{{ csrf_token() }}",
                    "Content-Type":"application/json",
                    "Accept":"application/json"
                },
                body:JSON.stringify({
                    color:document.querySelector("input[name='color']:checked")?.value ?? null,
                    size:document.querySelector("input[name='size']:checked")?.value ?? null
                })
            })
            .then(res => {
                if(!res.ok){
                    throw new Error("Request failed");
                }
                return res.json();
            })
            .then(data=>{
                if(data.success){
                    alert("Added to cart successfully");
                    loadCartCount();
                } else {
                    alert("Something went wrong");
                }
            })
            .catch(error=>{
                console.error("Error:", error);
                alert("Error adding to cart");
            });

        });
    }

    // Load cart count on page load
    loadCartCount();

});

function loadCartCount(){
    fetch("{{ route('cart.count') }}")
    .then(res => res.json())
    .then(data => {
        const counter = document.getElementById("cartCount");
        if(counter){
            counter.innerText = data;
        }
    })
    .catch(err => console.error(err));
}
</script>

</body>
</html>