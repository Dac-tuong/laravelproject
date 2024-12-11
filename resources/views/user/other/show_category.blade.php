@extends('layout')
@section('content')
<div class="breadcrumbs">
    <a href="{{ URL::to('/') }}">Trang chủ /</a>

</div>
<h1>Danh sách sản phẩm</h1>

<form action="" class="form-group">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" autocomplete>

    <label for="">SORT BY</label>
    <select name="sort_by" id="sort_by" class="form-control" onchange="updateFilter('sort_by', this.value)">
        <option value="none" {{ request()->get('sort_by') == 'none' ? 'selected' : '' }}>--Lọc theo--</option>
        <option value="tang_dan" {{ request()->get('sort_by') == 'tang_dan' ? 'selected' : '' }}>--Lọc theo giá tăng
            dần--</option>
        <option value="giam_dan" {{ request()->get('sort_by') == 'giam_dan' ? 'selected' : '' }}>--Lọc theo giá giảm
            dần--</option>
    </select>

    <label for="">filter_mobile_ram</label>
    <select name="filter_mobile_ram" id="filter_mobile_ram" class="form-control"
        onchange="updateFilter('filter_mobile_ram', this.value)">
        <option value="none" {{ request()->get('filter_mobile_ram') == 'none' ? 'selected' : '' }}>--Lọc theo--</option>
        <option value="<4" {{ request()->get('filter_mobile_ram') == '<4' ? 'selected' : '' }}>--Nhỏ hơn 4GB--</option>
        <option value="4gb_8gb" {{ request()->get('filter_mobile_ram') == '4gb_8gb' ? 'selected' : '' }}>--4GB-8GB--
        </option>
    </select>
</form>

<div>
    @foreach ($products_by_brand as $produts)
    <div>
        <h6>{{$produts->product_name}}</h6>
        <span>{{$produts->ram}}</span>
        <span>{{$produts->sale_price}}</span>
    </div>
    @endforeach
</div>


@endsection