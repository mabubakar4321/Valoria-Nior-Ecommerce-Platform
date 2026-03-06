@extends('frontedlayout.main')

@section('code')

<!-- ======== COMMON STATIC BANNER ======== -->
<div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Single Product</h2>
                    <span>Explore our premium eastern wear collection</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5 mb-5">
    <div class="row g-5">

        <!-- ================= IMAGE SECTION ================= -->
        <div class="col-lg-6">

            @if($product->images->count() > 0)

                <!-- Main Image -->
                <div class="mb-3">
                    <img id="mainImage"
                         src="{{ asset('storage/'.$product->images->first()->image) }}"
                         class="img-fluid rounded shadow-sm">
                </div>

                <!-- Thumbnails -->
                <div class="d-flex gap-3 flex-wrap">
                    @foreach($product->images as $image)
                        <img src="{{ asset('storage/'.$image->image) }}"
                             class="product-thumb"
                             onclick="changeImage(this)">
                    @endforeach
                </div>

            @endif

        </div>


        <!-- ================= DETAILS SECTION ================= -->
        <div class="col-lg-6">

            <h2 class="fw-bold mb-2">{{ $product->name }}</h2>

            <p class="text-muted mb-2">SKU: {{ $product->sku }}</p>

            <span class="badge bg-secondary mb-3 px-3 py-2">
                {{ $product->category->title }}
            </span>

            <!-- Price Section -->
            <div class="mb-3">
                <span class="original-price">
                    Rs {{ $product->original_price }}
                </span>

                <span class="discount-price ms-3">
                    Rs {{ $product->discount_price }}
                </span>
            </div>

            <!-- Availability -->
            @if($product->quantity > 0)
                <p class="in-stock">In Stock ({{ $product->quantity }} available)</p>
            @else
                <p class="out-stock">Out of Stock</p>
            @endif

            <hr>

            <p class="product-description">
                {{ $product->description }}
            </p>

            <!-- ================= ATTRIBUTES ================= -->
            <form action="#" method="POST">
                @csrf

                @foreach($groupedAttributes as $attributeName => $values)

                    <h6 class="attribute-title">{{ $attributeName }}</h6>

                    <div class="d-flex flex-wrap gap-3 mb-3">

                        @foreach($values as $value)

                            @if(strtolower($attributeName) == 'color')

                                <label class="color-option">
                                    <input type="checkbox"
                                           name="attributes[{{ strtolower($attributeName) }}][]"
                                           value="{{ $value->id }}">
                                    <span style="background: {{ $value->value }}"></span>
                                </label>

                            @else

                                <label class="attribute-option">
                                    <input type="checkbox"
                                           name="attributes[{{ strtolower($attributeName) }}][]"
                                           value="{{ $value->id }}">
                                    <span>{{ $value->value }}</span>
                                </label>

                            @endif

                        @endforeach

                    </div>

                @endforeach


                <!-- ================= QUANTITY ================= -->
              <!-- Quantity -->
<div class="quantity-wrapper mb-4">
    <button type="button" onclick="decreaseQty()" class="qty-btn">-</button>

    <input type="text" name="quantity" id="quantity" value="1" class="qty-input">

    <button type="button" onclick="increaseQty()" class="qty-btn">+</button>
</div>


<!-- ACTION BUTTONS -->
<div class="product-action-buttons">

    <button type="button" onclick="addToCart({{ $product->id }})" class="btn btn-dark action-btn">
        Add To Cart
    </button>

    <button type="submit" class="btn btn-outline-dark action-btn">
        Buy Now
    </button>

    <button type="button"
        class="btn btn-outline-danger action-btn"
        onclick="addToFavourite({{ $product->id }})">
        ❤ Add to Favourite
    </button>

</div>

            </form>

        </div>
    </div>
</div>


<!-- ================= STYLING ================= -->
<style>

.product-thumb {
    width: 80px;
    height: 80px;
    border-radius: 10px;
    cursor: pointer;
    object-fit: cover;
    border: 2px solid transparent;
    transition: 0.3s;
}

.product-thumb:hover {
    border-color: #000;
    transform: scale(1.05);
}

.original-price {
    text-decoration: line-through;
    color: #999;
    font-size: 16px;
}

.discount-price {
    font-size: 22px;
    font-weight: bold;
    color: #000;
}

.in-stock {
    color: green;
    font-weight: 500;
}

.out-stock {
    color: red;
    font-weight: 500;
}

.product-description {
    color: #555;
    line-height: 1.6;
}

.attribute-title {
    font-weight: 600;
    margin-bottom: 10px;
}

.attribute-option input,
.color-option input {
    display: none;
}

.attribute-option span {
    border: 1px solid #ddd;
    padding: 8px 18px;
    border-radius: 30px;
    cursor: pointer;
    transition: 0.3s;
}

.attribute-option input:checked + span {
    background: #000;
    color: #fff;
}

.color-option span {
    display: inline-block;
    width: 28px;
    height: 28px;
    border-radius: 50%;
    border: 2px solid #ccc;
    cursor: pointer;
    transition: 0.3s;
}

.color-option input:checked + span {
    border: 3px solid #000;
}

/* Quantity */

.quantity-wrapper{
    display:flex;
    align-items:center;
    width:130px;
    border:1px solid #ddd;
    border-radius:6px;
    overflow:hidden;
}

.qty-btn{
    width:40px;
    height:40px;
    border:none;
    background:#f8f8f8;
    font-size:18px;
    cursor:pointer;
}

.qty-btn:hover{
    background:#eee;
}

.qty-input{
    width:50px;
    text-align:center;
    border:none;
    font-size:16px;
}


/* Button Layout */

.product-action-buttons{
    display:flex;
    gap:12px;
    flex-wrap:wrap;
}

.action-btn{
    padding:10px 22px;
    border-radius:6px;
    font-weight:500;
}


/* Remove hover color change */

.btn-dark:hover{
    background:#212529 !important;
    color:white !important;
}


/* Favourite Button Style */

.btn-outline-dark{
    border:1px solid #ccc;
}

.btn-outline-dark:hover{
    background:#f5f5f5;
    color:#000;
}

</style>


<!-- ================= SCRIPTS ================= -->
<script>

function changeImage(element) {
    document.getElementById("mainImage").src = element.src;
}

function increaseQty() {
    let qty = document.getElementById("quantity");
    qty.value = parseInt(qty.value) + 1;
}

function decreaseQty() {
    let qty = document.getElementById("quantity");
    if (qty.value > 1) {
        qty.value = parseInt(qty.value) - 1;
    }
}

</script>

@endsection