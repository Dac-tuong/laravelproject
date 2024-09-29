@extends('admin_layout')
@section('admin_content')

<!-- Tiêu đề trang -->
<div class="order-details-header">
    <div class="order-details-label">
        <h1>Chi tiết đơn hàng</h1>
    </div>
    <!-- Hành động-->
    <div class="order-details-action">
        <a href="order-list">Quay lại danh sách đơn hàng</a>
        <button onclick="printInvoice()">In hóa đơn</button>
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
                    <td>{{$order->product_name}}</td>
                    <td>{{$order->product_sale_quantity}}</td>
                    <td>{{ number_format($order->product_price, 0, ',', '.') }} VNĐ</td>
                    <td>
                        @php
                        $order_price_product= $order->product_price;
                        $order_quantity_sale = $order->product_sale_quantity;
                        $summary_product = $order_price_product* $order_quantity_sale;
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
        <p><strong>Tổng tiền sản phẩm:</strong> 1,200,000 VND</p>
        <p><strong>Phí vận chuyển:</strong> 50,000 VND</p>
        <p><strong>Tổng cộng:</strong> {{ number_format($orderShip->order_total, 0, ',', '.') }} VNĐ</p>
    </div>
</div>

<!-- Tổng kết đơn hàng -->

<div class="col-sm-4">
    <div>
        <h2>Chỉnh sửa đơn hàng</h2>
        <form action="update-order-status" method="POST">
            <label for="order-status">Cập nhật tình trạng đơn hàng:</label>
            <br>
            <select name="order-status" id="order-status">
                <option value="processing">Chờ xử lý</option>
                <option value="completed">Đã hoàn thành</option>
                <option value="canceled">Đã hủy</option>
            </select>
            <br>
            <button type="submit">Cập nhật</button>
        </form>
        <form action="add-order-note" method="POST">
            <label for="order-note">Thêm ghi chú:</label>
            <textarea name="order-note" class="order-note"></textarea>
            <button type="submit">Thêm ghi chú</button>
        </form>
    </div>
    <!-- Thông tin đơn hàng -->
    <div class="order-info">
        <h2>Thông tin đơn hàng</h2>
        <p><strong>Mã đơn hàng:</strong> #{{$orderShip->order_code}}</p>
        <p><strong>Ngày đặt hàng:</strong> {{$orderShip->created_at}}</p>
        <p><strong>Tình trạng đơn hàng:</strong> Chờ xử lý</p>
        <p><strong>Phương thức thanh toán:</strong> Thẻ tín dụng</p>
        <p><strong>Ghi chú:</strong> Giao nhanh nha</p>
    </div>
    <!-- Thông tin khách hàng -->
    <div class="customer-info">
        <h2>Thông tin khách hàng</h2>
        <p><strong>Tên khách hàng:</strong> Nguyễn Văn A</p>
        <p><strong>Email:</strong> nguyen.vana@example.com</p>
        <p><strong>Số điện thoại:</strong> 0123456789</p>
        <p><strong>Địa chỉ giao hàng:</strong> 123 Đường ABC, Quận 1, TP.HCM</p>
    </div>
</div>




















@endsection