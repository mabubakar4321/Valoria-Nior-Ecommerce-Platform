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
                        <img src="{{ asset('website/assets/images/123432112.png') }}">
                    </a>
                    <!-- ***** Logo End ***** -->

                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">

                        <li class="scroll-to-section">
                            <a href="{{ route('welcome') }}" class="active">Home</a>
                        </li>

                        <li>
                            <a href="{{ route('about') }}">About Us</a>
                        </li>

                        <li>
                            <a href="{{ route('products') }}">Products</a>
                        </li>

                        <li>
                            <a href="{{ route('contact') }}">Contact Us</a>
                        </li>
                         <li>
                            <a href="{{ route('admin.dashboard') }}">Admin</a>
                        </li>

                        <!-- Favourite -->
                        <li class="nav-fav">
                            <a href="javascript:void(0)" onclick="openFavouritePopup()" class="fav-link">
                                <i class="fa fa-heart"></i>
                                <span id="fav-count">{{ count(session('favourites', [])) }}</span>
                            </a>
                        </li>

                        <!-- Cart -->
                        <li class="cart-icon-wrapper">
                            <a href="javascript:void(0);" onclick="openCart()" class="cart-link">
                                <i class="fa-solid fa-bag-shopping"></i>
                                <span id="cart-count" class="cart-badge">
                                    {{ array_sum(array_column(session('cart', []), 'quantity')) }}
                                </span>
                            </a>
                        </li>

                        <!-- Profile -->
                        <li class="header-profile">
                            <a href="{{ url('/my-orders') }}" title="My Orders">
                                <i class="fa fa-user"></i>
                            </a>
                        </li>

                        <!-- Auth -->
                        <li>
                            <a href="{{ route('register.form') }}">Register</a>
                        </li>

                        <li>
                            <a href="{{ route('login.form') }}">Login</a>
                        </li>

                    </ul>

                    <!-- Mobile Menu Trigger -->
                    <a class="menu-trigger">
                        <span>Menu</span>
                    </a>

                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>