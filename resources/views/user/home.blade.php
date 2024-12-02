@extends('layout')
@section('content')

<div class="header-content">
    <h3>DANH MỤC THƯƠNG HIỆU</h3>
    <ul class="menu-brand">
        @foreach ($brands as $brand)
        <li class="brand-item"><a href="">{{$brand->brand_name}}</a></li>
        @endforeach

    </ul>
</div>
<div>
    <h3>SẢN PHẨM MỚI NHẤT</h3>
    <div class="row">
        @foreach ($products as $key => $product)
        <div class="col-lg-2 col-md-4 col-sm-6 col-6">
            <div class="product-content">
                <form>
                    @csrf
                    <!-- Input ẩn để lưu trữ thông tin sản phẩm -->
                    <input type="hidden" value="{{ $product->product_id }}"
                        class="product_id_{{ $product->product_id }}">
                    <input type="hidden" value="{{ $product->product_name }}"
                        class="product_name_{{ $product->product_id }}">
                    <input type="hidden" value="{{ $product->product_image }}"
                        class="product_image_{{ $product->product_id }}">
                    <input type="hidden" value="{{ $product->sale_price }}"
                        class="product_price_{{ $product->product_id }}">
                    <input type="hidden" value="{{ $product->color }}" class="product_color_{{ $product->product_id }}">
                    <input type="hidden" value="1" class="cart_product_qty_{{ $product->product_id }}">

                    <!-- Link đến trang chi tiết sản phẩm -->
                    <a href="{{ URL::to('/detail-product'.'/' . $product->product_id) }}">
                        <img class="home-product-img" src="{{ URL::to('uploads/product/' . $product->product_image) }}"
                            alt="" />
                        <h5 class="productinfo__name">{{ $product->product_name }}</h5>
                        <div class=" productinfo__price">
                            @if ($product->old_price > 0)
                            <span class="productinfo__price-old">
                                {{ number_format($product->old_price, 0, ',', '.') }}
                            </span>
                            @endif

                            <span class="productinfo__price-current">
                                {{ number_format($product->sale_price, 0, ',', '.') }}
                            </span>

                        </div>
                        <div class=" productinfo__origin">
                            <span class="productinfo__origin-brand">{{$product->brand_name}}</span>
                        </div>
                    </a>

                    @if ($product->old_price > 0)
                    <div class="product__price--percent">
                        <p class="product__price--percent-detail">
                            @php
                            $percent_discount = (($product->old_price - $product->sale_price) / $product->old_price) *
                            100;
                            echo ceil($percent_discount) . '%'
                            @endphp
                        </p>
                    </div>
                    @endif
                    <!-- Nút thêm vào giỏ hàng -->
                    <div class="action-buttons">
                        <button type="button" class="add-to-cart" data-id_product="{{ $product->product_id }}"
                            name="add-to-cart">
                            <img class="btn-cart" src="{{ URL::to('user/image/cart-btn.png' ) }}" alt="">
                        </button>
                        <button class="add-favorite" id="add-favorite" name="add-favorite"
                            data-id_product="{{ $product->product_id }}">
                            🤍
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
        <!-- Hiển thị liên kết phân trang tùy chỉnh -->
        <div class="pagination">
            @if ($products->onFirstPage())
            <span>&laquo; Previous</span>
            @else
            <a href="{{ $products->previousPageUrl() }}" rel="prev">&laquo; Previous</a>
            @endif

            @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
            @if ($page == $products->currentPage())
            <span>{{ $page }}</span>
            @else
            <a href="{{ $url }}">{{ $page }}</a>
            @endif
            @endforeach

            @if ($products->hasMorePages())
            <a href="{{ $products->nextPageUrl() }}" rel="next">Next &raquo;</a>
            @else
            <span>Next &raquo;</span>
            @endif
        </div>

    </div>


    @endsection