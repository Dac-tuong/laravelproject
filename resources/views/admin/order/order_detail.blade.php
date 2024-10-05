@extends('admin_layout')
@section('admin_content')
@php
$totalCart = 0; // Khởi tạo biến tổng tiền
@endphp
<!-- Tiêu đề trang -->
<div class="order-details-header">
    <div class="order-details-label">
        <h1>Chi tiết đơn hàng</h1>
    </div>
    <!-- Hành động-->
    <div class="order-details-action">
        <a href="order-list">Quay lại danh sách đơn hàng</a>
        <a href="{{URL::to('/print-order'.'/'.$orderShip->order_code)}}">In đơn hàng</a>
    </div>
</div>
<!-- Danh sách sản phẩm -->

<div class="col-sm-8">
    <div class="order-table">
        <h2>Sản phẩm trong đơn hàng</h2>
        <table>
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá tiền</th>
                    <th>Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detailOrder as $order)
                <tr>
                    <td>{{$order->product_name_order}}</td>
                    <td>{{$order->product_sale_quantity}}</td>
                    <td>{{ number_format($order->product_price, 0, ',', '.') }} VNĐ</td>
                    <td>
                        @php
                        $order_price_product= $order->product_price;
                        $order_quantity_sale = $order->product_sale_quantity;
                        $summary_product = $order_price_product* $order_quantity_sale;
                        $totalCart +=$summary_product;

                        @endphp
                        {{ number_format($summary_product, 0, ',', '.') }} VNĐ
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="order-summary">
        <h2>Tổng kết đơn hàng</h2>
        <p><strong>Tổng số lượng sản phẩm:</strong>
            {{$orderCount}}
        </p>
        <p><strong>Tổng tiền sản phẩm:</strong>{{ number_format($totalCart, 0, ',', '.') }} VNĐ</p>
        <p><strong>Giảm giá:</strong> {{$discountAmount }}</p>
        <p><strong>Phí vận chuyển:</strong> {{ number_format($orderShip->feeship, 0, ',', '.') }}VNĐ</p>
        <p><strong>Tổng cộng:</strong> {{ number_format($orderShip->order_total, 0, ',', '.') }} VNĐ</p>
    </div>
</div>

<!-- Tổng kết đơn hàng -->

<div class="col-sm-4">
    <div>
        <h2>Chỉnh sửa đơn hàng</h2>
        <form id="order-form" action="{{URL::to('/update-status-order')}}" method="POST">
            <label for="order-status">Cập nhật tình trạng đơn hàng:</label>
            <br>
            <select name="order-status" id="order-status">
                <option value="1">Chờ xử lý</option>
                <option value="2">Đã xác nhận</option>
                <option value="0">Đã hủy</option>
            </select>
            <br>
            <label for="order-note">Thêm ghi chú:</label>
            <textarea name="order-note" id="order-note" class="order-note"></textarea>
            <br>
            <button type="submit">Cập nhật</button>
        </form>
    </div>
    <!-- Thông tin đơn hàng -->
    <div class="order-info">
        <h2>Thông tin đơn hàng</h2>
        <p><strong>Mã đơn hàng:</strong> #{{$orderShip->order_code}}</p>
        <p><strong>Ngày đặt hàng:</strong> {{$orderShip->created_at}}</p>
        <p><strong>Tình trạng đơn hàng:</strong> Chờ xử lý</p>
        <p><strong>Phương thức thanh toán:</strong> Thẻ tín dụng</p>
        <p><strong>Ghi chú:</strong> {{$orderShip->order_note}}</p>
    </div>
    <!-- Thông tin khách hàng -->
    <div class="customer-info">
        <h2>Thông tin khách hàng</h2>
        <p><strong>Tên khách hàng:</strong>{{$orderShip->shippingAddress->fullname}}</p>
        <p><strong>Email:</strong> {{$orderShip->order_email}}</p>
        <p><strong>Số điện thoại:</strong> {{$orderShip->shippingAddress->order_phone}}</p>
    </div>
    <div class="shipping-address">
        <h2>Địa chỉ giao hàng</h2>
        <p><strong>Tỉnh/thành:</strong>{{$orderShip->shippingAddress->province->name}}</p>
        <p><strong>Quận Huyện:</strong> {{$orderShip->shippingAddress->districts->name}}</p>
        <p><strong>Xã/phường:</strong>{{$orderShip->shippingAddress->wards->name}}</p>
        <p><strong>Địa chỉ :</strong>{{$orderShip->shippingAddress->diachi}}</p>
    </div>
</div>




















@endsection