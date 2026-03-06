<div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  

<header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="{{ asset('website/assets/images/logo.png') }}">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="{{ route('welcome') }}" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#men">Men's</a></li>
                            <li class="scroll-to-section"><a href="#women">Women's</a></li>
                            <li class="scroll-to-section"><a href="#kids">Kid's</a></li>
                           
                                    <li><a href="{{ route('about') }}">About Us</a></li>
                                    <li><a href="{{ route('products') }}">Products</a></li>
                                   
                                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
         <li class="nav-fav">
    <a href="javascript:void(0)" onclick="openFavouritePopup()" class="fav-link">
        <i class="fa fa-heart"></i>
        <span id="fav-count">{{ count(session('favourites', [])) }}</span>
    </a>
</li>      
<li class="cart-icon-wrapper">
    <a href="javascript:void(0);" onclick="openCart()" class="cart-link">
        <i class="fa-solid fa-bag-shopping"></i>
        <span id="cart-count" class="cart-badge">
            {{ array_sum(array_column(session('cart', []), 'quantity')) }}
        </span>
    </a>
</li>              
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>