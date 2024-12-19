@extends('admin_layout')
@section('admin_content')
<table>
    <thead>
        <tr>
            <td>Số thứ tự</td>
            <td>Tên người dùng</td>
            <td>Bình luận</td>
            <td>Trả lời</td>

        </tr>
    </thead>
    <tbody>
        @foreach ($comments as $comment)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                {{$comment->cmt_name->name_user}}
            </td>
            <td>
                {{$comment->comment_text}}
            </td>

            <td>
                <form action="">
                    <textarea name="" id="">
                    {{$comment->rep_comment}}
                    </textarea>
                    <br>
                    <button>Trả lời bình luận</button>
                </form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

<!-- Hiển thị liên kết phân trang tùy chỉnh -->
<div class="pagination justify-content-center">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <!-- Previous Page Link -->
            @if ($comments->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">&laquo; Previous</span>
            </li>
            @else
            <li class="page-item">
                <a class="page-link" href="{{ $comments->previousPageUrl() }}" rel="prev">&laquo;
                    Previous</a>
            </li>
            @endif

            <!-- Page Number Links -->
            @foreach ($comments->getUrlRange(1, $comments->lastPage()) as $page => $url)
            @if ($page == $comments->currentPage())
            <li class="page-item active">
                <span class="page-link">{{ $page }}</span>
            </li>
            @else
            <li class="page-item">
                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
            </li>
            @endif
            @endforeach

            <!-- Next Page Link -->
            @if ($comments->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $comments->nextPageUrl() }}" rel="next">Next &raquo;</a>
            </li>
            @else
            <li class="page-item disabled">
                <span class="page-link">Next &raquo;</span>
            </li>
            @endif
        </ul>
    </nav>
</div>

<!-- Hiển thị liên kết phân trang tùy chỉnh -->
@endsection