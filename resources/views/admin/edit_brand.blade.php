@extends('admin_layout')
@section('admin_content')
<form action="{{URL::to('/update-brand'.'/'. $edit_brand->brand_id)}}" method="POST">
    {{csrf_field()}}
    <div class="form-group">
        <label>Thương hiệu</label>
        <input type="text" class="form-control" data-slug-source="brand-edit" name="brand_name"
            value="{{ $edit_brand->brand_name}}">
    </div>
    <div class="form-group">
        <label>Slug</label>
        <input type="text" class="form-control" data-slug-target="brand-edit" name="brand_slug"
            value="{{ $edit_brand->brand_name_slug}}">
    </div>
    <button type="submit" name="update" class="btn btn-primary">Cập nhật</button>
</form>

@endsection