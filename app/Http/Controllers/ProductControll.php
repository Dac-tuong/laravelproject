<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\Brand;

use App\Models\Product;
use App\Models\Gallery;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Redirect;

session_start();

class ProductControll extends Controller
{

    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('admin.dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }
    public function add_product()
    {
        $this->AuthLogin();
        $cate_product = Category::get();
        $brand_product = Brand::get();

        return view('admin.add_product')->with('cate_product', $cate_product)->with('brand_product', $brand_product);
    }
    public function list_product()
    {
        $this->AuthLogin();
        $list_product = Product::with(['category', 'brand'])->orderBy('product_id', 'ASC')->get();
        return view('admin.list_product')->with('products', $list_product);
    }

    public function edit_product($product_id)
    {
        $this->AuthLogin();
        $cate_product = Category::all();
        $brand_product = Brand::all();
        // $gallery_product = Gallery::where('');

        // $product = Product::find($product_id);

        // return view('admin.edit_product')->with('products', $product)->with('cate_products', $cate_product)
        //     ->with('brand_products', $brand_product)->with('image_gallery', $gallery_product);

        $product = Product::with(['galleries'])->where('product_id', $product_id)->first();
        return view('admin.edit_product')->with('products', $product)->with('cate_products', $cate_product)
            ->with('brand_products', $brand_product);
    }

    public function inactive_product($product_id)
    {
        $this->AuthLogin();

        $product = Product::find($product_id);
        $product->product_status = 1;
        $product->save();

        Session::put('message_success', 'Hiển thị thành công!');
        return Redirect::to('list-product');
    }
    public function active_product($product_id)
    {
        $this->AuthLogin();
        $product = Product::find($product_id);
        $product->product_status = 0;
        $product->save();
        Session::put('message_success', 'Ẩn thành công!');
        return Redirect::to('list-product');
    }

    public function save_product(Request $request)
    {
        $this->AuthLogin();
        $data = $request->all();
        $product = new Product;
        $product->product_code = $data['product_code'];
        $product->product_name =  $data['product_name'];
        $product->name_product_slug =  $data['name_product_slug'];
        $product->sale_price = $data['sale_price'];
        $product->product_quantity =  $data['product_quantity'];
        $product->categories_product_id = $data['categories_product_id'];
        $product->brand_product_id = $data['brand_product'];
        $product->product_model = $data['product_model'];
        $product->release_date = $data['release_date'];

        $product->operating_system = $data['operating_system'];
        $product->screen_type = $data['screen_type'];
        $product->screen_size = $data['screen_size'];
        $product->resolution = $data['resolution'];
        $product->refresh_rate = $data['refresh_rate'];
        $product->ram     = $data['ram'];
        $product->storage = $data['storage'];
        $product->expandable_storage = $data['expandable_storage'];
        $product->battery_capacity = $data['battery_capacity'];
        $product->fast_charging = $data['fast_charging'];
        $product->wireless_charging = $data['wireless_charging'];
        $product->camera_main = $data['camera_main'];
        $product->camera_main_features = $data['camera_main_features'];
        $product->camera_front = $data['camera_front'];
        $product->camera_front_features = $data['camera_front_features'];
        $product->cpu = $data['cpu'];
        $product->gpu = $data['gpu'];
        $product->water_resistance = $data['water_resistance'];
        $product->weight = $data['weight'];
        $product->dimensions = $data['dimensions'];
        $product->sim_type = $data['sim_type'];
        $product->connectivity = $data['connectivity'];
        $product->biometrics = $data['biometrics'];
        $product->color = $data['color'];
        $product->charging_port = $data['charging_port'];
        $product->other_connections = $data['other_connections'];
        $product->warranty_period = $data['warranty_period'];
        $product->product_status = $data['product_status'];
        $get_image = $request->file('product_image');

        // xữ lý phần up hình ảnh lên mysql
        if ($get_image) {
            $new_image = time() . '_' . $get_image->getClientOriginalName();
            $get_image->move('uploads/product', $new_image);
            $product->product_image = $new_image;
        } else {
            $product->product_image = '';
        }
        $product->save();
        // lấy id của sản phẩm
        $id = $product->product_id;

        // xữ lý phần hình ảnh gallery 
        $get_gallery = $request->file('gallery');
        if ($get_gallery) {
            foreach ($get_gallery as $gallery_image) {
                $gallery_path = time() . '_' . $gallery_image->getClientOriginalName();
                $gallery_image->move('uploads/product', $gallery_path);

                $gallery = new Gallery();
                $gallery->id_sanpham = $id;
                $gallery->gallery_path = $gallery_path;
                $gallery->save();
            }
        }
        Session::put('message_success', 'Thêm thành công!');
        return Redirect::to('list-product');
    }


    public function update_product(Request $request, $product_id)
    {
        $this->AuthLogin();

        $data = $request->all();
        $product = Product::find($product_id);

        $product->product_code = $data['product_code'];
        $product->product_name = $data['product_name'];
        $product->sale_price = $data['sale_price'];
        $product->product_quantity = $data['product_quantity'];
        $product->categories_product_id   = $data['categories_product_id'];
        $product->brand_product_id  = $data['brand_product_id'];

        $get_image = $request->file('product_image');
        $old_image = $product->product_image;

        if ($get_image) {
            // Nếu có hình ảnh mới, thực hiện các bước sau:
            // 1. Xóa hình ảnh cũ
            $product_image_path = '/uploads/product/' . $old_image;
            if (file_exists($product_image_path)) {
                unlink($product_image_path);
            }

            // 2. Lưu hình ảnh mới
            $new_image = time() . '.' . $get_image->getClientOriginalName();
            $get_image->move('uploads/product', $new_image);
            $product->product_image = $new_image;
        }

        $product->save();

        $get_gallery = $request->file('gallery');
        $galleries = Gallery::where('id_sanpham_gallery', $product_id)->get();

        if ($get_gallery) {
            // Xóa các hình ảnh cũ trong gallery
            foreach ($galleries as $gallery) {
                $gallery_image_path = 'uploads/product/' . $gallery->gallery_path;
                if (file_exists($gallery_image_path)) {
                    unlink($gallery_image_path);
                }
                $gallery->delete();
            }

            // Thêm các hình ảnh mới vào gallery
            foreach ($get_gallery as $gallery_image) {
                $gallery_path = time() . '_' . $gallery_image->getClientOriginalName();
                $gallery_image->move('uploads/product', $gallery_path);

                $gallery = new Gallery();
                $gallery->id_sanpham_gallery  = $product_id;
                $gallery->gallery_path = $gallery_path;
                $gallery->save();
            }
        }

        Session::put('message_success', 'Cập nhật thành công!');
        return Redirect::to('list-product');
    }

    public function delete_product($product_id)
    {
        $this->AuthLogin();
        $product = Product::find($product_id);

        if ($product) {
            // Đường dẫn tới tập tin ảnh
            $product_image_path = 'uploads/product/' . $product->product_image;

            // Kiểm tra xem tập tin ảnh có tồn tại không và xóa nó
            if (file_exists($product_image_path)) {
                unlink($product_image_path);
            }
            // Xóa dữ liệu sản phẩm từ cơ sở dữ liệu
            Product::where('product_id', $product_id)->delete();
            Session::put('message_success', 'Xóa thành công!');
        }

        $gallery_images = Gallery::where('id_sanpham_gallery ', $product_id)->get();

        foreach ($gallery_images as $old_gallery_image) {

            $gallery_image_path = 'uploads/product/' .  $old_gallery_image->gallery_path;
            if (file_exists($gallery_image_path)) {
                unlink($gallery_image_path);
            }
            $old_gallery_image->delete();
        }



        return Redirect::to('list-product');
    }
}