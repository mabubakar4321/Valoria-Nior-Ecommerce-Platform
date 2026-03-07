@extends('frontedlayout.main')

@section('code')

<div class="container my-orders-page">

<div class="row justify-content-center">

<div class="col-lg-10">

<h3 class="mb-4 fw-bold">My Orders</h3>

<div class="table-responsive">

<table class="table table-hover align-middle">

<thead class="table-dark">

<tr>
<th>Order ID</th>
<th>Date</th>
<th>Total</th>
<th>Status</th>
<th>Invoice</th>
</tr>

</thead>

<tbody>

@foreach($orders as $order)

<tr>

<td class="fw-semibold">#{{ $order->id }}</td>

<td>{{ $order->created_at->format('d M Y') }}</td>

<td>Rs {{ $order->total_amount }}</td>

<td>

<span class="badge bg-secondary">
{{ $order->status }}
</span>

</td>

<td>

<a href="{{ route('download.invoice',$order->id) }}"
class="btn btn-sm btn-dark">

Download PDF

</a>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

</div>

</div>

@endsection