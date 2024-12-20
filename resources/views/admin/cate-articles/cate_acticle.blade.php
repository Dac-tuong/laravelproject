@extends('admin_layout')
@section('admin_content')


<form action="{{URL::to('/save-cate-post')}}" method="POST">
    {{csrf_field()}}
    <div class="form-group">
        <label>Tên loại bài viết</label>
        <input type="text" class="form-control" name="cate_post_name" data-slug-source="brand"
            placeholder="Nhập tên thương hiệu">
    </div>

    <div class="form-group">
        <label>Tình Trạng</label>
        <select name="cate_post_status" class="form-control">
            <option value="1">active</option>
            <option value="2">inactive</option>
        </select>
    </div>
    <button type="submit" name="add" class="btn btn-primary">Submit</button>
</form>
@endsection