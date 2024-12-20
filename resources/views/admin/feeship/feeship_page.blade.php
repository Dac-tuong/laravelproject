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
                <td>{{ $feeships->matp_feeship }}</td>
                <td>{{ $feeships->maqh }}</td>
                <td>{{ $feeships->xaid }}</td>
                <td>{{ $feeships->feeship }}</td>
            </tr>
            @endforeach

        </tbody>


    </table>





</div>

@endsection