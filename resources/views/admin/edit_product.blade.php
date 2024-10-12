@extends('admin_layout')
@section('admin_content')

<form action="{{URL::to('/update-product'.'/'.$products->product_id)}}" method="POST" enctype="multipart/form-data">
    <div class="col-sm-9">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Mã sản phẩm</label>
            <input type="text" name="product_code" required class="form-control" value="{{ $products->product_code }}">
        </div>
        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input type="text" name="product_name" data-slug-source="product-edit" required class="form-control"
                value="{{ $products->product_name }}">
        </div>
        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug_name_product" data-slug-target="product-edit" required class="form-control"
                value="{{ $products->name_product_slug }}">
        </div>
        <div class="form-group">
            <label>Giá</label>
            <input type="text" name="product_price" required class="form-control"
                value="{{ $products->product_price }}">
        </div>
        <div class="form-group">
            <label>Số lượng</label>
            <input type="text" name="product_quantity" required class="form-control"
                value="{{ $products->product_quantity }}">
        </div>

        <div class="form-group">
            <label>Loại sản phẩm</label>
            <select name="categories_product" class="form-control">
                @foreach ($cate_products as $key => $cate)
                @if ($cate->category_id == $products->categories_product)
                <option value="{{ $cate->category_id }}" selected>
                    {{ $cate->category_name }}
                </option>
                @else
                <option value="{{ $cate->category_id }}">{{ $cate->category_name }}
                </option>
                @endif
                @endforeach
            </select>

        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Thương hiệu</label>

            <select class="form-control" name="brand_product">
                @foreach ($brand_products as $key => $brand)
                @if ($brand->brand_id == $products->brand_product)
                <option value="{{ $brand->brand_id }}" selected>{{ $brand->brand_name }}
                </option>
                @else
                <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                @endif
                @endforeach
            </select>
        </div>


    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <h4>Hình ảnh</h4>
            <img src="{{ URL::to('uploads/product/' . $products->product_image) }}"
                style="height: 100px; width: 150px;">
            <input type="file" class="form-control" name="product_image">
        </div>

        <div class="form-group">
            <h4>Hình ảnh trưng bày</h4>
            @if($products && $products->galleries->count())
            <div class="gallery">
                @foreach($products->galleries as $gallery)
                <img src=" {{ URL::to('uploads/product/' . $gallery->gallery_path) }}" style="height: 80px;"
                    alt="Product Image">
                @endforeach
            </div>
            @else
            <p>No images available.</p>
            @endif


            <input type="file" name="gallery[]" multiple>
        </div>
    </div>
    <div class="col-sm-12">
        <button type="submit" name="update" class="btn btn-primary">Cập nhật</button>
    </div>

</form>


@endsection