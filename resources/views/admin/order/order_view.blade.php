@extends('admin_layout')
@section('admin_content')

<table>
    <thead>
        <tr>
            <th colspan="10">
                <h3>Danh sách đơn hàng</h3>
            </th>
        </tr>
        <tr>
            <th>#</th>
            <th>Mã đơn hàng</th>
            <th>Tên khách hàng</th>
            <th>Số tiền đơn hàng</th>
            <th>Ngày mua</th>
            <th>Tình trạng đơn</th>
            <th>Chi tiết</th>

        </tr>
    </thead>
    <tbody>
        @foreach($lsOrder as $order)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                <a href="{{URL::to('/view-detail'.'/'.$order->order_code)}}">{{ $order->order_code }}</a>
            </td>
            <td>{{ $order->shippingAddress->fullname ?? 'N/A' }}</td>
            <td>{{ $order->order_total }}</td>
            <td>{{ $order->created_at }}</td>
            <td>
                @if ( $order->order_status == 1)
                Đang xữ lý
                @elseif($order->order_status == 3)
                Không xữ lý
                @elseif($order->order_status == 2)
                Đã xác nhận đơn
                @endif
            </td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection