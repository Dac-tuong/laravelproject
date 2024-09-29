@extends('admin_layout')
@section('admin_content')
<?php

use Illuminate\Support\Facades\Session;

$message_success = Session::get('message_success');
if ($message_success) {
    echo '<p class="text-success" >', $message_success, '</p>';
    Session::put('message_success', null);
}
?>

<form action="{{URL::to('/save-product')}}" method="POST" enctype="multipart/form-data">
    <div class="col-sm-9">
        {{csrf_field()}}
        <div class="form-group">
            <label>Mã sản phẩm</label>
            <input type="text" class="form-control" name="product_code" placeholder="Nhập mã Sản phẩm" required>
        </div>
        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input type="text" class="form-control name-product" name="product_name" placeholder="Nhập tên Sản phẩm"
                required>
        </div>
        <div class="form-group">
            <label>Slug tên</label>
            <input type="text" class="form-control slug-name" name="slug_name" placeholder="slug tên" required>
        </div>
        <div class="form-group">
            <label>Giá</label>
            <input type="text" class="form-control" name="product_price" placeholder="Nhập giá Sản phẩm" required>
        </div>
        <div class="form-group">
            <label>Số lượng</label>
            <input type="text" class="form-control" name="product_quantity" placeholder="Nhập số lượng Sản phẩm"
                required>
        </div>

        <div class="form-group">
            <label>Loại</label>
            <select name="categories_product" class="form-control" required>
                <option value="">
                    -- Chọn Loại --
                </option>
                @foreach($cate_product as $index => $cate)
                <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group">
            <label>Hãng</label>
            <select name="brand_product" class="form-control" required>
                <option value="">
                    -- Chọn Hãng --
                </option>
                @foreach($brand_product as $index => $brand)
                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Tình Trạng</label>
            <select name="product_status" class="form-control">
                <option value="1">Hiện</option>
                <option value="0">Ẩn</option>
            </select>
        </div>

    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label>Ảnh đại diện</label>
            <input type="file" class="form-control" name="product_image">
        </div>
        <div class="form-group">
            <label>Danh mục ảnh</label>
            <input type="file" name="gallery[]" multiple>
        </div>
    </div>
    <div class="col-sm-12">
        <button type="submit" name="add" class="btn btn-primary">Submit</button>
    </div>


</form>


@endsection