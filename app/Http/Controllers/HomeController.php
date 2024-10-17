<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;


session_start();

use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index()
    {
        $brand = Brand::get();
        $category = Category::get();
        $list_product =  Product::with(['category', 'brand'])
            ->where('product_status', 1)
            ->orderBy('product_id', 'ASC')
            ->paginate(3);
        return view('user.home')->with('products', $list_product)->with('brands', $brand)->with('categorys', $category);
    }

    public function detail_product($product_id)
    {
        $brand = Brand::get();
        $category = Category::get();
        $detail_product = Product::with(['category', 'brand', 'galleries'])->where('tbl_phones.product_id', $product_id)->get();

        return view('user.product.detail_product')->with('product_detail', $detail_product)->with('brands', $brand)->with('categorys', $category);
    }

    public function search(Request $request)
    {
        $brand = Brand::get();
        $category = Category::get();
        $keyword = $request->keywords_search;

        $search_product = Product::with(['category', 'brand'])->where('product_name', 'like', '%' . $keyword . '%')
            ->where('product_status', 1)
            ->get();

        return view('user.product.search')
            ->with('search_product', $search_product)
            ->with('brands', $brand)
            ->with('categorys', $category);
    }
}
