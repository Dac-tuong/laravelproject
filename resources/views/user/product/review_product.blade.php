@extends('layout')
@section('content')

<div class="breadcrumbs">
    <a href="{{ URL::to('/') }}">Trang chủ /</a>
    <a href="">{{$product_infor->brand->brand_name}} /</a>
    <a href="">{{ $product_infor->product_name}}</a>
</div>

<div class="boxReview">
    <h2 class="boxreview__title">Đánh giá về sản phẩm {{ $product_infor->product_name}}</h2>
    <div class="block-product-review">
        <img class="home-product-img" src="{{ URL::to('uploads/product/' . $product_infor->product_image) }}" />
        <div class="boxReview-product__info">
            <p class="info__name">
                {{$product_infor->product_name}}
            </p>
            <div class="box-info__box-price">
                <span class="product__price--show"> {{$product_infor->sale_price}}</span>
                <div>
                    @if ($product_infor->old_price > 0)
                    <span class="product__price--through">
                        {{ number_format($product_infor->old_price, 0, ',', '.') }}đ
                    </span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div>
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
                        <div class="progress-bar" role="progressbar" style="  background-color: #f59e0b;"
                            aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                    <!-- <progress class="progress" role="progressbar" max="100" value="20"></progress> -->
                    <span class="rating-count"> </span>
                </div>
                <div class="rating-level" data-rating_level="4">
                    <div class="start-count">
                        4 <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="  background-color: #f59e0b;"
                            aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                    <!-- <progress class="progress" role="progressbar" max="100" value="20"></progress> -->
                    <span class="rating-count"> </span>
                </div>
                <div class="rating-level" data-rating_level="3">
                    <div class="start-count">
                        3 <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="  background-color: #f59e0b;"
                            aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                    <!-- <progress class="progress" role="progressbar" max="100" value="20"></progress> -->
                    <span class="rating-count"> </span>
                </div>
                <div class="rating-level" data-rating_level="2">
                    <div class="start-count">
                        2 <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="  background-color: #f59e0b;"
                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                    <!-- <progress class="progress" role="progressbar" max="100" value="20"></progress> -->
                    <span class="rating-count"></span>
                </div>
                <div class="rating-level" data-rating_level="1">
                    <div class="start-count">
                        1 <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="  background-color: #f59e0b;"
                            aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                    <!-- <progress class="progress" role="progressbar" max="100" value="20"></progress> -->
                    <span class="rating-count"> </span>
                </div>
            </div> <!-- kết thúc thẻ div đánh giá sao và hiện sao sản phẩm -->
            <div class="review-form-popup" id="review-form-popup">
                <div class="header_popup">
                    <p>Đánh giá sản phẩm</p>
                    <button type="button" class="close-popup">X</button>
                </div>
                <div class="review-infor">
                    <div class="img">
                        <img src="{{ URL::to('uploads/product/' . $product_infor->product_image) }}"
                            class="thumbnail-img-review">
                    </div>
                    <h6 class="infor-name">{{ $product_infor->product_name}}</h6>
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
                            <input class="form-control" type="text" data-input-value="phonenumber" name="phonenumber"
                                id="phonenumber" placeholder="Số điện thoại">

                        </div>
                        <div class="col-md-12 mb-12">
                            <label for="review" data-check-value="review" style="display: none; color: red;">Vui
                                lòng nhập cảm nhận!</label>
                            <textarea placeholder="Mời nhập cảm nhận về sản phẩm" class="custom-textarea form-control"
                                data-input-value="review" id="review" style="height: 120px;"></textarea>
                        </div>
                    </div>
                    <div class="dcap"><button type="button" class="send-review"
                            data-id_product="{{ $product_infor->product_id }}">Gửi đánh giá</button></div>
                </form>
            </div>
        </div>
    </div>
    <div class="add-review-button">
        <button class="btn-add-review" onclick="openReviewPopup()">Thêm đánh giá</button>
    </div>
</div>




<div class="box-star">
    <div class="star-product">
        <span class="point">0.0</span>
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

@endsection