@extends('layout')
@section('content')
<div class="border-white">
    <div class="breadcrumb">
        <a href="{{ URL::to('/home') }}">Trang chủ </a>/
        <a href="{{ URL::to('/history-order') }}">Lịch sử mua hàng</a>
    </div>
</div>

<div class="history-order-content">
    <div class="history-order-title mb-3">
        <h4 class="title-history">
            LỊCH SỬ MUA HÀNG CỦA BẠN
        </h4>
        <div class="toggle-view" onclick="toggleView()">
            <span class="toggle-title">Hiển thị theo</span>
            <img src="" alt="">
            <span class="type-view">Dạng thẻ</span>
        </div>
    </div>

    <div class="filler-order">
        <form action="" class="filler-order-form">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-6 col-12 mb-2">
                    <input type="text" placeholder="Mã đơn hàng" class="form-control">
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-12 mb-2">
                    <input type="date" placeholder="Ngày mua hàng" class="form-control">
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-12 mb-2">
                    <select name="" id="" class="form-control">
                        <option value="">Chờ xữ lý</option>
                        <option value="">Đã xữ lý</option>
                        <option value="">Đã hủy</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-12 mb-2">
                    <a href="#" class="btn btn-primary w-100">Lọc</a>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-12 mb-2">
                    <a href="#" class="btn btn-secondary w-100">Tải lại</a>
                </div>
            </div>
        </form>
    </div>

    <div class="list-history-order">
        <div class="table-view" id="table-view">
            <table class="table-list-order">
                <thead>
                    <tr>
                        <th>
                            STT
                        </th>
                        <th>
                            Mã đơn hàng
                        </th>
                        <th>
                            Tên người mua
                        </th>
                        <th>
                            Số lượng
                        </th>
                        <th>
                            Chi phí
                        </th>
                        <th>
                            Thời gian mua
                        </th>
                        <th>
                            Trạng thái
                        </th>
                        <th>
                            Tác vụ
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($historys as $history )
                    <tr>
                        <td>
                            1
                        </td>
                        <td>
                            {{$history->order_code }}
                        </td>
                        <td>
                            {{$history->shippingAddress->fullname}}
                        </td>
                        <td>

                            {{$history->orderDetail->sum('product_sale_quantity')}}

                        </td>
                        <td>
                            {{ number_format($history->order_total, 0, ',', '.') }} đ
                        </td>
                        <td>
                            {{$history->create_at}}
                        </td>
                        <td>
                            {{$history->order_status}}
                        </td>
                        <td>
                            <a href="">Xem</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-view" id="card-view">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                    <div class="border-card ">
                        <div class="card-header">
                            <div class="pull-right"><label class="">Chờ xữ lý</label></div>
                            <span>Mã đơn hàng <a href=""> 0921asewssd</a></span>
                            <br>
                            <span><strong>Nguyễn Văn A</strong></span><br />
                            Quantity : 4, cost: $523.13<br />
                            <div>order made on: 06/20/2014 by <a href="#">Jane Doe</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection