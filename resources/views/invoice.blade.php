<h2>Order Invoice</h2>

<p>Order ID: {{ $order->id }}</p>
<p>Name: {{ $order->customer_name }}</p>
<p>Email: {{ $order->email }}</p>
<p>Phone: {{ $order->phone }}</p>

<hr>

<table width="100%" border="1" cellpadding="10">

<tr>
<th>Product</th>
<th>Qty</th>
<th>Price</th>
</tr>

@foreach($order->items as $item)

<tr>

<td>{{ $item->product->name }}</td>

<td>{{ $item->quantity }}</td>

<td>{{ $item->price }}</td>

</tr>

@endforeach

</table>

<h3>Total: Rs {{ $order->total_amount }}</h3>