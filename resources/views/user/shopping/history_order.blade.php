@extends('layout')
@section('content')
<div class="border-white">
    Trang chủ/ thông tin cá nhân/ Lịch sử đơn hàng
</div>

<div class="history-order-content">
    <div class="history-order-title mb-3">
        <h4 class="title-history">
            LỊCH SỬ MUA HÀNG CỦA BẠN
        </h4>
        <div class="toggle-view">
            <span class="toggle-title">Hiển thị theo</span>
            <img src="" alt="">
            <span class="type-view">Dạng thẻ</span>
        </div>
    </div>

    <div class="filler-order">
        <form action="" class="filler-order-form">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 mb-2">
                    <input type="text" placeholder="Mã đơn hàng" class="form-control">
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 mb-2">
                    <input type="date" placeholder="Ngày mua hàng" class="form-control">
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 mb-2">
                    <select name="" id="" class="form-control">
                        <option value="">Chờ xữ lý</option>
                        <option value="">Đã xữ lý</option>
                        <option value="">Đã hủy</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 mb-2">
                    <a href="" class="form-control">Tải lại</a>
                </div>
            </div>
        </form>
    </div>

    <div class="list-history-order">
        <div class="table-view">
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
                            Tên khách hàng
                        </th>
                        <th>
                            Thời gian mua
                        </th>
                        <th>
                            Tác vụ
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            1
                        </td>
                        <td>
                            0921asewssd
                        </td>
                        <td>
                            Nguyễn Văn A
                        </td>
                        <td>
                            11/11/1111
                        </td>
                        <td>
                            <a href="">Xem</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="grid-view">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="border-white"></div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection