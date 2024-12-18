@extends('layout')
@section('content')
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="border-white">
            <div class="image-customer">
                <img class="avatar-customer" src="{{ URL::to('user/image/avatar-user.png') }}" alt="">
            </div>
            <div class="infomation-customer">
                <div class="flex-inline"><strong>Tên khách hàng:</strong><span>{{$informations->name_user}}</span>
                </div>
                <div class="flex-inline"><strong>Email:</strong><span>{{$informations->email_user}}</span></div>
                <div class="flex-inline"><strong>Số điện thoại:</strong><span>{{$informations->phone_user}}</span>
                </div>
                <div class="flex-inline"><strong>Địa chỉ:</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-8 col-sm-12">
        <div class="border-white">
            <div class="change-password">
                <form action="">
                    <div>
                        <label for="">Mật khẩu củ</label>
                        <input type="text" name="" id="old-password">
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection