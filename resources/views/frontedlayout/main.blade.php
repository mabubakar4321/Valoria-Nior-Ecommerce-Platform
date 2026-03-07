<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <title>Hexashop Ecommerce HTML CSS Template</title>
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('website/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/templatemo-hexashop.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/owl-carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/style.css') }}">


<style>
        .fav-popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.6);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .fav-content {
            background: #fff;
            padding: 25px;
            width: 400px;
            max-height: 500px;
            overflow-y: auto;
            border-radius: 10px;
        }
    </style>
    </head>
    
    <body>
    
 @include('frontedlayout.header')
   
   @yield('code')
    
   @include('frontedlayout.footer')

<!-- ===== FAVOURITE POPUP ===== -->
<div id="favouritePopup" class="fav-overlay">
    <div class="fav-modal">
        <!-- Header -->
        <div class="fav-header">
            <h5>My Wishlist</h5>
            <button class="fav-close" onclick="closeFavouritePopup()">
                &times;
            </button>
        </div>

        <!-- Body -->
        <div id="fav-items" class="fav-body"></div>

        <!-- Footer -->
        <div class="fav-footer">
            <button class="fav-cancel" onclick="closeFavouritePopup()">
                Continue Shopping
            </button>
        </div>

    </div>
</div>

<!-- CART OVERLAY -->
<div id="cartOverlay" class="cart-overlay">
    <div class="cart-panel">

        <div class="cart-header">
            <h4>Cart</h4>
            <span onclick="closeCart()">×</span>
        </div>

        <div id="cartItems" class="cart-body"></div>

        <div class="cart-footer">
            <button onclick="window.location.href='{{ route('checkout') }}'"
            
            class="checkout-btn">CHECKOUT</button>
        </div>

    </div>
</div>


    <!-- jQuery -->
    <script src="{{ asset('website/assets/js/jquery-2.1.0.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('website/assets/js/popper.js') }}"></script>
    <script src="{{ asset('website/assets/js/bootstrap.min.js') }}"></script>

    <!-- Plugins -->
    <script src="{{ asset('website/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('website/assets/js/accordions.js') }}"></script>
    <script src="{{ asset('website/assets/js/datepicker.js') }}"></script>
    <script src="{{ asset('website/assets/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/imgfix.min.js') }}"></script> 
    <script src="{{ asset('website/assets/js/slick.js') }}"></script> 
    <script src="{{ asset('website/assets/js/lightbox.js') }}"></script> 
    <script src="{{ asset('website/assets/js/isotope.js') }}"></script> 
    
    <!-- Global Init -->
    <script src="{{ asset('website/assets/js/custom.js') }}"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>
     <script>
        function addToFavourite(id) {
    fetch('/favourite/add/' + id, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
    if (data.success) {
        document.getElementById("fav-count").innerText = data.count;
    }
})
     .catch(error => console.log(error));
    
}
        function openFavouritePopup() {
            document.getElementById('favouritePopup').style.display = 'flex';
            loadFavourites();
        }

        function closeFavouritePopup() {
            document.getElementById('favouritePopup').style.display = 'none';
        }

        function loadFavourites() {
            fetch('/favourite/list')
            .then(res => res.json())
            .then(data => {

                let container = document.getElementById('fav-items');
                container.innerHTML = '';

                Object.values(data).forEach(item => {

                    container.innerHTML += `
                        <div style="display:flex; justify-content:space-between; margin-bottom:10px;">
                            <div>
                                <strong>${item.name}</strong><br>
                                Rs ${item.price}
                            </div>
                            <button onclick="removeFavourite(${item.id})">X</button>
                        </div>
                    `;
                });

                document.getElementById('fav-count').innerText = Object.keys(data).length;
            });
        }

        function removeFavourite(id) {
            fetch('/favourite/remove/' + id, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                }
            })
            .then(res => res.json())
            .then(data => {
                loadFavourites();
            });
        }
    </script>


<script>

function addToCart(id) {

    let qty = 1;

    let quantityInput = document.getElementById("quantity");

    if(quantityInput){
        qty = quantityInput.value;
    }

    fetch('/cart/add/' + id, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            quantity: qty
        })
    })
    .then(res => res.json())
    .then(data => {

        if(data.success){

            loadCart();
            openCart();

            if(quantityInput){
                quantityInput.value = 1;
            }

            // update header cart count
            document.getElementById("cart-count").innerText = data.count;
        }

    });
}

function openCart(){
    document.getElementById("cartOverlay").style.display = "flex";
}

function closeCart(){
    document.getElementById("cartOverlay").style.display = "none";
}

function loadCart(){
    fetch('/cart/data')
    .then(res => res.json())
    .then(cart => {

        let html = '';
        let subtotal = 0;

        Object.values(cart).forEach(item => {

            subtotal += item.price * item.quantity;

            html += `
                <div class="cart-item">
                    <img src="/storage/${item.image}" class="cart-img">

                    <div class="cart-info">
                        <h6>${item.name}</h6>
                        <small>SKU: ${item.sku}</small>
                        <p>Rs ${item.price}</p>

                        <div class="cart-qty">
                            <button onclick="updateQty(${item.id}, ${item.quantity - 1})">-</button>
                            <span>${item.quantity}</span>
                            <button onclick="updateQty(${item.id}, ${item.quantity + 1})">+</button>
                        </div>

                        <a href="#" onclick="removeCart(${item.id})" class="remove-btn">
                            Remove
                        </a>
                    </div>
                </div>
            `;
        });

        html += `
            <div class="cart-subtotal">
                <strong>Subtotal:</strong> Rs ${subtotal}
            </div>
        `;

        document.getElementById("cartItems").innerHTML = html;
    });
}
    fetch('/cart/data')
    .then(res => res.json())
    .then(cart => {

        let html = '';

        Object.values(cart).forEach(item => {

            html += `
                <div class="cart-item">
                    <img src="/storage/${item.image}">
                    <div>
                        <strong>${item.name}</strong>
                        <p>Rs ${item.price}</p>
                        <p>Qty: ${item.quantity}</p>
                        <a href="#" onclick="removeCart(${item.id})">Remove</a>
                    </div>
                </div>
            `;
        });

        document.getElementById("cartItems").innerHTML = html;
    });


function removeCart(id){
    fetch('/cart/remove/' + id, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    }).then(() => loadCart());
}

function updateQty(id, qty){
    if(qty < 1) return;

    fetch('/cart/update/' + id, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ quantity: qty })
    })
    .then(() => loadCart());
}

</script>

<script>

function removeFromCheckout(id){

fetch('/cart/remove/' + id, {
    method: 'POST',
    headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        'Content-Type': 'application/json'
    }
})
.then(res => res.json())
.then(data => {

    if(data.success){
        location.reload();
    }

});

}

</script>

  </body>
</html>