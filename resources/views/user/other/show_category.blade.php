@extends('layout')
@section('content')
<div class="breadcrumbs">
    <a href="{{ URL::to('/') }}">Trang chủ /</a>
    <a href="{{ URL::to('/show-brand-user'.'/' . $brand->brand_id ) }}">{{$brand->brand_name}}</a>
</div>
<h1>Danh sách sản phẩm</h1>

<form id="filterForm" method="GET" action="{{ route('brand.show', $brand->brand_id) }}">
    <!-- Lọc RAM -->
    <select id="filter_mobile_ram" name="filter_mobile_ram" onchange="applyFilter()">
        <option value="">Chọn RAM</option>
        <option value="<4" {{ request('filter_mobile_ram') == '<4' ? 'selected' : '' }}>Dưới 4GB</option>
        <option value="4gb_8gb" {{ request('filter_mobile_ram') == '4gb_8gb' ? 'selected' : '' }}>4GB - 8GB</option>
        <option value="8gb_12gb" {{ request('filter_mobile_ram') == '8gb_12gb' ? 'selected' : '' }}>8GB - 12GB</option>
        <option value=">12gb" {{ request('filter_mobile_ram') == '>12gb' ? 'selected' : '' }}>Trên 12GB</option>
    </select>

    <!-- Sắp xếp theo giá -->
    <select id="sort_by" name="sort_by" onchange="applyFilter()">
        <option value="">Sắp xếp theo</option>
        <option value="tang_dan" {{ request('sort_by') == 'tang_dan' ? 'selected' : '' }}>Giá tăng dần</option>
        <option value="giam_dan" {{ request('sort_by') == 'giam_dan' ? 'selected' : '' }}>Giá giảm dần</option>
        <option value="tu_az" {{ request('sort_by') == 'tu_az' ? 'selected' : '' }}>Từ A - Z</option>
        <option value="tu_za" {{ request('sort_by') == 'tu_za' ? 'selected' : '' }}>Từ Z - A</option>
    </select>
</form>

@endsection