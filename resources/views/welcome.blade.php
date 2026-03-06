@extends('frontedlayout.main')
@section('code')
 <div class="main-banner" id="top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <div class="thumb">
                            <div class="inner-content">
                                <h4>Valoria Nior — Where Style Begins</h4>
                                <span>Premium fashion for men, women & kids &amp; — designed to stand out.</span>
                                <div class="main-border-button">
                                    <a href="{{ route('products') }}">Purchase Now!</a>
                                </div>
                            </div  >
                            <img src="{{ asset('website/assets/images/2314.jpg') }}" alt="" height="893" >
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Women</h4>
                                            <span>Modern style, effortless grace.</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Women</h4>
                                                <p>Designed to inspire confidence.</p>
                                                <div class="main-border-button">
                                                    <a href="{{ route('products') }}">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{ asset('website/assets/images/2341-fotor-2026022792034.jpg') }}" height="390"    >
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Men</h4>
                                            <span>Sharp style for every occasion.</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Men</h4>
                                                <p>Where strength meets style.</p>
                                                <div class="main-border-button">
                                                    <a href="{{ route('products') }}">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{ asset('website/assets/images/12345678.jpg') }}" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Kids</h4>
                                            <span>Playful style, everyday comfort.</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Kids</h4>
                                                <p>Made for little adventures.</p>
                                                <div class="main-border-button">
                                                    <a href="{{ route('products') }}">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{ asset('website/assets/images/EBTKS6-4092_6-fotor-2026022794256.jpg') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-first-image">
                                    <div class="thumb">
                                        <div class="inner-content">
                                            <h4>Boys</h4>
                                            <span>Bold style for little champs.</span>
                                        </div>
                                        <div class="hover-content">
                                            <div class="inner">
                                                <h4>Boys</h4>
                                                <p>Cool looks, all day comfort.</p>
                                                <div class="main-border-button">
                                                    <a href="{{ route('products') }}">Discover More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <img src="{{ asset('website/assets/images/0L4A9075_EBTKS5-4055.jpg') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Men Area Starts ***** -->
    <section class="section" id="men">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Latest Men’s Collection</h2>
                        <span>Explore our newest men’s styles, designed with modern cuts and timeless appeal for every occasion.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="men-item-carousel">
                        <div class="owl-men-item owl-carousel">
                           @foreach ($products  as $product)
                                <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="{{ route('single.product',$product->id) }}"><i class="fa fa-eye"></i></a></li>
                                           <li>
    <a href="javascript:void(0);" 
       onclick="addToFavourite({{ $product->id }})"
       title="Add to Favourite">
        <i class="fa fa-heart"></i>
    </a>
</li>
                                            <li>
<a href="javascript:void(0)"
onclick="addToCart({{ $product->id }})">
<i class="fa fa-shopping-cart"></i>
</a>
</li>
                                        </ul>
                                    </div>
                                    <img src="{{ asset(asset('storage/'.$product->images->first()->image)) }}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>{{ $product->name }}</h4>
                                    <span>PKR {{ $product->discount_price }}</span>
                                        <ul class="stars">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                </div>
                            </div>
                           @endforeach
      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Men Area Ends ***** -->

    <!-- ***** Women Area Starts ***** -->
    <section class="section" id="women">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Latest Women’s Collection</h2>
                        <span>Step into the season with fresh arrivals designed to bring confidence, comfort, and effortless style.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="women-item-carousel">
                        <div class="owl-women-item owl-carousel">
                          @foreach ( $productss as $productsss )
                                <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="{{ route('single.product',$productsss->id) }}"><i class="fa fa-eye"></i></a></li>
                                            <li>
    <a href="javascript:void(0);" 
       onclick="addToFavourite({{ $productsss->id }})"
       title="Add to Favourite">
        <i class="fa fa-heart"></i>
    </a>
</li>
                                           <li>
<a href="javascript:void(0)"
onclick="addToCart({{ $productsss->id }})">
<i class="fa fa-shopping-cart"></i>
</a>
</li>
                                        </ul>
                                    </div>
                                    <img src="{{ asset(asset('storage/'.$productsss->images->first()->image)) }}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>{{ $productsss->name }}</h4>
                                    <span>{{ $productsss->discount_price }}</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                          @endforeach
                           
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Women Area Ends ***** -->

    <!-- ***** Kids Area Starts ***** -->
    <section class="section" id="kids">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Latest Kids Collection</h2>
                        <span>Explore our newest kids’ styles, designed with comfort, quality, and playful charm in mind.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="kid-item-carousel">
                        <div class="owl-kid-item owl-carousel">
                            @foreach ($kids as $productes )
                                <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="{{ route('single.product',$productes->id) }}"><i class="fa fa-eye"></i></a></li>
                                            <li>
    <a href="javascript:void(0);" 
       onclick="addToFavourite({{ $productes->id }})"
       title="Add to Favourite">
        <i class="fa fa-heart"></i>
    </a>
</li>
                                          <li>
<a href="javascript:void(0)"
onclick="addToCart({{ $productes->id }})">
<i class="fa fa-shopping-cart"></i>
</a>
</li>
                                        </ul>
                                    </div>
                                    <img src="{{ asset(asset('storage/'.$productes->images->first()->image)) }}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>{{ $productes->name }}</h4>
                                    <span>{{ $productes->discount_price }}</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Kids Area Ends ***** -->

    <!-- ***** Explore Area Starts ***** -->
    <section class="section" id="explore">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-content">
                        <h2>Trending Products Collection</h2>
                        <span>Explore our thoughtfully curated product collection, where quality craftsmanship meets contemporary design. Each piece is carefully selected to deliver comfort, durability, and style, ensuring you find the perfect match for every occasion.</span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i><p>Discover our Best Collection, featuring handpicked styles that represent the finest in quality.</p>
                        </div>
                        <p>Discover the best clothing products on our website, carefully selected for their superior quality, modern design, and lasting comfort. Elevate your wardrobe today and shop your favorites with confidence.</p>
                        <p>Our best clothing collection brings together timeless fashion and contemporary trends <a rel="nofollow" href="https://paypal.me/templatemo" target="_blank">support us</a> Don’t miss out—browse and buy your perfect outfit today.</p>
                        <div class="main-border-button">
                            <a href="{{ route('products') }}
                            ">Discover More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="leather">
                                    <h4>Classic Menswear</h4>
                                    <span>Latest Collection</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="first-image">
                                    <img src="{{ asset('website/assets/images/photo-1532453288672-3a27e9be9efd.avif') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="second-image">
                                    <img src="{{ asset('website/assets/images/female-clothing-store-retail-display-in-shopping-mall-with-discount-sales-tag.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="types">
                                    <h4>Signature Styles</h4>
                                    <span>Over 304 Products</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Explore Area Ends ***** -->

    <!-- ***** Social Area Starts ***** -->
    <section class="section" id="social">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Valoria Nior</h2>
                        <span>Valoria Nior is where modern fashion meets timeless elegance, offering refined styles for every occasion.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row images">
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Fashion</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="{{ asset('website/assets/images/photo-1441984904996-e0b6ba687e04.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>New</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="{{ asset('website/assets/images/premium_photo-1664202525979-80d1da46b34b.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Brand</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="{{ asset('website/assets/images/premium_photo-1731170991803-af071821b1f7.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Makeup</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="{{ asset('website/assets/images/premium_photo-1723795218392-c3f86694bf87.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Leather</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="{{ asset('website/assets/images/photo-1738215778388-f2823c7fcf07.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-2">
                    <div class="thumb">
                        <div class="icon">
                            <a href="http://instagram.com">
                                <h6>Bag</h6>
                                <i class="fa fa-instagram"></i>
                            </a>
                        </div>
                        <img src="{{ asset('website/assets/images/premium_photo-1679056833770-1d1b745d0eff.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Social Area Ends ***** -->

    <!-- ***** Subscribe Area Starts ***** -->
    <div class="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-heading">
                        <h2>Subscribe to our store and enjoy a special 40% discount on your next shopping experience.</h2>
                        <span>Don’t miss the chance to upgrade your style while saving more.</span>
                    </div>
                    <form id="subscribe" action="" method="get">
                        <div class="row">
                          <div class="col-lg-5">
                            <fieldset>
                              <input name="name" type="text" id="name" placeholder="Your Name" required="">
                            </fieldset>
                          </div>
                          <div class="col-lg-5">
                            <fieldset>
                              <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address" required="">
                            </fieldset>
                          </div>
                          <div class="col-lg-2">
                            <fieldset>
                              <button type="submit" id="form-submit" class="main-dark-button"><i class="fa fa-paper-plane"></i></button>
                            </fieldset>
                          </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-6">
                            <ul>
                                <li>Store Location:<br><span>Sunny Isles Beach, FL 33160, United States</span></li>
                                <li>Phone:<br><span>010-020-0340</span></li>
                                <li>Office Location:<br><span>North Miami Beach</span></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul>
                                <li>Work Hours:<br><span>07:30 AM - 9:30 PM Daily</span></li>
                                <li>Email:<br><span>info@company.com</span></li>
                                <li>Social Media:<br><span><a href="#">Facebook</a>, <a href="#">Instagram</a>, <a href="#">Behance</a>, <a href="#">Linkedin</a></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
