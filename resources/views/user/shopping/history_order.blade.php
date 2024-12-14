@extends('layout')
@section('content')

<div class="breadcrumbs">
    <a href="{{ URL::to('/') }}">Trang chủ </a>/
    <a href="{{ URL::to('/history-order') }}">Lịch sử mua hàng</a>
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

        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-6 col-12 mb-2">
                <input type="text" id="orderCode" placeholder="Mã đơn hàng" class="form-control">
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-12 mb-2">
                <input type="date" id="orderDate" placeholder="Ngày mua hàng" class="form-control">
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-12 mb-2">
                <select id="orderStatus" class="form-control">
                    <option value="none">Tìm trạng thái</option>
                    <option value="1">Chờ xữ lý</option>
                    <option value="2">Đã xữ lý</option>
                    <option value="3">Đã hủy</option>
                </select>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-12 mb-2">
                <button type="button" class="btn btn-primary w-100 filter-order" onclick="filterOrders()">Lọc</button>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-6 col-12 mb-2">
                <a href="#" class="btn btn-secondary w-100">Tải lại</a>
            </div>
        </div>

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
                    @if ($historys->count() > 0)
                    @foreach ($historys as $history )
                    <tr>
                        <td>
                            {{ $loop->iteration }}
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
                            {{$history->created_at}}
                        </td>
                        <td>
                            {{$history->order_status}}
                        </td>
                        <td>
                            <a href="{{URL::to('/view-history-order'.'/'.$history->order_code)}}">Xem</a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="8">
                            <h3>Không có đơn hàng nào được tìm thấy</h3>
                        </td>
                    </tr>
                    @endif




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