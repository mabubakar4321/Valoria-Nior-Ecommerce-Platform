@extends('Admin.Dashbaord.layout')

@section('content')

<div class="main-content">

<div class="container-fluid">

<h3 class="mb-4">Customer Orders</h3>

<!-- SEARCH + FILTER -->

<form method="GET" class="row mb-4">

<div class="col-md-4">
<input type="text" name="search" class="form-control" placeholder="Search Customer">
</div>

<div class="col-md-3">
<select name="status" class="form-control">

<option value="">All Status</option>
<option value="pending">Pending</option>
<option value="approved">Approved</option>
<option value="in_progress">In Progress</option>
<option value="completed">Completed</option>

</select>
</div>

<div class="col-md-2">
<button class="btn btn-dark">Filter</button>
</div>

</form>


<table class="table table-bordered">

<thead>

<tr>

<th>ID</th>
<th>Customer</th>
<th>Email</th>
<th>Phone</th>
<th>Total</th>
<th>Status</th>
<th>Products</th>
<th>Actions</th>

</tr>

</thead>

<tbody>

@foreach($orders as $order)

<tr>

<td>#{{ $order->id }}</td>

<td>{{ $order->customer_name }}</td>

<td>{{ $order->email }}</td>

<td>{{ $order->phone }}</td>

<td>Rs {{ $order->total }}</td>

<td>

<form action="{{ route('admin.admin.orders.status',$order->id) }}" method="POST">

@csrf

<select name="status" class="form-control mb-2">

<option value="pending" {{ $order->status=='pending'?'selected':'' }}>Pending</option>

<option value="approved" {{ $order->status=='approved'?'selected':'' }}>Approved</option>

<option value="in_progress" {{ $order->status=='in_progress'?'selected':'' }}>In Progress</option>

<option value="completed" {{ $order->status=='completed'?'selected':'' }}>Completed</option>

</select>

<button class="btn btn-sm btn-dark">Update</button>

</form>

<!-- STATUS BADGE -->

<span class="badge
@if($order->status=='pending') bg-warning
@elseif($order->status=='approved') bg-info
@elseif($order->status=='in_progress') bg-primary
@elseif($order->status=='completed') bg-success
@endif
">

{{ ucfirst(str_replace('_',' ',$order->status)) }}

</span>

</td>


<td>

@foreach($order->items as $item)

<div class="mb-2">

{{ $item->product->name ?? '' }}

( x{{ $item->quantity }} )

</div>

@endforeach

</td>


<td>

<form action="{{ route('admin.admin.orders.delete',$order->id) }}" method="POST">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm">
Delete
</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

{{-- @endsection --}}