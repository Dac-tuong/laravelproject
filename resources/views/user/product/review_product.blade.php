@extends('layout')
@section('content')
<nav area-label="breadcrumb">
    <ol>
        <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
        <li class="breadcrumb-item"><a href="">Đánh giá sản phẩm</a></li>
    </ol>
</nav>

<div class="block-product-review">

    <img class="home-product-img" src="{{ URL::to('uploads/product/' . $product_infor->product_image) }}" alt="" />

    <div class="boxReview-product__info">
        <p class="info__name">
            {{$product_infor->product_name}}
        </p>

        <span>{{$product_infor->sale_price}}</span>
    </div>

    <div class="box-review">
        <h2 class="boxreview__title">Đánh giá về sản phẩm</h2>
        <div class="box-star">
            <div class="star-product">
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


    @endsection