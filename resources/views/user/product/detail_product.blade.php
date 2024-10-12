@extends('layout')
@section('content')
<nav area-label="breadcrumb">
    <ol>
        <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="">iphone</a></li>
    </ol>
</nav>
<div class="product-detail row">
    <!-- Product Item -->
    @foreach ($product_detail as $key => $detail_pro )
    <div class="col-lg-4 col-md-6 col-sm-12 ">
        <div class="image-gallery ">
            <img src="{{ URL::to('uploads/product/' . $detail_pro->product_image) }}" class="product-detail-img">
            <div class="gallery-product">
                @if($detail_pro && $detail_pro->galleries->count())
                @foreach($detail_pro->galleries as $gallery)
                <img src="{{ URL::to('uploads/product/' . $gallery->gallery_path) }}" style="height: 80px;"
                    alt="Product Image">
                @endforeach

                @else
                <p>No images available.</p>
                @endif
            </div>
        </div>
    </div>
    <div class="col-lg-5 col-md-6 col-sm-12">
        <div class="product-info">
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

            </div>
        </div>
        <ul class="tab-nav">
            <li class="tab-link active" data-tab="info">Thông tin sản phẩm</li>
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

        <button class="btn-add-to-cart">Thêm vào giỏ hàng</button>
    </div>

    <div class="col-lg-3 col-md-12 col-sm-12 col-12">
        <h1>0.0</h1>
        <li class="tab-link" data-tab="reviews">Đánh giá</li>
    </div>


    @endforeach



</div>
</div>
@endsection