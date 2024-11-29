@extends('layout')
@section('content')


<div class="breadcrumbs">
    <a href="{{ URL::to('/') }}">Trang chủ /</a>
    <a href="{{ URL::to('/history-order') }}">Lịch sử mua hàng /</a>
    {{$order_historys->order_code}}
</div>
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-12">
        <div class="border-white">
            <div class="d-flex">
                <span class="me-3">{{$order_historys->created_at}}</span>
                <span class="me-3"> {{$order_historys->order_code}}</span>
            </div>
            <table class="table-cart">
                <tbody>
                    @foreach ($order_infomations as $info)
                    <tr style="font-size: 18px;">
                        <td>
                            <div class="d-flex mb-2">
                                <div class="flex-shrink-0">
                                    <img src="{{ URL::to('uploads/product/'.$info->image ) }}" alt="" width="35"
                                        class="img-fluid">
                                </div>
                                <div class="flex-lg-grow-1 ms-3">
                                    <h6 class="small mb-0">
                                        <a href="#" class="text-reset">{{$info->product_name_order}}</a>
                                    </h6>
                                    <span class="small">Color: Black</span>
                                </div>
                            </div>
                        </td>
                        <td>{{$info->product_sale_quantity}}</td>
                        <td class="text-end"> {{ number_format($info->product_price, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2">
                            Tổng đơn hàng
                        </td>
                        <td class="text-end">{{number_format($grandTotal, 0, ',', '.') . ' VNĐ';}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Phí vận chuyển
                        </td>
                        <td class="text-end"> {{ number_format($order_historys->feeship, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Giảm giá
                        </td>
                        <td class="text-end">
                            {{$discount_price}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Tổng cộng
                        </td>
                        <td class="text-end">
                            {{ number_format($order_historys->order_total, 0, ',', '.') }}
                        </td>
                    </tr>


                </tfoot>
            </table>
        </div>
        <div class="border-white">
            <h2>Thông tin khách hàng</h2>
            <p><strong>Tên khách hàng:</strong> {{$order_historys->shippingAddress->fullname}}</p>
            <p><strong>Email:</strong> {{$order_historys->order_email}}</p>
            <p><strong>Số điện thoại:</strong> {{$order_historys->shippingAddress->order_phone}}</p>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="border-white">
            <h6>Ghi chú khách hàng</h6>
            <p>{{$order_historys->order_note}}</p>
        </div>
        <div class="border-white">
            <h6>Địa chỉ giao hàng</h6>
            <p><strong>Tỉnh/thành:</strong> {{$order_historys->shippingAddress->province->name}}</p>
            <p><strong>Quận Huyện:</strong> {{$order_historys->shippingAddress->districts->name}}</p>
            <p><strong>Xã/phường:</strong> {{$order_historys->shippingAddress->wards->name}}</p>
            <p><strong>Địa chỉ :</strong> {{$order_historys->shippingAddress->diachi}}</p>
        </div>
    </div>
</div>


@endsection