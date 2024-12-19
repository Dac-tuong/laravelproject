@extends('admin_layout')
@section('admin_content')
<h1>Dashboard</h1>

<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-red set-icon">
                <i class="fa fa-envelope-o"></i>
            </span>
            <div class="text-box">
                <p class="main-text"> New</p>
                <p class="text-muted">Bình luận</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-green set-icon">
                <i class="fa fa-bars"></i>
            </span>
            <div class="text-box">
                <p class="main-text">30 Tasks</p>
                <p class="text-muted">Remaining</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-blue set-icon">
                <i class="fa fa-bell-o"></i>
            </span>
            <div class="text-box">
                <p class="main-text">240 New</p>
                <p class="text-muted">Notifications</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-6">
        <div class="panel panel-back noti-box">
            <span class="icon-box bg-color-brown set-icon">
                <i class="fa fa-rocket"></i>
            </span>
            <div class="text-box">
                <p class="main-text">{{$order_pedding}} Orders</p>
                <p class="text-muted">Pending</p>
            </div>
        </div>
    </div>
</div>



@endsection