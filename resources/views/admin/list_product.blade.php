@extends('admin_layout')
@section('admin_content')
<h1>Trang danh sách loại sản phẩm</h1>
<div class="table-wrapper">
    <?php

    use Illuminate\Support\Facades\Session;

    $message_success = Session::get('message_success');
    if ($message_success) {
        echo '<p class="text-success" >',  $message_success, '</p>';
        Session::put('message_success', null);
    }
    ?>
    <!-- Advanced Tables -->
    <div class="panel panel-default">
        <div class="panel-heading">
            Advanced Tables
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Mã sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Loại</th>
                            <th>Hãng</th>
                            <th>Trạng thái</th>
                            <th>Quản lý</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $product )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$product->product_code}}</td>
                            <td><img src="{{ URL::to('uploads/product/' . $product->product_image) }}" alt=""
                                    style="height: 100px;"></td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->product_price}}</td>
                            <td>{{$product->product_quantity}}</td>
                            <td>{{$product->category->category_name}}</td>
                            <td>{{$product->brand->brand_name}}</td>
                            <td> <?php
                                    if ($product->product_status == 0) {
                                    ?>
                                <a href="{{URL::to('/inactive-product'.'/'.$product->product_id)}}"><i
                                        class="fa-solid fa-thumbs-down"></i></a>
                                <?php
                                    } else { ?>
                                <a href="{{URL::to('/active-product'.'/'.$product->product_id)}}"><i
                                        class="fa-solid fa-thumbs-up"></i></a>
                                <?php  } ?>
                            </td>
                            <td><a href="{{URL::to('/edit-product'.'/'.$product->product_id)}}">Sửa</a>/
                                <a href="{{URL::to('/delete-product'.'/'.$product->product_id)}}">Xóa</a>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <!--End Advanced Tables -->
</div>

@endsection