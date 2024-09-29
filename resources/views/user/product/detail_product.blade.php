@extends('layout')
@section('content')
<div class="row">
    <!-- Product Item -->
    @foreach ($product_detail as $key => $detail_pro )
    <div class="product-detail col-sm-5">
        <img src="{{ URL::to('uploads/product/' . $detail_pro->product_image) }}" class="product-detail-img">
        <div class="gallery-product">
            @foreach ($detail_pro->galleries as $gallery)
            <img src="{{ URL::to('uploads/product/' . $gallery->gallery_path) }}" alt="">
            @endforeach
        </div>
    </div>

    <div class="product-tabs col-sm-5">
        <div class=" product-info">
            <h1>{{ $detail_pro->product_name}}</h1>
            <p class="product-price">{{ number_format($detail_pro->product_price, 0, ',', '.') }}</p>
            <p>Loại điện thoại: {{$detail_pro->category->category_name}}</p>
            <p>Thương hiệu: {{$detail_pro->brand->brand_name}}</p>
            <div class="product-description">
                <p>Mô tả chi tiết sản phẩm...</p>
            </div>

            <div class="product-options">
                <label for="quantity">số lượng</label>
                {{$detail_pro->product_quantity}}
                <br>
                <button class="btn-add-to-cart">Thêm vào giỏ hàng</button>
            </div>
        </div>
        <ul class="tab-nav">
            <li class="tab-link active" data-tab="info">Thông tin sản phẩm</li>
            <li class="tab-link" data-tab="reviews">Đánh giá</li>
        </ul>

        <div class="tab-content">
            <div id="info" class="tab-pane active">
                <p>Nội dung chi tiết về thông tin sản phẩm...</p>
            </div>

            <div id="reviews" class="tab-pane">
                <ul class="reviews-list">
                </ul>
            </div>
        </div>
    </div>
    @endforeach



</div>
</div>
@endsection