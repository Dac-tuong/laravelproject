@extends('admin_layout')
@section('admin_content')
<form action="{{URL::to('/save-post')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group">
        <label for="">Tên bài viết</label>
        <input type="text" class="form-control" name="banner_name" id="">
    </div>
    <div class="form-group">
        <label for="">Loại bài viết</label>
        <select name="id_loaibaviet" id="">
            @foreach ($products as $product )
            <option value="{{$product->product_id}}">{{$product->product_name}}</option>
            @endforeach
        </select>
    </div>
    <br>
    <div class="form-group">
        <label for="">Hình ảnh bài viết</label>
        <input type="file" name="post_image" id="">
    </div>
    <input type="submit" name="add_to_slide" id="">
</form>
@endsection