@extends('layout')
@section('content')
<div class="breadcrumb">
    <a href="{{ URL::to('/') }}">Trang chủ /</a>
    <a href="">{{$product_detail->brand->brand_name}} /</a>
    <a href="">{{ $product_detail->product_name}}</a>
</div>
<div class="product-detail row" style="margin: 0px; padding: 0px;">
    <!-- Product Item -->
    <h1>{{ $product_detail->product_name}}</h1>
    <div class="col-lg-7 col-md-6 col-sm-12">
        <div class="feature-img">
            <div class="box-thumbnail">
                <img id="image-target" src="{{ URL::to('uploads/product/' . $product_detail->product_image) }}"
                    class="box-thumbnail-img">
                <div class="mirror"></div>
            </div>
            <div class="gallery-product" id="gallery-product">
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
            <div class="box-product-variants">
                <a href="" class="box03__item">{{$product_detail->ram}}-{{$product_detail->storage}}</a>
                <a href="" class="box03__item">{{$product_detail->ram}}-{{$product_detail->storage}}</a>

                <p class="product-code">Mã sản phẩm: {{$product_detail->product_code}}</p>
                <p class="product-price">Giá bán:{{ number_format($product_detail->sale_price, 0, ',', '.') }}</p>
                <p>Loại điện thoại: {{$product_detail->category->category_name}}</p>
                <p>Thương hiệu: {{$product_detail->brand->brand_name}}</p>
            </div>


            <div class="block-button allowbuy">
                <form>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" autocomplete>
                    <input type="hidden" value="{{ $product_detail->product_id }}"
                        class="product_id_{{ $product_detail->product_id }}">
                    <input type="hidden" value="{{ $product_detail->product_name }}"
                        class="product_name_{{ $product_detail->product_id }}">
                    <input type="hidden" value="{{ $product_detail->product_image }}"
                        class="product_image_{{ $product_detail->product_id }}">
                    <input type="hidden" value="{{ $product_detail->sale_price }}"
                        class="product_price_{{ $product_detail->product_id }}">
                    <input type="hidden" value="{{ $product_detail->color }}"
                        class="product_color_{{ $product_detail->product_id }}">
                    <input type="hidden" value="1" class="cart_product_qty_{{ $product_detail->product_id }}">
                    <button type="button" class="add-to-cart" data-id_product="{{ $product_detail->product_id }}"
                        name="add-to-cart">
                        <img class="btn-cart" src="{{ URL::to('user/image/cart-btn.png' ) }}" alt="">
                    </button>
                    <button type="button" class="buy-now">Mua ngay</button>

                    <button type="button" class="toggle-favorite" id="toggle-favorite" name="toggle-favorite"
                        data-id_product="{{ $product_detail->product_id }}">
                        <div id="show-favorite">
                        </div>
                    </button>
                </form>
            </div>

        </div>
    </div>
    <div class="similar-products row" style="margin-top: 10px; margin-bottom: 10px;">
        @foreach ($similars as $similar )
        <div class="col-lg-2 col-md-4 col-sm-6 col-6">
            <div class="similar-product">
                <img src="{{URL::to('uploads/product'.'/'.$similar->product_image)}}" alt="">
                <h5>{{$similar->product_name}}</h5>
                <span class="similar-product-price"> {{ number_format($similar->sale_price, 0, ',', '.') }}</span>
                <div class="bottom-div">
                    <div class="product__box-rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="product__box-favorite">
                        <span class="favorite-title">Yêu thích</span>
                        <span class="favorite-icon"></span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="block-content-product row">
        <div class="col-sm-8">
            <div class="block-review">
                <h2>Đánh giá và nhận xét sản phẩm</h2>
                <div class="boxReview-review">
                    <div class="boxReview-score">
                        <span class="point"></span>
                        <div class="list-star">
                        </div>
                        <br>
                        <a href="" class="boxReview-score__count"></a>
                    </div>
                    <div class="boxReview-star">
                        <div class="rating-level" data-rating_level="5">
                            <div class="start-count">
                                5 <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50"
                                    aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                            <!-- <progress class="progress" role="progressbar" max="100" value="20"></progress> -->
                            <span class="rating-count"> 125 đánh giá</span>
                        </div>
                        <div class="rating-level" data-rating_level="4">
                            <div class="start-count">
                                4 <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50"
                                    aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                            <!-- <progress class="progress" role="progressbar" max="100" value="20"></progress> -->
                            <span class="rating-count"> 125 đánh giá</span>
                        </div>
                        <div class="rating-level" data-rating_level="3">
                            <div class="start-count">
                                3 <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50"
                                    aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                            <!-- <progress class="progress" role="progressbar" max="100" value="20"></progress> -->
                            <span class="rating-count"> 125 đánh giá</span>
                        </div>
                        <div class="rating-level" data-rating_level="2">
                            <div class="start-count">
                                2 <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50"
                                    aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                            <!-- <progress class="progress" role="progressbar" max="100" value="20"></progress> -->
                            <span class="rating-count"> 125 đánh giá</span>
                        </div>
                        <div class="rating-level" data-rating_level="1">
                            <div class="start-count">
                                1 <i class="fa-solid fa-star"></i>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" style="width: 50%;">
                                </div>
                            </div>
                            <!-- <progress class="progress" role="progressbar" max="100" value="20"></progress> -->
                            <span class="rating-count"> 125 đánh giá</span>
                        </div>


                    </div>

                    <div class="review-form-popup" id="review-form-popup">
                        <div class="">
                            <p>Đánh giá sản phẩm</p>
                            <div class="img">
                                <img src="{{ URL::to('uploads/product/' . $product_detail->product_image) }}"
                                    class="thumbnail-img-review">
                            </div>
                            <h6>{{ $product_detail->product_name}}</h6>
                        </div>
                        <span for="" class="check-star-point" style="display: none; color: red;">
                            Vui lòng đánh giá!
                        </span>
                        <ul class="rating-topzonecr-star">
                            <li data-rating="1">
                                <i class="fa-regular fa-star"></i>
                            </li>
                            <li data-rating="2">
                                <i class="fa-regular fa-star"></i>
                            </li>
                            <li data-rating="3">
                                <i class="fa-regular fa-star"></i>
                            </li>
                            <li data-rating="4">
                                <i class="fa-regular fa-star"></i>
                            </li>
                            <li data-rating="5">
                                <i class="fa-regular fa-star"></i>
                            </li>
                        </ul>

                        <form class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" autocomplete>
                            <div class="row" style="margin: 0; padding:0;">
                                <div class="col-md-6 mb-3">
                                    <label for="" data-check-value="fullname" style="display: none; color: red;">Vui
                                        lòng điền thông
                                        tin!</label>
                                    <input class="form-control" type="text" data-input-value="fullname" name="fullname"
                                        id="fullname" placeholder="Họ và tên">

                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="" data-check-value="phonenumber" style="display: none; color: red;">
                                        Vui lòng điền thông tin!</label>
                                    <input class="form-control" type="text" data-input-value="phonenumber"
                                        name="phonenumber" id="phonenumber" placeholder="Số điện thoại">

                                </div>
                                <div class="col-md-12 mb-12">
                                    <label for="review" data-check-value="review" style="display: none; color: red;">Vui
                                        lòng nhập cảm nhận!</label>
                                    <textarea placeholder="Mời nhập cảm nhận về sản phẩm"
                                        class="custom-textarea form-control" data-input-value="review" id="review"
                                        style="height: 120px;"></textarea>
                                </div>
                            </div>
                            <div class="dcap"><button type="button" class="send-review"
                                    data-id_product="{{ $product_detail->product_id }}">Gửi đánh giá</button></div>
                        </form>
                    </div>
                </div>
                <div class="add-review-button">
                    <button onclick="openReviewPopup()">Thêm đánh giá</button>
                </div>
                <div class="box-review-filter">
                    <div class="title-filter">Lọc theo</div>
                    <div class="filter-container">
                        <div class="filter-item active">
                            Tất cả
                        </div>
                        <div class="filter-item star">
                            <p>5</p>
                            <div>
                            </div>
                        </div>
                        <div class="filter-item star">
                            <p>4</p>
                            <div>
                            </div>
                        </div>
                        <div class="filter-item star">
                            <p>3</p>
                            <div>
                            </div>
                        </div>
                        <div class="filter-item star">
                            <p>2</p>
                        </div>
                        <div class="filter-item star">
                            <p>1</p>
                        </div>
                    </div>

                </div>

                <div class="boxReview-comment">
                </div>
                <a class="button__view-more-review"
                    href="{{URL::to('/review-product'.'/'.$product_detail->product_id)}}">
                    Xem thêm
                </a>
            </div>


            <div class="box-comments">
                <h2 class="boxcomment__title">
                    Bình luận
                </h2>
                <div class="comment-box">
                    <form>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" autocomplete="off">
                        <div class="textarea-cmt">
                            <textarea name="comment-text" placeholder="Xin mời để lại bình luận" class="comment-text"
                                id="comment-text"></textarea>
                            <button class="add-comment-btn"><i class="fa-solid fa-paper-plane"></i>Gửi</button>
                        </div>
                    </form>
                </div>

                <div class="box-comments-item">
                    <div class="item-comment__box-cmt">
                        <div class="box-cmt__box-info">
                            <div class="box-info">
                                <img class="avt-cmt-info" src="{{ URL::to('user/image/avatar-user.png') }}" alt="">
                                <strong>Tran Truong</strong>
                            </div>
                            <div class="box-time-cmt">
                                <span class="time">12:30pm</span>
                            </div>
                        </div>
                        <div class="box-cmt__box-question">
                            <div class="content">
                                <span class="content-question">Tại sao lại không mua được</span>
                            </div>
                        </div>

                        <div class="item-comment__box-rep-comment">
                            <div class="item-rep-comment">
                                <div class="box-info">
                                    <img class="avt-cmt-info" src="{{ URL::to('user/image/avatar-user.png') }}" alt="">
                                    <strong>QTV</strong>
                                </div>
                                <div class="box-time-cmt">
                                    <span class="time">12:30pm</span>
                                </div>
                            </div>

                            <div class="box-cmt__box-question">
                                <p>CellphoneS xin chào anh Phạm Nguyễn Hoàng Giang,
                                    Dạ khi sản phẩm gặp vấn đề lỗi Anh có thể mang tới cửa hàng chi nhánh gần nhất bên
                                    em. Các bạn ki thuật sẽ kiểm tra và báo lại với mình chính xác nhất nhé ạ.
                                    TECNO SPARK 20 PRO PLUS 8GB 256GB VÀNG - Giá thời điểm hiện tại 4.890.000đ. Khu vực
                                    miền Nam.
                                    Không biết hiện tại mình đang ở quận nào của HCM/HN hay tỉnh thành nào để em kiểm
                                    tra cửa hàng gần mình nhất có sẵn sản phẩm ạ.
                                    Thông tin đến Anh.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4 custom-class">
            <h2 class="tab-title">Thông số kỹ thuật</h2>
            <div class="specifications">
                <div class="specification-item">
                    <div class="box-specifi">
                        <h6>Màn hình & Camera</h6>
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
                </div>
                <div class="specifications-container">
                    <button class="specifications-btn" onclick="openSpecifications()"> Xem thêm</button>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="specifications-popup" id="specifications-popup">
    <div class="specifications-popup-header">
        <h6 class="tab-title">Thông số kỹ thuật</h6>
        <button class="close-specifications">X</button>
    </div>
    <div class="specifications-popup-content">
        <div class="box-specifi">
            <h6>Màn hình & Camera</h6>
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
    </div>
</div>

@endsection