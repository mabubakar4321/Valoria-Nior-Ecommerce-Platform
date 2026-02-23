<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Be Bold - Beauty Store</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family: 'Segoe UI', sans-serif;
    background:#f6f4f5;
    color:#222;
}

.container{
    width:90%;
    max-width:1400px;
    margin:auto;
}

section{
    padding:90px 0;
}

/* HEADER */
header{
    background:#fff;
    border-bottom:1px solid #eee;
}

.nav{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:20px 0;
}

.logo{
    font-weight:700;
    font-size:22px;
}

.logo span{
    font-weight:300;
    font-size:12px;
    display:block;
    letter-spacing:2px;
}

.nav-links a{
    margin:0 18px;
    text-decoration:none;
    color:#333;
    font-size:14px;
    letter-spacing:.5px;
}

/* HERO */
.hero{
    background:#cda1a8;
    color:#fff;
}

.hero-content{
    display:flex;
    align-items:center;
    justify-content:space-between;
}

.hero-text{
    width:45%;
}

.hero-text h1{
    font-size:48px;
    font-weight:500;
    margin-bottom:20px;
}

.hero-text p{
    margin-bottom:25px;
    font-size:16px;
}

.btn{
    padding:12px 28px;
    background:#fff;
    color:#000;
    text-decoration:none;
    font-size:13px;
    letter-spacing:1px;
}

.hero-image{
    width:50%;
}

.hero-image img{
    width:100%;
    border-radius:10px;
}

/* LOGO STRIP */
.logos{
    background:#fff;
    padding:40px 0;
    display:flex;
    justify-content:space-around;
    border-bottom:1px solid #eee;
}

.logos div{
    opacity:.6;
    font-weight:600;
}

/* SECTION TITLES */
.section-title{
    text-align:center;
    margin-bottom:50px;
}

.section-title h2{
    font-size:32px;
    font-weight:500;
}

/* PRODUCTS */
.products{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:30px;
}

.product{
    background:#fff;
    padding:20px;
    text-align:center;
    border-radius:8px;
    transition:.3s;
}

.product:hover{
    transform:translateY(-5px);
}

.product img{
    width:100%;
    height:280px;
    object-fit:cover;
    border-radius:6px;
}

.product h4{
    margin:15px 0 8px;
    font-weight:500;
}

.price{
    font-size:14px;
}

.old{
    text-decoration:line-through;
    color:#888;
    margin-right:6px;
}

