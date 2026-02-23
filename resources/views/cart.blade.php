<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f8f9fa;
        }

        .qty-btn{
            width:32px;
            height:32px;
            border:none;
            background:#000;
            color:#fff;
        }

        .qty-number{
            min-width:35px;
            text-align:center;
            font-weight:600;
        }

        .cart-table td{
            vertical-align:middle;
        }

        .grand-total{
            font-size:20px;
            font-weight:600;
        }
    </style>
</head>
<body>

<div class="container mt-5">

<h2 class="mb-4">Your Cart</h2>

@if(count($cart) > 0)

<table class="table cart-table bg-white shadow-sm">
    <thead class="table-light">
        <tr>
            <th>Product</th>
            <th>Color</th>
            <th>Size</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

    @php $grandTotal = 0; @endphp

    @foreach($cart as $key => $item)

    @php 
        $total = $item['price'] * $item['quantity']; 
        $grandTotal += $total;
    @endphp

    <tr id="row-{{ $key }}">
        <td>{{ $item['name'] }}</td>
        <td>{{ $item['color'] ?? '-' }}</td>
        <td>{{ $item['size'] ?? '-' }}</td>
        <td>RS {{ number_format($item['price'],2) }}</td>

        <!-- Quantity Controls -->
        <td>
            <div class="d-flex align-items-center gap-2">
                <button class="qty-btn"
                    onclick="updateQty('{{ $key }}','decrease')">-</button>

                <span id="qty-{{ $key }}" class="qty-number">
                    {{ $item['quantity'] }}
                </span>

                <button class="qty-btn"
                    onclick="updateQty('{{ $key }}','increase')">+</button>
            </div>
        </td>

        <!-- Row Total -->
        <td id="total-{{ $key }}">
            RS {{ number_format($total,2) }}
        </td>

        <td>
            <button class="btn btn-danger btn-sm"
                onclick="removeItem('{{ $key }}')">
                Remove
            </button>
        </td>
    </tr>

    @endforeach

    </tbody>
</table>

<div class="text-end mt-4 grand-total">
    Grand Total:
    <span id="grandTotal">
        RS {{ number_format($grandTotal,2) }}
    </span>
</div>

@else

<div class="alert alert-warning">
    Your cart is empty.
</div>

@endif

</div>

<script>
function updateQty(key, action){

    fetch("/cart/update/" + key,{
        method:"POST",
        headers:{
            "X-CSRF-TOKEN":"{{ csrf_token() }}",
            "Content-Type":"application/json"
        },
        body:JSON.stringify({
            action:action
        })
    })
    .then(res => res.json())
    .then(data => {

        if(data.success){

            let item = data.cart[key];

            document.getElementById("qty-"+key).innerText = item.quantity;

            let total = item.price * item.quantity;

            document.getElementById("total-"+key).innerText =
                "RS " + total.toFixed(2);

            updateGrandTotal(data.cart);
        }
    });
}

function updateGrandTotal(cart){

    let grand = 0;

    Object.values(cart).forEach(item=>{
        grand += item.price * item.quantity;
    });

    document.getElementById("grandTotal").innerText =
        "RS " + grand.toFixed(2);
}

function removeItem(key){

    fetch("/cart/remove/" + key)
    .then(() => {
        document.getElementById("row-"+key).remove();
        location.reload();
    });
}
</script>

</body>
</html>