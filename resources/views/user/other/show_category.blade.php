@extends('layout')
@section('content')
<div class="breadcrumbs">
    <a href="{{ URL::to('/') }}">Trang chủ /</a>
    <a href="{{ URL::to('/show-brand-user'.'/' . $brand->brand_id ) }}">{{$brand->brand_name}}</a>
</div>
<div class="border-white">
    <form action="" class="form-group">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" autocomplete>
        <!-- Input ẩn để lưu trữ thông tin sản phẩm -->
        <select name="sort" id="sort" class="form-control">
            <option value="{{Request::url()}}?sort_by=none">--Lọc theo--</option>
            <option value="{{Request::url()}}?sort_by=tang_dan">--Lọc theo giá tăng dần--</option>
            <option value="{{Request::url()}}?sort_by=giam_dan">--Lọc theo giá giảm dần--</option>
            <option value="{{Request::url()}}?sort_by=tu_az">--Lọc theo tên A - Z --</option>
            <option value="{{Request::url()}}?sort_by=tu_za">--Lọc Theo tên Z - A --</option>
        </select>

        <select name="" id="">
            <option value="{{Request::url()}}?filter_mobile_ram=none">--Lọc theo--</option>
            <option value="{{Request::url()}}?filter_mobile_ram=<4">--Nhỏ hơn 4GB--</option>
            <option value="{{Request::url()}}?filter_mobile_ram=4gb_8gb">--Nhỏ hơn 4GB-8GB--</option>
            <option value="{{Request::url()}}?filter_mobile_ram=8gb_12gb">--Nhỏ hơn 4GB-8GB--</option>
            <option value="{{Request::url()}}?filter_mobile_ram=>12gb">--Nhỏ hơn 4GB-8GB--</option>

        </select>
    </form>
</div>
<div class="row">
    @foreach ($brand_by_id as $product )
    <div class="col-lg-2 col-md-4 col-sm-6 col-6" style="padding-bottom: 12px;">
        <div class="product-content">
            <form>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" autocomplete>
                <!-- Input ẩn để lưu trữ thông tin sản phẩm -->
                <input type="hidden" value="{{ $product->product_id }}" class="product_id_{{ $product->product_id }}">
                <input type="hidden" value="{{ $product->product_name }}"
                    class="product_name_{{ $product->product_id }}">
                <input type="hidden" value="{{ $product->product_image }}"
                    class="product_image_{{ $product->product_id }}">
                <input type="hidden" value="{{ $product->sale_price }}"
                    class="product_price_{{ $product->product_id }}">
                <input type="hidden" value="{{ $product->color }}" class="product_color_{{ $product->product_id }}">
                <input type="hidden" value="1" class="cart_product_qty_{{ $product->product_id }}">

                <!-- Link đến trang chi tiết sản phẩm -->
                <a class="link-product" href="{{ URL::to('/detail-product'.'/' . $product->product_id) }}">
                    <img class="home-product-img" src="{{ URL::to('uploads/product/' . $product->product_image) }}"
                        alt="" />
                    <h5 class="productinfo__name">{{ $product->product_name }}</h5>
                    <div class=" productinfo__price">
                        @if ($product->old_price > 0)
                        <span class="productinfo__price-old">
                            {{ number_format($product->old_price, 0, ',', '.') }}đ
                        </span>
                        @endif

                        <span class="productinfo__price-current">
                            {{ number_format($product->sale_price, 0, ',', '.') }}đ
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
                </div>
            </form>
        </div>
    </div>
    @endforeach


</div>
@endsection