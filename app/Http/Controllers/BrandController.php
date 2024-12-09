<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;

session_start();
class BrandController extends Controller
{

    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            Redirect::to('admin.dashboard');
        } else {
            return Redirect::to('admincp')->send();
        }
    }

    public function add_brand()
    {
        $this->AuthLogin();
        return view('admin.add_brand');
    }
    public function save_brand(Request $request)
    {
        $this->AuthLogin();
        $data = $request->all();
        $brand = new Brand();
        $brand->brand_name = $data['brand_name'];
        $brand->brand_name_slug = $data['brand_name_slug'];
        $brand->brand_status = $data['brand_status'];
        $brand->save();

        Session::put('message_success', 'Thêm thành công!');
        return Redirect::to('add-brand');
    }

    public function list_brand()
    {
        $this->AuthLogin();
        $list_brand = Brand::all();
        $manager_brand = view('admin.list_brand')->with('list_brand', $list_brand);
        return view('admin_layout')->with('admin.list_brand', $manager_brand);
    }
    public function inactive_brand($brand_id)
    {
        $this->AuthLogin();
        $brand = Brand::find($brand_id);
        $brand->brand_status = 1;
        $brand->save();
        Session::put('message_success', 'Hiển thị thành công!');
        return Redirect::to('list-brand');
    }
    public function active_brand($brand_id)
    {
        $this->AuthLogin();
        $brand = Brand::find($brand_id);
        $brand->brand_status = 0;
        $brand->save();
        Session::put('message_success', 'An thành công!');
        return Redirect::to('list-brand');
    }
    public function edit_brand($brand_id)
    {
        $this->AuthLogin();
        $edit_brand = Brand::find($brand_id);

        $manager_brand = view('admin.edit_brand')->with('edit_brand', $edit_brand);
        return view('admin_layout')->with('admin.edit_brand', $manager_brand);
    }

    public function update_brand(Request $request, $brand_id)
    {

        $this->AuthLogin();
        $brand = Brand::find($brand_id);
        $brand->brand_name = $request->brand_name;
        $brand->brand_name_slug = $request->brand_slug;
        $brand->save();
        Session::put('message_success', 'Cập nhật thành công!');
        return Redirect::to('list-brand');
    }
    public function delete_brand($brand_id)
    {
        $this->AuthLogin();
        $brand = Brand::find($brand_id);
        $brand->delete();
        Session::put('message_success', 'Xóa thành công!');
        return Redirect::to('list-brand');
    }

    // USER

    public function show_brand_user(Request $request, $brand_id)
    {
        $brand = Brand::get();
        $only_brand = Brand::where('brand_id', $brand_id)->first();

        $brand_by_id = Product::where('brand_product_id', $brand_id)
            ->where('product_status', 1)
            ->get();
        if (isset($_GET['sort_by'])) {
            $sort_by = $_GET['sort_by'];
            if ($sort_by == 'tang_dan') {
                $brand_by_id = Product::where('brand_product_id', $brand_id)
                    ->where('product_status', 1)
                    ->orderBy('sale_price', 'asc')
                    ->get();
            } else if ($sort_by == 'giam_dan') {
                $brand_by_id = Product::where('brand_product_id', $brand_id)
                    ->where('product_status', 1)
                    ->orderBy('sale_price', 'desc')
                    ->get();
            } else if ($sort_by == 'tu_az') {
                $brand_by_id = Product::where('brand_product_id', $brand_id)
                    ->where('product_status', 1)
                    ->orderBy('product_name', 'asc')
                    ->get();
            } else if ($sort_by == 'tu_za') {
                $brand_by_id = Product::where('brand_product_id', $brand_id)
                    ->where('product_status', 1)
                    ->orderBy('product_name', 'desc')
                    ->get();
            }
        } else {
            $brand_by_id = Product::where('brand_product_id', $brand_id)
                ->where('product_status', 1)
                ->get();
        }
        return view('user.other.show_category')
            ->with('brand', $only_brand)
            ->with('brand_by_id', $brand_by_id)
            ->with('brands', $brand);
    }
}
