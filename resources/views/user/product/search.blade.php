@extends('layout')
@section('content')
<div class="row">
    <!-- Product Item -->
    <?php $search_count = $search_product->count();
    if ($search_count > 0) { ?>

    @foreach ($search_product as $key => $product )
    <div class="col-lg-2 col-md-4 col-sm-6">
        <a class="product-info" href="{{URL::to('/detail-product'.'/'.$product->product_id)}}">
            <div class="home-product-item">
                <img class="home-product-img" src="{{ URL::to('uploads/product/' . $product->product_image) }}" alt="{{ $product->product_name }}" />
                <h5 class=" home-product-item__name">
                    {{ $product->product_name }}
                </h5>
                <div class="home-product-item__price">
                    <span class="home-product-item__price-old">3.899.000 ₫</span>
                    <span
                        class="home-product-item__price-current">{{ number_format($product->product_price, 0, ',', '.') }}</span>
                </div>

                <div class="home-product-item__origin">
                    <span class="home-product-item__origin-brand">{{$product->brand_name}}</span>
                    <span class="home-product-item__origin-warehouse"> Hồ Chí Minh</span>
                </div>
            </div>
        </a>
    </div>
    @endforeach
    <?php } else { ?>
    <div class="col-sm-12">
        <h1>
            Không có sản phẩm
        </h1>
        <img class="no-product" src="{{ URL::to('public/users/images/no-product.png') }}" alt="">
    </div>
    <?php } ?>
</div>
@endsection