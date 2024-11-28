@extends('layout')
@section('content')


<div class="breadcrumbs">
    <a href="{{ URL::to('/') }}">Trang chủ /</a>
    <a href="{{ URL::to('/history-order') }}">Lịch sử mua hàng /</a>
    #9999
</div>
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-12">
        <div class="border border-white">
            <div class="d-flex">
                <span class="me-3">11/11/2222</span>
                <span class="me-3">#9999</span>
            </div>
            <table class="table-cart">
                <tbody>
                    @foreach ($order_infomations as $info)
                    <tr>
                        <td>
                            <div class="d-flex mb-2">
                                <div class="flex-shrink-0">
                                    <img src="https://www.bootdey.com/image/280x280/87CEFA/000000" alt="" width="35"
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
                        <td class="text-end"></td>
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
                            {{$discount_num}}
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
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="border border-white">
            <!-- Nội dung của cột nhỏ -->
        </div>
    </div>
</div>


@endsection