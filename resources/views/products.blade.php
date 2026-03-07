@extends('frontedlayout.main')
@section('code')



<section class="section products-page"  id="products">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Our Latest Products</h2>
                    <span>Check out all of our products.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            @foreach ($AllProducts as $products)
                <div class="col-lg-4">
                    <div class="item">
                        <div class="thumb">
                            <div class="hover-content">
                                <ul>
                                    <li><a href="{{ route('single.product',$products->id) }}"><i class="fa fa-eye"></i></a></li>
                                <li>
    <a href="javascript:void(0);" 
       onclick="addToFavourite({{ $products->id }})"
       title="Add to Favourite">
        <i class="fa fa-heart"></i>
    </a>
</li><li>
<a href="javascript:void(0)"
onclick="addToCart({{ $products->id }})">
<i class="fa fa-shopping-cart"></i>
</a>
</li>
                                </ul>
                            </div>

                            @if($products->images->count() > 0)
                                <img src="{{ asset('storage/'.$products->images->first()->image) }}" alt="">
                            @endif
                        </div>

                        <div class="down-content">
                            <h4>{{ $products->name }}</h4>
                            <span>PKR &nbsp;{{ $products->discount_price ?? $products->original_price }}</span>

                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Pagination OUTSIDE loop -->
          <div class="col-lg-12">

    <style>
        .custom-pagination {
            display: flex;
            justify-content: center;
            margin-top: 40px;
        }

        .custom-pagination .pagination {
            display: flex;
            gap: 12px;
        }

        .custom-pagination .page-item {
            list-style: none;
        }

        .custom-pagination .page-link {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ccc;
            background: #f8f8f8;
            color: #333;
            text-decoration: none;
            font-weight: 500;
            transition: 0.3s;
        }

        .custom-pagination .page-link:hover {
            background: #e5e5e5;
        }

        .custom-pagination .active .page-link {
            background: #333;
            color: #fff;
            border-color: #333;
        }

        .custom-pagination .disabled .page-link {
            opacity: 0.5;
            pointer-events: none;
        }
    </style>

    <div class="custom-pagination">
        {{ $AllProducts->links() }}
    </div>

</div>
            </div>

        </div>
    </div>
</section>

@endsection