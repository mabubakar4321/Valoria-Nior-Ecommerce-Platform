@extends('frontedlayout.main')

@section('code')

<div class="container checkout-page">

<div class="row">

<!-- ================= ORDER ITEMS ================= -->

<div class="col-lg-7">

<h4 class="mb-4">Your Cart</h4>

@foreach(session('cart', []) as $id => $item)

<div class="cart-item d-flex align-items-center mb-4">

    <img src="{{ asset('storage/'.$item['image']) }}" width="70" class="me-3">

    <div class="flex-grow-1">
        <h6>{{ $item['name'] }}</h6>
        <small>SKU: {{ $item['sku'] }}</small>
        <div>Rs {{ $item['price'] }}</div>
    </div>

    <div class="text-end">
        <div>Qty: {{ $item['quantity'] }}</div>
        <div>Rs {{ $item['price'] * $item['quantity'] }}</div>

        <button class="btn btn-sm btn-outline-danger mt-2"
                onclick="removeFromCheckout({{ $id }})">
            Remove
        </button>
    </div>

</div>

<hr>

@endforeach

</div>



<!-- ================= BILLING SECTION ================= -->

<div class="col-lg-5">

<div class="checkout-box">

<h4 class="mb-4">Checkout</h4>

<form action="{{ route('place.order') }}" method="POST">

@csrf

<input type="text"
name="name"
placeholder="Full Name"
class="form-control mb-3"
required>

<input type="email"
name="email"
placeholder="Email"
class="form-control mb-3"
required>

<input type="text"
name="phone"
placeholder="Phone"
class="form-control mb-3"
required>

<textarea
name="address"
placeholder="Shipping Address"
class="form-control mb-3"
required></textarea>


<!-- ================= TOTAL ================= -->

<div class="total-box d-flex justify-content-between mb-3">

<strong>Total</strong>

<strong>Rs {{ $total }}</strong>

</div>

<button type="submit" class="btn btn-dark w-100 py-3">

Place Order

</button>

</form>

</div>

</div>

</div>

</div>

@endsection