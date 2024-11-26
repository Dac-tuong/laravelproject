<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ShippingAddress;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class SidebarController extends Controller
{
    //

    public function thong_tin_ca_nhan()
    {
        $brand = Brand::get();
        $category = Category::get();

        $id_user_session = Session::get('id_customer');
        $output = "Hiện chưa có địa chỉ";
        $information_customer = User::where('id_user', $id_user_session)->first();

        return view('user.profile.personal_infor')->with('brands', $brand)
            ->with('categorys', $category)
            ->with('infocustomer', $information_customer)
        ;
    }

    public function history_order()
    {
        $brand = Brand::get();
        $category = Category::get();

        $id_user = Session::get('id_customer');
        $history_order = OrderProduct::where('id_customer', $id_user)->with(['shippingAddress', 'orderDetail'])->get();

        return view('user.shopping.history_order')
            ->with('brands', $brand)
            ->with("categorys", $category)
            ->with("historys", $history_order);
    }

    function favorite_product()
    {
        $brand = Brand::get();
        $category = Category::get();
        return view('user.product.favorite_product')
            ->with('brands', $brand)
            ->with("categorys", $category);
    }
}
