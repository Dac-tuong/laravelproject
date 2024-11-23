<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Gallery;
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
        $address_customer = ShippingAddress::where('id_customer', $id_user_session)->first();
        if ($address_customer) {
            $output = "  {$address_customer->province->name},{$address_customer->districts->name},{$address_customer->wards->name},
                   {$address_customer->diachi}";
        }
        return view('user.profile.personal-infor')->with('brands', $brand)
            ->with('categorys', $category)->with('infocustomer', $information_customer)
            ->with('address', $output);
    }

    public function history_order()
    {
        $brand = Brand::get();
        $category = Category::get();

        // $id_user_session = Session::get('id_customer');
        // $output = "Hiện chưa có địa chỉ";
        // $information_customer = User::where('id_user', $id_user_session)->first();
        // $address_customer = ShippingAddress::where('id_customer', $id_user_session)->first();
        // if ($address_customer) {
        //     $output = "  {$address_customer->province->name},{$address_customer->districts->name},{$address_customer->wards->name},
        //            {$address_customer->diachi}";
        // }
        // return view('user.profile.personal-infor')->with('brands', $brand)
        //     ->with('categorys', $category)->with('infocustomer', $information_customer)
        //     ->with('address', $output);

        return view('user.shopping.history_order')
            ->with('brands', $brand)
            ->with("categorys", $category);
    }
}
