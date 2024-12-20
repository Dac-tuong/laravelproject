@extends('admin_layout')
@section('admin_content')
<table>
    <thead>
        <tr>
            <td>Hình ảnh</td>
            <td>Tên banner</td>
            <td>Tên sản phẩm</td>
            <td>Trạng thái</td>
            <td>Tác vụ</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($banners as $banner)
        <tr>
            <th>
                <img src="{{ URL::to('uploads/slide/' . $banner->banner_image) }}" alt="" style="height: 100px;">
            </th>
            <th>
                {{$banner->name_banner}}
            </th>
            <th>
                {{$banner->product_banner->product_name}}
            </th>
            <th>
                {{$banner->status_banner}}
            </th>
            <th>
                <a href="">Sửa</a>/ <a href="">Xóa</a>
            </th>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection