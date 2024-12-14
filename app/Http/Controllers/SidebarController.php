<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\FavoriteModel;
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

        $history_order = OrderProduct::where('id_customer', $id_user_session)
            ->with(['shippingAddress', 'orderDetail'])->get();
        $order_count = $history_order->count();
        $total_amount = OrderProduct::where('id_customer', $id_user_session)->sum('order_total');
        $avg_amount = $total_amount / $order_count;
        return view('user.profile.personal_infor')->with('brands', $brand)
            ->with('categorys', $category)
            ->with('inforcustomer', $information_customer)
            ->with('historys', $history_order)
            ->with('ordercount', $order_count)
            ->with('totalamount', $total_amount)
            ->with('avgamount', $avg_amount)
        ;
    }


    public function wishlist()
    {
        $brand = Brand::get();
        $category = Category::get();
        $id_user_session = Session::get('id_customer');
        $favorite = FavoriteModel::with(['user_favorite', 'product_favorite'])->where("favorite_user_id", $id_user_session)->get();
        return view('user.product.wishlist')
            ->with('brands', $brand)
            ->with("categorys", $category)
            ->with('favorites', $favorite)
        ;
    }

    public function data_wishlist()
    {
        $id_user_session = Session::get('id_customer');
        $favorite = FavoriteModel::with(['user_favorite', 'product_favorite'])->where("favorite_user_id", $id_user_session)->get();
        return response()->json($favorite);
    }
}
