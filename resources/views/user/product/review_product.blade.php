@extends('layout')
@section('content')

<div class="breadcrumbs">
    <a href="{{ URL::to('/') }}">Trang chủ /</a>
    <a href="">{{$product_infor->brand->brand_name}} /</a>
    <a href="">{{ $product_infor->product_name}}</a>
</div>


<div class="boxReview">
    <div>
        <button class="button" onclick="openReviewPopup2()">Thêm đánh giá</button>
    </div>
    <div class="boxReview-popup" id="boxReview-popup">
        <div class="header_popup">
            <p>Đánh giá sản phẩm</p>
            <button class="close-popup" onclick="closeReviewPopup2()">X</button>
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
                    <input class="form-control" type="text" data-input-value="fullname" name="fullname" id="fullname"
                        placeholder="Họ và tên">

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

@endsection