@extends('admin_layout')
@section('admin_content')
<h1>Trang danh sách loại sản phẩm</h1>
<div class="table-wrapper">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Tên danh mục</th>
                <th>Hiển thị</th>

            </tr>
        </thead>
        <tbody>
            @foreach($cate_posts as $cate_post)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $cate_post->tenloaibaiviet }}</td>
                <td>

                    <?php
                    if ($cate_post->status_post == 0) {
                    ?>
                        <a href="{{URL::to('/inactive-cate-post'.'/'.$cate_post->id_loaibaiviet)}}">Ẩn</a>
                    <?php
                    } else { ?>
                        <a href="{{URL::to('/active-cate-post'.'/'.$cate_post->id_loaibaiviet)}}">Hện</a>
                    <?php  } ?>
                </td>



            </tr>
            @endforeach


        </tbody>
    </table>
</div>

@endsection