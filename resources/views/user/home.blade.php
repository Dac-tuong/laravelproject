@extends('layout')
@section('content')
<div class="home-product">
    <div class="left-contaner">
        <div class="filter-item">
            <b>Dung lượng ram</b><br>
            <label>
                <input type="checkbox" name="filter_mobile_ram" value="<4"
                    {{ in_array('<4', explode(',', request()->get('filter_mobile_ram', ''))) ? 'checked' : '' }}
                    onchange="updateCheckboxFilter('filter_mobile_ram', this)">
                --Nhỏ hơn 4GB--
            </label><br>
            <label>
                <input type="checkbox" name="filter_mobile_ram" value="4gb_8gb"
                    {{ in_array('4gb_8gb', explode(',', request()->get('filter_mobile_ram', ''))) ? 'checked' : '' }}
                    onchange="updateCheckboxFilter('filter_mobile_ram', this)">
                --4GB-8GB--
            </label>
            <br>
            <label>
                <input type="checkbox" name="filter_mobile_ram" value="8gb_12gb"
                    {{ in_array('8gb_12gb', explode(',', request()->get('filter_mobile_ram', ''))) ? 'checked' : '' }}
                    onchange="updateCheckboxFilter('filter_mobile_ram', this)">
                --8GB-12GB--
            </label><br>
            <label>
                <input type="checkbox" name="filter_mobile_ram" value=">12gb"
                    {{ in_array('>12gb', explode(',', request()->get('filter_mobile_ram', ''))) ? 'checked' : '' }}
                    onchange="updateCheckboxFilter('filter_mobile_ram', this)">
                -- lớn hơn 12GB--
            </label>
        </div>

        <div class="filter-item">
            <b>Bộ nhớ trong</b>
            <br>
            <label>
                <input type="checkbox" name="filter_mobile_stogare" value="128"
                    {{ in_array('128', explode(',', request()->get('filter_mobile_stogare', ''))) ? 'checked' : '' }}
                    onchange="updateCheckboxFilter('filter_mobile_stogare', this)">
                128GB
            </label><br>
            <label>
                <input type="checkbox" name="filter_mobile_stogare" value="256"
                    {{ in_array('256', explode(',', request()->get('filter_mobile_stogare', ''))) ? 'checked' : '' }}
                    onchange="updateCheckboxFilter('filter_mobile_stogare', this)">
                256GB
            </label>

        </div>

        <div class="filter-item">
            <b>Loại điện thoại</b>
            <br>
            @foreach ($categorys as $category )
            <label>
                <input type="checkbox" name="filter_mobile" value="{{$category->category_id}}"
                    {{ in_array($category->category_id, explode(',', request()->get('filter_mobile', ''))) ? 'checked' : '' }}
                    onchange="updateCheckboxFilter('filter_mobile', this)">
                {{$category->category_name}}
            </label><br>
            @endforeach
        </div>

        <div class="filter-item">
            <b>Tần số quét</b>
            <br>
            @foreach ($categorys as $category )
            <label>
                <input type="checkbox" name="filter_mobile" value="{{$category->category_id}}"
                    {{ in_array($category->category_id, explode(',', request()->get('filter_mobile', ''))) ? 'checked' : '' }}
                    onchange="updateCheckboxFilter('filter_mobile', this)">
                {{$category->category_name}}
            </label><br>
            @endforeach
        </div>

        <div class="filter-item">
            <b>Tần số quét</b>
            <br>
            @foreach ($refresh_rates as $refresh_rate )
            <label>
                <input type="checkbox" name="filter_mobile" value="{{$refresh_rate->refresh_rate}}"
                    {{ in_array($refresh_rate->refresh_rate, explode(',', request()->get('filter_mobile', ''))) ? 'checked' : '' }}
                    onchange="updateCheckboxFilter('filter_mobile', this)">
                {{$refresh_rate->refresh_rate}}
            </label><br>
            @endforeach
        </div>
        <div class="slider-range">
            <p>
                <label for="amount">Target sales goal (Millions):</label>
                <input type="text" id="amount" readonly="" style="border:0; color:#f6931f; font-weight:bold;">
            </p>
            <form action="">
                <div id="slider-range" style="height:10px;"></div>
                <input type="hidden" id="start_price" name="start_price">
                <input type="hidden" id="to_price" name="to_price">
                <button name="filter_price" value="Lọc giá theo">Áp dụng</button>
            </form>
        </div>


    </div>
    <div class="body-content">
        <div class="sort">
            <label for="">sắp xếp</label>
            <select name="sort_by" id="sort_by" onchange="updateFilter('sort_by', this.value)">
                <option value="none" {{ request()->get('sort_by') == 'none' ? 'selected' : '' }}>--Sắp xếp--
                </option>
                <option value="tang_dan" {{ request()->get('sort_by') == 'tang_dan' ? 'selected' : '' }}>--
                    Giá tăng
                    dần--</option>
                <option value="giam_dan" {{ request()->get('sort_by') == 'giam_dan' ? 'selected' : '' }}>--
                    Giá giảm
                    dần--</option>
            </select>
        </div>
        <h3>SẢN PHẨM MỚI NHẤT</h3>
        <div class="row">
            @foreach ($products as $key => $product)
            <div class="col-lg-3 col-md-3 col-sm-12 col-12" style="padding-bottom: 12px;">
                <div class="product-content">
                    <!-- Link đến trang chi tiết sản phẩm -->
                    <div class="thumbnail-product-img">
                        <img class="home-product-img" src="{{ URL::to('uploads/product/' . $product->product_image) }}"
                            alt="" />
                    </div>
                    <h5 class="productinfo__name">
                        <a class="link-product"
                            href="{{ URL::to('/detail-product'.'/' . $product->product_id) }}">{{ $product->product_name }}
                        </a>
                    </h5>
                    <div class="productinfo__price">
                        @if ($product->old_price > 0)
                        <span class="productinfo__price-old">
                            {{ number_format($product->old_price, 0, ',', '.') }}đ
                        </span>
                        @endif

                        <span class="productinfo__price-current">
                            {{ number_format($product->sale_price, 0, ',', '.') }}đ
                        </span>

                    </div>
                    <div class=" productinfo__origin">
                        <span class="productinfo__origin-brand">{{$product->brand->brand_name}}</span>
                    </div>
                    <!-- Nút thêm vào giỏ hàng -->
                    <div class="action-buttons">
                        <form>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" autocomplete>
                            <!-- Input ẩn để lưu trữ thông tin sản phẩm -->
                            <input type="hidden" value="{{ $product->product_id }}"
                                class="product_id_{{ $product->product_id }}">
                            <input type="hidden" value="{{ $product->product_name }}"
                                class="product_name_{{ $product->product_id }}">
                            <input type="hidden" value="{{ $product->product_image }}"
                                class="product_image_{{ $product->product_id }}">
                            <input type="hidden" value="{{ $product->sale_price }}"
                                class="product_price_{{ $product->product_id }}">
                            <input type="hidden" value="{{ $product->color }}"
                                class="product_color_{{ $product->product_id }}">
                            <input type="hidden" value="1" class="cart_product_qty_{{ $product->product_id }}">
                            <button class="add-to-cart" data-id_product="{{ $product->product_id }}" name="add-to-cart">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </button>
                        </form>
                    </div>

                    @if ($product->old_price > 0)
                    <div class="product__price--percent">
                        <p class="product__price--percent-detail">
                            @php
                            $percent_discount = (($product->old_price - $product->sale_price) / $product->old_price)
                            *
                            100;
                            echo ceil($percent_discount) . '%'
                            @endphp
                        </p>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
            <!-- Hiển thị liên kết phân trang tùy chỉnh -->

        </div>
    </div>
</div>

@endsection