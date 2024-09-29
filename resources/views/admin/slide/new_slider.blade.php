@extends('admin_layout')
@section('admin_content')
<form action="{{URL::to('/save-slide')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <label for="">Tên slide</label>
    <input type="text" name="name_slide" id="">
    <br>
    <label for="">slide image</label>
    <input type="file" name="slide_image" id="">
    <input type="submit" name="add_to_slide" id="">
</form>
@endsection