/* TEAL PROMO */
.promo{
    background:linear-gradient(to right,#2e8f96,#66b4b9);
    color:#fff;
}

.promo-content{
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.promo-text{
    width:45%;
}

.promo-text h2{
    font-size:38px;
    margin-bottom:20px;
}

.promo-image{
    width:50%;
}

.promo-image img{
    width:100%;
}

/* COLLECTION */
.collections{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:30px;
}

.collection-box{
    position:relative;
    color:#fff;
    padding:80px 50px;
    border-radius:10px;
    background-size:cover;
    background-position:center;
}

.collection-box h3{
    font-size:28px;
    margin-bottom:15px;
}

/* FEATURES */
.features{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:30px;
    text-align:center;
}

.feature{
    background:#fff;
    padding:35px;
    border-radius:8px;
}

/* NEWSLETTER */
.newsletter{
    background:#eee;
    text-align:center;
}

.newsletter input{
    padding:12px;
    width:300px;
    border:1px solid #ccc;
}

.newsletter button{
    padding:12px 20px;
    border:none;
    background:#000;
    color:#fff;
}

/* FOOTER */
footer{
    background:#fff;
    padding:50px 0;
    border-top:1px solid #eee;
    text-align:center;
    font-size:14px;
}
.trending-section {
    padding: 80px 0;
    background: #f9f7f4;
}

.section-title h2 {
    font-size: 28px;
    font-weight: 600;
    letter-spacing: 2px;
}

.products-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 40px;
}

.product-card {
    text-align: center;
    transition: 0.3s ease;
}

.product-card img {
    width: 100%;
    height: 420px;
    object-fit: cover;
    transition: 0.4s ease;
}

.product-card:hover img {
    transform: scale(1.05);
}

.product-card h4 {
    margin-top: 18px;
    font-size: 14px;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.price {
    margin-top: 6px;
    font-size: 14px;
}

.price .old {
    text-decoration: line-through;
    margin-right: 8px;
    color: #999;
}

@media (max-width: 992px) {
    .products-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 25px;
    }

    .product-card img {
        height: 320px;
    }
}

@media (max-width: 576px) {
    .products-grid {
        grid-template-columns: 1fr;
    }
}

/* RESPONSIVE */
@media(max-width:1000px){
    .products{
        grid-template-columns:repeat(2,1fr);
    }
    .hero-content,
    .promo-content{
        flex-direction:column;
    }
    .hero-text,
    .hero-image,
    .promo-text,
    .promo-image{
        width:100%;
    }
    .collections{
        grid-template-columns:1fr;
    }
    .features{
        grid-template-columns:1fr;
    }
}


</style>
</head>

<body>

<header>
<div class="container nav">
    <div class="logo">Be Bold <span>BEAUTY STORE</span></div>
    <div class="nav-links">
        <a href="#">SHOP ALL</a>
        <a href="#">MAKEUP</a>
        <a href="#">SKIN CARE</a>
        <a href="#">HAIR CARE</a>
        <a href="#">ABOUT</a>
        <a href="#">CONTACT</a>
    </div>
</div>
</header>

<!-- HERO -->
<section class="hero">
<div class="container hero-content">
    <div class="hero-text">
        <h1>The New Beauty Collection</h1>
        <p>This new collection brings exciting beauty products to elevate your daily routine.</p>
        <a href="#" class="btn">SHOP NOW</a>
    </div>
    <div class="hero-image">
        <img src="https://images.pexels.com/photos/965989/pexels-photo-965989.jpeg" alt="">
    </div>
</div>
</section>

<!-- LOGOS -->
<div class="logos container">
    <div>LOGOIPSUM</div>
    <div>LOGOIPSUM</div>
    <div>LOGOIPSUM</div>
    <div>LOGOIPSUM</div>
    <div>LOGOIPSUM</div>
</div>

<!-- TRENDING -->
<section class="trending-section">
<div class="container">

    <div class="section-title text-center mb-5">
        <h2>Trending Now</h2>
    </div>

    <div class="products-grid">

        @foreach($products as $product)

        <div class="product-card">

            <a href="{{ route('products.detail',$product->id) }}">

                @if($product->images->first())
                    <img src="{{ asset('storage/'.$product->images->first()->image) }}"
                         alt="{{ $product->name }}">
                @endif

            </a>

            <h4>{{ $product->name }}</h4>

            <div class="price">

                @if($product->discount_price)
                    <span class="old">
                        RS {{ number_format($product->original_price,2) }}
                    </span>

                    RS {{ number_format($product->discount_price,2) }}
                @else
                    RS {{ number_format($product->original_price,2) }}
                @endif

            </div>

        </div>

        @endforeach

    </div>

</div>
</section>

<!-- PROMO -->
<section class="promo">
<div class="container promo-content">
    <div class="promo-text">
        <h2>The beauty collection that makes all the difference!</h2>
        <a href="#" class="btn">SHOP NOW</a>
    </div>
    <div class="promo-image">
        <img src="https://images.pexels.com/photos/6621464/pexels-photo-6621464.jpeg">
    </div>
</div>
</section>

<!-- COLLECTION -->
<section>
<div class="container collections">
    <div class="collection-box" style="background-image:url('https://images.pexels.com/photos/3373743/pexels-photo-3373743.jpeg')">
        <h3>Awesome Makeup Gift Sets</h3>
        <a href="#" class="btn">SHOP NOW</a>
    </div>
    <div class="collection-box" style="background-image:url('https://images.pexels.com/photos/6621333/pexels-photo-6621333.jpeg')">
        <h3>The Ultimate Skincare Regime</h3>
        <a href="#" class="btn">SHOP NOW</a>
    </div>
</div>
</section>

<!-- FEATURES -->
<section>
<div class="container features">
    <div class="feature">
        <h4>Fast Delivery</h4>
        <p>Quick and secure shipping.</p>
    </div>
    <div class="feature">
        <h4>Free Shipping</h4>
        <p>Free shipping on all orders.</p>
    </div>
    <div class="feature">
        <h4>Easy Returns</h4>
        <p>30-day return policy.</p>
    </div>
</div>
</section>

<!-- NEWSLETTER -->
<section class="newsletter">
<div class="container">
    <h3>Subscribe to our newsletter</h3>
    <br>
    <input type="email" placeholder="Your email address">
    <button>SUBSCRIBE</button>
</div>
</section>

<footer>
    © 2026 Be Bold | Powered by Be Bold
</footer>

</body>
</html>
