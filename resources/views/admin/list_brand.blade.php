@extends('admin_layout')
@section('admin_content')
<h1>Trang danh sách loại sản phẩm</h1>
<div class="table-wrapper">
    @php
    use Illuminate\Support\Facades\Session;

    $message_success = Session::get('message_success');
    if ($message_success) {
    echo '<p class="text-success">', $message_success, '</p>';
    Session::put('message_success', null);
    }
    @endphp
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Tên danh mục</th>
                <th>Hiển thị</th>
                <th>Quản lý</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $list_brand as $brand)


            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $brand->brand_name }}</td>
                <td>
                    <?php
                    if ($brand->brand_status == 0) {
                    ?>
                        <a href="{{URL::to('/inactive-brand'.'/'.$brand->brand_id)}}">Ẩn</a>
                    <?php
                    } else { ?>
                        <a href="{{URL::to('/active-brand'.'/'.$brand->brand_id)}}">Hiện</a>
                    <?php  } ?>
                <td><a href="{{URL::to('/edit-brand'.'/'.$brand->brand_id)}}">Sửa</a>/
                    <a href="{{URL::to('/delete-brand'.'/'.$brand->brand_id)}}">Xóa</a>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>

@endsection