@extends('admin_layout')
@section('admin_content')


<form action="{{URL::to('/update-category-product'.'/'.$edit_category->category_id)}}" method="POST">
    {{csrf_field()}}
    <div class="form-group">
        <label></label>
        <input type="text" class="form-control" data-slug-source="category-edit" name="categories_product_name"
            value="{{$edit_category->category_name}}">
    </div>

    <div class="form-group">
        <label>Slug</label>
        <input type="text" class="form-control" data-slug-target="category-edit" name="categories_product_slug"
            value="{{ $edit_brand->brand_name}}">
    </div>
    <button type="submit" name="update" class="btn btn-primary">Cập nhật</button>
</form>

@endsection