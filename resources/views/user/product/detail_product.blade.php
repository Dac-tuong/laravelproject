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
        <div class="feature-img">
            <div class="box-thumbnail">
                <img src="{{ URL::to('uploads/product/' . $detail_pro->product_image) }}" class="box-gallery-img">
            </div>
            <div class="gallery-product">
                @if($detail_pro && $detail_pro->galleries->count())
                @foreach($detail_pro->galleries as $gallery)
                <img src="{{ URL::to('uploads/product/' . $gallery->gallery_path) }}" alt="Product Image">
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
                    <p>Sản phẩm sẽ được bảo hành và đổi mới trong vòng {{$detail_pro->warranty_period}} tháng <a
                            href="">Xem chi tiết</a></p>
                </li>
            </ul>
        </div>

        <div class="tabs">
            <h2 class="tab-title">Thông số kỹ thuật</h2>
        </div>

        <div class="specifications">
            <div class="specification-item">
                <div class="box-specifi">
                    <a href="#" class="toggle-btn">Màn hình & Camera</a>
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

                        <li>
                            <aside><strong>Độ phân giải camera sau</strong></aside>
                            <aside>
                                <span>{{$detail_pro->camera_main}}</span>
                            </aside>
                        </li>
                        <li>
                            <aside><strong>Tính năng camera sau</strong></aside>
                            <aside>
                                <span>{{$detail_pro->camera_main_features}}</span>
                            </aside>
                        </li>

                        <li>
                            <aside><strong>Độ phân giải camera trước</strong></aside>
                            <aside>
                                <span>{{$detail_pro->camera_front}}</span>
                            </aside>
                        </li>
                        <li>
                            <aside><strong>Tính năng camera trước</strong></aside>
                            <aside>
                                <span>{{$detail_pro->camera_front_features}}</span>
                            </aside>
                        </li>
                    </ul>
                </div>

                <div class="box-specifi">
                    <a href="#" class="toggle-btn">Cấu hình & bộ nhớ</a>
                    <ul class="text-specifi">
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
                        <li>
                            <aside><strong>ram</strong></aside>
                            <aside>
                                <span>{{$detail_pro->ram}} GB</span>
                            </aside>
                        </li>
                        <li>
                            <aside><strong>Bộ nhớ trong</strong></aside>
                            <aside>
                                <span>{{$detail_pro->storage}} GB</span>
                            </aside>
                        </li>
                        <li>
                            <aside><strong>Hỗ trợ thể nhớ</strong></aside>
                            <aside>
                                <span>
                                    @if ($detail_pro->expandable_storage == false)
                                    Không hổ trợ thẻ nhớ
                                    @else
                                    Có hổ trợ thẻ nhớ
                                    @endif
                                </span>
                            </aside>
                        </li>
                    </ul>
                </div>

                <div class="box-specifi">
                    <a href="#" class="toggle-btn">Pin & sạc</a>
                    <ul class="text-specifi">
                        <li>
                            <aside><strong>Dung lượng pin</strong></aside>
                            <aside>
                                <span>{{$detail_pro->battery_capacity}} mAh</span>
                            </aside>
                        </li>
                        <li>
                            <aside><strong>Hỗ trợ sạc nhanh</strong></aside>
                            <aside>
                                <span>
                                    @if ($detail_pro->fast_charging == true)
                                    Có hỗ trợ sạc nhanh
                                    @else
                                    Không hỗ trợ sạc nhanh
                                    @endif
                                </span>
                            </aside>
                        </li>
                        <li>
                            <aside><strong>Sạc không dây</strong></aside>
                            <aside>
                                <span>
                                    @if ($detail_pro->wireless_charging == true)
                                    Có hỗ trợ sạc không dây
                                    @else
                                    Không hỗ trợ sạc không dây
                                    @endif
                                </span>
                            </aside>
                        </li>
                    </ul>
                </div>

                <div class="box-specifi">
                    <a href="#" class="toggle-btn">Tính năng</a>
                    <ul class="text-specifi">
                        <li>
                            <aside><strong>Chống nước</strong></aside>
                            <aside>
                                <span>{{$detail_pro->water_resistance}}</span>
                            </aside>
                        </li>
                        <li>
                            <aside><strong>Bảo mật</strong></aside>
                            <aside>
                                <span>{{$detail_pro->biometrics}}</span>
                            </aside>
                        </li>
                    </ul>
                </div>

                <div class="box-specifi">
                    <a href="#" class="toggle-btn">Kết nối</a>
                    <ul class="text-specifi">
                        <li>
                            <aside><strong>Loại sim</strong></aside>
                            <aside>
                                <span>{{$detail_pro->sim_type}}</span>
                            </aside>
                        </li>
                        <li>
                            <aside><strong>Kết nối</strong></aside>
                            <aside>
                                <span>{{$detail_pro->connectivity}}</span>
                            </aside>
                        </li>
                        <li>
                            <aside><strong>Wifi</strong></aside>
                            <aside>
                                <span>{{$detail_pro->wifi_technology}}</span>
                            </aside>
                        </li>
                    </ul>
                </div>

                <div class="box-specifi">
                    <a href="#" class="toggle-btn">Thiết kế</a>
                    <ul class="text-specifi">
                        <li>
                            <aside><strong>Kích thước</strong></aside>
                            <aside>
                                <span>{{$detail_pro->dimensions}}</span>
                            </aside>
                        </li>
                        <li>
                            <aside><strong>Trọng lượng</strong></aside>
                            <aside>
                                <span>{{$detail_pro->weight}}</span>
                            </aside>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="product-review">
            <div class="box-rate">
                <h2 class="boxrate__title">Đánh giá về sản phẩm</h2>
                <div class="box-start">
                    <div class="point">
                        <p>0.0</p>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star-half-stroke"></i>
                    </div>
                    <ul class="rate-list">
                        <li>
                            <div class="number-start">
                                5 <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="timeline-start">
                                <p class="timing" style="width: 20%;"></p>
                            </div>
                            <span class="number-percent">20%</span>
                        </li>
                        <li>
                            <div class="number-start">
                                4 <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="timeline-start">
                                <p class="timing" style="width: 20%;"></p>
                            </div>
                            <span class="number-percent">20%</span>
                        </li>
                        <li>
                            <div class="number-start">
                                3 <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="timeline-start">
                                <p class="timing" style="width: 20%;"></p>
                            </div>
                            <span class="number-percent">20%</span>
                        </li>
                        <li>
                            <div class="number-start">
                                2 <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="timeline-start">
                                <p class="timing" style="width: 20%;"></p>
                            </div>
                            <span class="number-percent">20%</span>
                        </li>
                        <li>
                            <div class="number-start">
                                1 <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="timeline-start">
                                <p class="timing" style="width: 20%;"></p>
                            </div>
                            <span class="number-percent">20%</span>
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




    @endforeach



</div>
</div>
@endsection