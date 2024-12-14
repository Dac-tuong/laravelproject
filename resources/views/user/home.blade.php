@extends('layout')
@section('content')
<div class="home-product">
    <div class="left-contaner">
        <h3>DANH MỤC THƯƠNG HIỆU</h3>
        <div class="brand-container">
            @foreach ($brands as $brand)
            <div class="brand-item">
                <a href="{{URL::to('/show-brand-user'.'/'.$brand->brand_id)}}">{{$brand->brand_name}}</a>
            </div>
            @endforeach
        </div>
        <!-- <div>
            <label for="">filter_mobile_ram</label>
            <select name="filter_mobile_ram" id="filter_mobile_ram" class="form-control"
                onchange="updateFilter('filter_mobile_ram', this.value)">
                <option value="none" {{ request()->get('filter_mobile_ram') == 'none' ? 'selected' : '' }}>--Lọc
                    theo--</option>
                <option value="<4" {{ request()->get('filter_mobile_ram') == '<4' ? 'selected' : '' }}>--Nhỏ hơn
                    4GB--</option>
                <option value="4gb_8gb" {{ request()->get('filter_mobile_ram') == '4gb_8gb' ? 'selected' : '' }}>
                    --4GB-8GB--
                </option>
            </select>

        </div> -->


    </div>
    <div class="body-content">
        <div>
            <label for="">SORT BY</label>
            <select name="sort_by" id="sort_by" class="form-control" onchange="updateFilter('sort_by', this.value)">
                <option value="none" {{ request()->get('sort_by') == 'none' ? 'selected' : '' }}>--Lọc theo--
                </option>
                <option value="tang_dan" {{ request()->get('sort_by') == 'tang_dan' ? 'selected' : '' }}>--Lọc theo
                    giá tăng
                    dần--</option>
                <option value="giam_dan" {{ request()->get('sort_by') == 'giam_dan' ? 'selected' : '' }}>--Lọc theo
                    giá giảm
                    dần--</option>
            </select>
        </div>
        <h3>SẢN PHẨM MỚI NHẤT</h3>
        <div class="row">
            @foreach ($products as $key => $product)
            <div class="col-lg-4 col-md-4 col-sm-12 col-12" style="padding-bottom: 12px;">
                <div class="product-content">
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

                        <!-- Link đến trang chi tiết sản phẩm -->
                        <a class="link-product" href="{{ URL::to('/detail-product'.'/' . $product->product_id) }}">
                            <img class="home-product-img"
                                src="{{ URL::to('uploads/product/' . $product->product_image) }}" alt="" />
                            <h5 class="productinfo__name">{{ $product->product_name }}</h5>
                            <div class=" productinfo__price">
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
                                <span class="productinfo__origin-brand">{{$product->brand_name}}</span>
                            </div>
                        </a>

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
                        <!-- Nút thêm vào giỏ hàng -->
                        <div class="action-buttons">
                            <button type="button" class="add-to-cart" data-id_product="{{ $product->product_id }}"
                                name="add-to-cart">
                                <img class="btn-cart" src="{{ URL::to('user/image/cart-btn.png' ) }}" alt="">
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
            <!-- Hiển thị liên kết phân trang tùy chỉnh -->

        </div>
    </div>
</div>

@endsection