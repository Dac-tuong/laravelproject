@extends('layout')
@section('content')
<nav area-label="breadcrumb">
    <ol>
        <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="">iphone</a></li>
    </ol>
</nav>
<div class="product-detail row" style="margin: 0px; padding: 0px;">
    <!-- Product Item -->
    @foreach ($product_detail as $key => $detail_pro )

    <h1>{{ $detail_pro->product_name}}</h1>
    <div class="col-lg-7 col-md-6 col-sm-12">
        <div class="box-gallery">
            <img src="{{ URL::to('uploads/product/' . $detail_pro->product_image) }}" class="box-gallery-img">
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

        <div class="policy">
            <b>Chính sách của shop</b>
            <ul class="policy__list">
                <li>
                    <div class="icon1">
                        <i class="icondetail-doimoi"></i>
                    </div>
                    <p>Sản phẩm sẽ được bảo hành và đổi mới trong vòng 13 tháng <a href="">Xem chi tiết</a></p>

                </li>
                <li>
                    <div class="icon2">
                        <i class="icondetail-doimoi"></i>
                    </div>
                    <p></p>
                </li>
            </ul>
        </div>

        <div id="tab-spec" class="tabs col2">
            <h2 id="specification" class="tab-link current" data-tab="tab-1">Thông số kỹ thuật</h2>
            <h2 class="tab-link " data-tab="tab-2">Bài viết đánh giá</h2>
        </div>

        <div class="specifications tab-content current">
            <div class="specification-item ">
                <div class="box-specifi">
                    <a href="#">Màn hình</a>
                    <ul class="text-specifi active">
                        <li>
                            <aside><strong>Công nghệ màn hình</strong></aside>
                            <aside>
                                <span>{{$detail_pro->screen_type}}</span>
                            </aside>
                        </li>
                        <li>
                            <aside><strong>Độ phân giải</strong></aside>
                            <aside>
                                <span>{{$detail_pro->resolution}}</span>
                            </aside>
                        </li>
                        <li>
                            <aside><strong>Màn hình rộng</strong></aside>
                            <aside>
                                <span>{{$detail_pro->screen_size}}</span>
                            </aside>
                        </li>
                        <li>
                            <aside><strong>Tần số quét</strong></aside>
                            <aside>
                                <span>{{$detail_pro->refresh_rate}} hz</span>
                            </aside>
                        </li>
                    </ul>
                </div>

                <div class="box-specifi">
                    <a href="#">Camera sau</a>
                    <ul class="text-specifi active">
                        <li>
                            <aside><strong>Độ phân giải</strong></aside>
                            <aside>
                                <span>{{$detail_pro->camera_main}}</span>
                            </aside>
                        </li>
                        <li>
                            <aside><strong>Tính năng</strong></aside>
                            <aside>
                                <span>{{$detail_pro->camera_main_features}}</span>
                            </aside>
                        </li>
                    </ul>
                </div>

                <div class="box-specifi">
                    <a href="#">Camera trước</a>
                    <ul class="text-specifi active">
                        <li>
                            <aside><strong>Độ phân giải</strong></aside>
                            <aside>
                                <span>{{$detail_pro->camera_front}}</span>
                            </aside>
                        </li>
                        <li>
                            <aside><strong>Tính năng</strong></aside>
                            <aside>
                                <span>{{$detail_pro->camera_front_features}}</span>
                            </aside>
                        </li>
                    </ul>
                </div>

                <div class="box-specifi">
                    <a href="#">Hệ điều hành</a>
                    <ul class="text-specifi active">
                        <li>
                            <aside><strong>Hệ điều hành</strong></aside>
                            <aside>
                                <span>{{$detail_pro->operating_system}}</span>
                            </aside>
                        </li>
                        <li>
                            <aside><strong>Chip xữ lý (CPU)</strong></aside>
                            <aside>
                                <span>{{$detail_pro->cpu}}</span>
                            </aside>
                        </li>
                        <li>
                            <aside><strong>Chip đồ họa (GPU)</strong></aside>
                            <aside>
                                <span>{{$detail_pro->gpu}}</span>
                            </aside>
                        </li>
                    </ul>
                </div>


            </div>
        </div>

    </div>
    <div class="col-lg-5 col-md-6 col-sm-12">
        <div class="box-right">
            <div class="box-info">
                <a href="" class="box03__item">{{$detail_pro->ram}}-{{$detail_pro->storage}}</a>
                <a href="" class="box03__item">{{$detail_pro->ram}}-{{$detail_pro->storage}}</a>

                <p class="product-code">Mã sản phẩm: {{$detail_pro->product_code}}</p>
                <p class="product-price">Giá bán:{{ number_format($detail_pro->sale_price, 0, ',', '.') }}</p>
                <p>Loại điện thoại: {{$detail_pro->category->category_name}}</p>
                <p>Thương hiệu: {{$detail_pro->brand->brand_name}}</p>
            </div>
            <div class="box-saving">
                <div class="shipp">
                    <strong>Thông tin vận chuyển</strong>
                    <br>
                    <strong>Giao đến</strong>
                    <p>Địa chỉ</p>
                    <a href="">Thay đổi</a>
                </div>
                <div class="block-button allowbuy">
                    <button type="button" class="add-to-cart" data-id_product="{{ $detail_pro->product_id }}"
                        name="add-to-cart">
                        Thêm giỏ hàng
                    </button>
                    <button type="button" class="buy-now">Mua ngay</button>
                </div>
            </div>
        </div>


    </div>

    <div>
        <h1>0.0</h1>
        <li class="tab-link" data-tab="reviews">Đánh giá</li>
    </div>


    @endforeach



</div>
</div>
@endsection