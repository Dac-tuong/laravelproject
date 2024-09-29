@extends('layout')
@section('content')
<?php

use Illuminate\Support\Facades\Session;

$cart = Session::get('cart');
$total_price = Session::get('total_price');
$coupon_session = Session::get('coupon');
?>
<h1>Giỏ hàng của bạn</h1>
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-12">
        <div class="cart">
            @if ($cart && count($cart) > 0)
            <table class="table-cart">
                <thead>
                    <tr>
                        <th class="px-4">Sản phẩm đã mua</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>
                            <a class="btn-delete" href="{{URL::to('/delete-all')}}">Xóa tất cả</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $item)
                    <tr>
                        <td class="px-4">
                            <div style="display: flex; align-items: center;">
                                <img src="{{ URL::to('uploads/product/' .$item['image'] ) }}" alt="Tên sản phẩm"
                                    style="width: 50px; height: 50px; margin-right: 10px;">
                                <span> {{ $item['tensp'] }}</span>
                            </div>
                        </td>

                        <td>{{ number_format($item['gia'], 0, ',', '.') }} VNĐ</td>
                        <td>
                            <a href="{{ URL::to('/increase-quantity') . '/' . $item['masp'] }}">
                                <i class="fa-solid fa-plus"></i></a>
                            {{ $item['soluong'] }}
                            <a href="{{ URL::to('/decrease-quantity') . '/' . $item['masp'] }}">
                                <i class="fas fa-minus"></i>
                            </a>
                        </td>
                        <td>{{ number_format($item['total'], 0, ',', '.') }} VNĐ</td>
                        <th><a href="{{ URL::to('/delete') . '/' . $item['session_id'] }}">
                                <i class="fa-solid fa-trash"></i></a>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @else
            <p>Giỏ hàng của bạn đang trống.</p>
            @endif
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="summary-cart">
            <div class="flex-center-between row-summary">
                <span> Tổng cộng :</span>
                <span>
                    {{ number_format($total_price, 0, ',', '.') }} VNĐ
                </span>
            </div>

            @if ($coupon_session)
            @foreach ($coupon_session as $coupon )
            @if ($coupon['coupon_type'] == 'percent')
            <div class="flex-center-between row-summary">
                <span>
                    Áp dụng giảm:
                </span>
                <span>
                    -{{$coupon['discount']}}%
                </span>
            </div>
            @php
            $price_discount = ($total_price * $coupon['discount'])/100;
            $price_cart = $total_price - $price_discount;
            @endphp
            <div class="flex-center-between row-summary">
                <span>
                    Số tiền sau khi giảm:
                </span>
                <span>
                    {{ number_format($price_cart, 0, ',', '.') }} VNĐ
                </span>
            </div>


            @elseif($coupon['coupon_type'] == 'fixed')
            <div class="flex-center-between row-summary">
                <span>
                    Giảm giá :
                </span>
                <span> {{ number_format($coupon['discount'], 0, ',', '.') }} VNĐ</span>
            </div>
            @php
            $price_discount = $coupon['discount'];
            $price_cart = $total_price - $price_discount;

            @endphp
            <div class="flex-center-between row-summary">
                <span>
                    Thành tiền:
                </span>
                <span> {{ number_format($price_cart, 0, ',', '.') }} VNĐ</span>
            </div>
            @endif
            @endforeach
            @else
            <div class="flex-center-between row-summary">
                <span>Số tiền giảm:</span>
                <span>
                    0đ
                </span>
            </div>

            <div class="flex-center-between row-summary">
                <span>
                    Thành tiền:
                </span>
                <span> {{ number_format($total_price, 0, ',', '.') }} VNĐ</span>
            </div>
            @endif
            <hr>
            @if ($coupon_session)
            <div>
                <span>Đã áp dungg mã giảm giá</span>
                <span> <a class="btn-delete" href="{{URL::to('/delete-coupon')}}">Xóa mã giảm giá</a></span>
            </div>
            @endif
            <div>
                @if ($cart== true)
                <div class="coupon-form">
                    <form action="{{ URL::to('/check-coupon') }}" method="POST" class="">
                        {{ csrf_field() }}
                        <label>Dùng code giảm giá nếu có</label>
                        <br>
                        <input type="text" name="code_coupon">

                        <input type="submit" name="use_code" value="Dùng mã">
                    </form>
                </div>
                @endif
            </div>
            <div>
                <a href="{{ URL::to('/checkout') }}">Checkout</a>
            </div>
        </div>

    </div>


</div>

@endsection