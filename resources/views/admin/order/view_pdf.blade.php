<!DOCTYPE html>
<html>

<head>
    <title>Thông tin đơn hàng</title>
    <style>
    body {
        font-family: DejaVu Sans;
    }

    h1 {
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }
    </style>
</head>

<body>
    <h1>Thông tin đơn hàng</h1>

    <p>Mã đơn hàng: {{ $order->order_code }}</p>
    <p>Khách hàng: {{ $order->customer_name }}</p>
    <p>Địa chỉ giao hàng: {{ $order->shippingAddress->address }}</p>
    <p>Ngày đặt hàng: {{ $order->created_at }}</p>
    <p>Tổng số lượng sản phẩm: {{ $order_count_quantity }}</p>
    <p>Tổng tiền: {{ number_format($order->total_price, 0, ',', '.') }} VNĐ</p>
    <p>Giảm giá: {{ $discount_amount }}</p>

    <h2>Chi tiết sản phẩm</h2>
    <table>
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá bán</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</body>

</html>