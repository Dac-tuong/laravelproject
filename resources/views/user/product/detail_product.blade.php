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
    <h1>{{ $product_detail->product_name}}</h1>
    <div class="col-lg-7 col-md-6 col-sm-12">
        <div class="feature-img">
            <div class="box-thumbnail">
                <img src="{{ URL::to('uploads/product/' . $product_detail->product_image) }}" class="box-gallery-img">
            </div>
            <div class="gallery-product">
                @if($product_detail && $product_detail->galleries->count())
                @foreach($product_detail->galleries as $gallery)
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
                    <p>Sản phẩm sẽ được bảo hành và đổi mới trong vòng {{$product_detail->warranty_period}} tháng <a
                            href="">Xem chi tiết</a></p>
                </li>
            </ul>
        </div>
    </div>

    <div class="col-lg-5 col-md-6 col-sm-12">
        <div class="box-right">
            <div class="box-info">
                <a href="" class="box03__item">{{$product_detail->ram}}-{{$product_detail->storage}}</a>
                <a href="" class="box03__item">{{$product_detail->ram}}-{{$product_detail->storage}}</a>

                <p class="product-code">Mã sản phẩm: {{$product_detail->product_code}}</p>
                <p class="product-price">Giá bán:{{ number_format($product_detail->sale_price, 0, ',', '.') }}</p>
                <p>Loại điện thoại: {{$product_detail->category->category_name}}</p>
                <p>Thương hiệu: {{$product_detail->brand->brand_name}}</p>
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
                    <button type="button" class="add-to-cart" data-id_product="{{ $product_detail->product_id }}"
                        name="add-to-cart">
                        Thêm giỏ hàng
                    </button>
                    <button type="button" class="buy-now">Mua ngay</button>
                </div>
            </div>
        </div>
    </div>

    <div class="similars row">
        @foreach ($similars as $similar)
        <div class="col-2">
            câsd
        </div>
        @endforeach
    </div>

    <div class="block-content-product row">
        <div class="col-sm-8">
            <div class="block-review">
                <div class="customer-review">
                    <img class="avt-img-cmt" src="{{ URL::to('user/image/avatar-user.png') }}" alt="">
                    <div>
                        <strong>
                            Tên khách hàng
                        </strong>
                        <div class="">
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star-half-stroke"></i>
                        </div>
                        <span>Text</span>
                    </div>
                </div>
            </div>

            <a href="{{URL::to('/review-product'.'/'.$product_detail->product_id)}}">Xem thêm đánh giá</a>

            <div class="box-comment">
                <h2 class="boxcomment__title">
                    Bình luận
                </h2>
                <div class="form-comment">
                    <div>
                        @if (Session::get('id_customer'))
                        <!-- User is logged in -->
                        <img class="avt-img-cmt" src="{{ URL::to('user/image/avatar-user.png') }}" alt="">
                        @endif
                        <img class="avt-img-cmt" src="{{ URL::to('user/image/avatar-user.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div>
                <form>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" autocomplete="off">
                    <input type="text" name="comment-text" class="comment-text">
                    <div class="cmt-button">
                        <button class="cancel-btn">Hủy</button>
                        <button class="add-comment-btn">Bình luận</button>
                    </div>
                </form>
            </div>
        </div>



        <div class="col-sm-4">
            <div class="tabs">
                <h2 class="tab-title">Thông số kỹ thuật</h2>
            </div>
            <div ss="specifications">
                <div class="specification-item">
                    <div class="box-specifi">
                        <a href="#" class="toggle-btn">Màn hình & Camera</a>
                        <ul class="text-specifi active">
                            <li>
                                <aside><strong>Công nghệ màn hình</strong></aside>
                                <aside>
                                    <span>{{$product_detail->screen_type}}</span>
                                </aside>
                            </li>
                            <li>
                                <aside><strong>Độ phân giải</strong></aside>
                                <aside>
                                    <span>{{$product_detail->resolution}}</span>
                                </aside>
                            </li>
                            <li>
                                <aside><strong>Màn hình rộng</strong></aside>
                                <aside>
                                    <span>{{$product_detail->screen_size}}</span>
                                </aside>
                            </li>
                            <li>
                                <aside><strong>Tần số quét</strong></aside>
                                <aside>
                                    <span>{{$product_detail->refresh_rate}} hz</span>
                                </aside>
                            </li>

                            <li>
                                <aside><strong>Độ phân giải camera sau</strong></aside>
                                <aside>
                                    <span>{{$product_detail->camera_main}}</span>
                                </aside>
                            </li>
                            <li>
                                <aside><strong>Tính năng camera sau</strong></aside>
                                <aside>
                                    <span>{{$product_detail->camera_main_features}}</span>
                                </aside>
                            </li>

                            <li>
                                <aside><strong>Độ phân giải camera trước</strong></aside>
                                <aside>
                                    <span>{{$product_detail->camera_front}}</span>
                                </aside>
                            </li>
                            <li>
                                <aside><strong>Tính năng camera trước</strong></aside>
                                <aside>
                                    <span>{{$product_detail->camera_front_features}}</span>
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
                                    <span>{{$product_detail->operating_system}}</span>
                                </aside>
                            </li>
                            <li>
                                <aside><strong>Chip xữ lý (CPU)</strong></aside>
                                <aside>
                                    <span>{{$product_detail->cpu}}</span>
                                </aside>
                            </li>
                            <li>
                                <aside><strong>Chip đồ họa (GPU)</strong></aside>
                                <aside>
                                    <span>{{$product_detail->gpu}}</span>
                                </aside>
                            </li>
                            <li>
                                <aside><strong>ram</strong></aside>
                                <aside>
                                    <span>{{$product_detail->ram}} GB</span>
                                </aside>
                            </li>
                            <li>
                                <aside><strong>Bộ nhớ trong</strong></aside>
                                <aside>
                                    <span>{{$product_detail->storage}} GB</span>
                                </aside>
                            </li>
                            <li>
                                <aside><strong>Hỗ trợ thể nhớ</strong></aside>
                                <aside>
                                    <span>
                                        @if ($product_detail->expandable_storage == false)
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
                                    <span>{{$product_detail->battery_capacity}} mAh</span>
                                </aside>
                            </li>
                            <li>
                                <aside><strong>Hỗ trợ sạc nhanh</strong></aside>
                                <aside>
                                    <span>
                                        @if ($product_detail->fast_charging == true)
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
                                        @if ($product_detail->wireless_charging == true)
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
                                    <span>{{$product_detail->water_resistance}}</span>
                                </aside>
                            </li>
                            <li>
                                <aside><strong>Bảo mật</strong></aside>
                                <aside>
                                    <span>{{$product_detail->biometrics}}</span>
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
                                    <span>{{$product_detail->sim_type}}</span>
                                </aside>
                            </li>
                            <li>
                                <aside><strong>Kết nối</strong></aside>
                                <aside>
                                    <span>{{$product_detail->connectivity}}</span>
                                </aside>
                            </li>
                            <li>
                                <aside><strong>Wifi</strong></aside>
                                <aside>
                                    <span>{{$product_detail->wifi_technology}}</span>
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
                                    <span>{{$product_detail->dimensions}}</span>
                                </aside>
                            </li>
                            <li>
                                <aside><strong>Trọng lượng</strong></aside>
                                <aside>
                                    <span>{{$product_detail->weight}}</span>
                                </aside>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>


</div>
@endsection