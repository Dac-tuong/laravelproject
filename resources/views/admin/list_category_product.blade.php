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
            @foreach($list_category_product as $index => $cate_pro)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $cate_pro->category_name }}</td>
                <td>
                    <?php
                    if ($cate_pro->category_status == 0) {
                    ?>
                        <a href="{{URL::to('/inactive-cate-product'.'/'.$cate_pro->category_id)}}">Ẩn</a>
                    <?php
                    } else { ?>
                        <a href="{{URL::to('/active-cate-product'.'/'.$cate_pro->category_id)}}">Hện</a>
                    <?php  } ?>
                <td><a href="{{URL::to('/edit-category-product'.'/'.$cate_pro->category_id)}}">Sửa</a>/
                    <a href="{{URL::to('/delete-category-product'.'/'.$cate_pro->category_id)}}">Xóa</a>
                </td>
            </tr>
            @endforeach


        </tbody>
    </table>
</div>

@endsection