@extends('admin_layout')
@section('admin_content')
<h1>
    Trang phí giao hàng
</h1>

<div class="col-sm-5" style="border:1px solid black;">
    <form>
        @csrf
        <div>
            <label for="">Tỉnh/Thành phố</label>
            <select name="province" id="province">
                <option value="">Chọn tỉnh</option>
                @foreach($provinces as $province)
                <option value="{{ $province->matp }}">{{ $province->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit" name="add-feeship" id="add-feeship">Thêm giá vận chuyển</button>
        </div>
    </form>

</div>
<div class="col-sm-7">
    <table>
        <thead>
            <!-- <tr>
                <th colspan="10">
                    <h3>Danh sách phí vận chuyển</h3>
                </th>
            </tr> -->
            <tr>
                <th>#</th>
                <th>mã thành phố</th>
                <th>mã quận huyện</th>
                <th>xã id</th>
                <th>Số tiền vận chuyển</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feeship_list as $feeships )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $feeships->matp }}</td>
                <td>{{ $feeships->maqh }}</td>
                <td>{{ $feeships->xaid }}</td>
                <td>{{ $feeships->feeship }}</td>
            </tr>
            @endforeach

        </tbody>


    </table>


    <div class="pagination">
        @if ($feeship_list->onFirstPage())
        <span>&laquo; Previous</span>
        @else
        <a href="{{ $feeship_list->previousPageUrl() }}" rel="prev">&laquo; Previous</a>
        @endif

        @php
        $currentPage = $feeship_list->currentPage();
        $lastPage = $feeship_list->lastPage();
        $start = max(1, $currentPage - 4); // Bắt đầu từ 4 trang trước trang hiện tại
        $end = min($lastPage, $currentPage + 5); // Kết thúc 5 trang sau trang hiện tại
        @endphp

        @if ($start > 1)
        <a href="{{ $feeship_list->url(1) }}">1</a>
        @if ($start > 2)
        <span>...</span>
        @endif
        @endif

        @for ($page = $start; $page <= $end; $page++) @if ($page==$currentPage) <span>{{ $page }}</span>
            @else
            <a href="{{ $feeship_list->url($page) }}">{{ $page }}</a>
            @endif
            @endfor

            @if ($end < $lastPage) @if ($end < $lastPage - 1) <span>...</span>
                @endif
                <a href="{{ $feeship_list->url($lastPage) }}">{{ $lastPage }}</a>
                @endif

                @if ($feeship_list->hasMorePages())
                <a href="{{ $feeship_list->nextPageUrl() }}" rel="next">Next &raquo;</a>
                @else
                <span>Next &raquo;</span>
                @endif
    </div>


</div>

@endsection