@extends('layout')
@section('content')
<div class="col-lg-4 col-md-4 col-sm-12">
    <div class="frame-inforcustomer">
        <div class="image-customer position-relative">
            <img class="avatar-customer" src="{{ URL::to('user/image/avatar-user.png') }}" alt="">
        </div>
        <div class="infomation-customer position-relative">
            <div class="flex-inline"><strong>Tên khách hàng:</strong><span>{{$infocustomer->name_user}}</span></div>
            <div class="flex-inline"><strong>Email:</strong><span>{{$infocustomer->email_user}}</span></div>
            <div class="flex-inline"><strong>Số điện thoại:</strong><span>{{$infocustomer->phone_user}}</span></div>
            <div class="flex-inline"><strong>Địa chỉ:</strong>
                <span>
                    {{$address}}
                </span>
            </div>
        </div>

    </div>
</div>
@endsection