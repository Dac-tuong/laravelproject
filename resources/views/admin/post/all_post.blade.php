@extends('admin_layout')
@section('admin_content')
<h2>Tất cả bài viết</h2>
<table>
    <thead>
        <tr>
            <td>
                #
            </td>
            <td>
                Tên bài viết
            </td>
            <td>
                Nội dung bài viết
            </td>
            <td>
                Tóm tắt
            </td>
            <td>Tác vụ</td>
        </tr>
    </thead>
    <tbody>

        @foreach ($all_post as $post)
        <tr>
            <td>{{ $loop->iteration }}</td>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection