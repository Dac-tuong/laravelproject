@extends('layout')
@section('content')
<div class="border-white">
    <div class="breadcrumb">
        <a href="{{ URL::to('/') }}">Trang chủ </a>/
        <a href="{{ URL::to('/wishlist') }}">Danh sách yêu thích</a>
    </div>
</div>


@endsection