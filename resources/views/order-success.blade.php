@extends('frontedlayout.main')

@section('code')

<div class="container order-success-page">

<div class="row justify-content-center">

<div class="col-lg-6 col-md-8">

<div class="success-box text-center">

<h2 class="mb-3">Order Placed Successfully 🎉</h2>

<p class="mb-2">Your Order ID:</p>

<h4 class="order-id mb-4">#{{ $order->id }}</h4>

<a href="{{ route('my.orders') }}" class="btn btn-dark px-4 py-2">
View My Orders
</a>

</div>

</div>

</div>

</div>

@endsection