<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\Brand;
use App\Models\Category;
use App\Models\FavoriteModel;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\ReviewModel;


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
            ->paginate(10);

        return view('user.home')->with('products', $list_product)
            ->with('brands', $brand)->with('categorys', $category);
    }

    public function detail_product($product_id)
    {
        $brand = Brand::get();
        $category = Category::get();
        $detail_product = Product::with(['category', 'brand', 'galleries'])->where('tbl_phones.product_id', $product_id)->first();
        $product_price = $detail_product->sale_price;
        $similar_product = Product::whereBetween('sale_price', [$product_price - 100, $product_price + 100, $product_price])
            ->where('product_id', '!=', $product_id)
            ->get();

        $get_review = ReviewModel::with(['name_customer'])->where('id_phone_review', $product_id)->limit(5)->get();
        return view('user.product.detail_product')
            ->with('product_detail', $detail_product)
            ->with('brands', $brand)
            ->with('categorys', $category)
            ->with('similars', $similar_product)
            ->with('reviews', $get_review);
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
    public function review_product($product_id)
    {
        $brand = Brand::get();
        $category = Category::get();
        $get_product = Product::with(['category', 'brand', 'galleries'])
            ->where('tbl_phones.product_id', $product_id)->first();

        return view('user.product.review_product')
            ->with('product_infor', $get_product)
            ->with('brands', $brand)
            ->with('categorys', $category)
        ;
    }

    public function favorite_toggle(Request $request)
    {
        $product_favorite = $request->all();
        $id_user = Session::get('id_customer');
        $product_favorite_id = $product_favorite['product_id'];
        // Kiểm tra người dùng đã đăng nhập hay chưa
        if (!$id_user) {
            return response()->json(['status' => 'error', 'message' => 'Vui lòng đăng nhập hoặc đăng ký để thêm vào yêu thích']);
        }
        $favorite = FavoriteModel::where("favorite_phone_id", $product_favorite_id)
            ->where("favorite_user_id", $id_user)->first();
        if ($favorite) {
            $favorite->delete();
            return response()->json(['status' => 'remove']);
        } else {
            $new_favorite = new FavoriteModel();
            $new_favorite->favorite_phone_id = $product_favorite_id;
            $new_favorite->favorite_user_id = $id_user;
            $new_favorite->save();
            return response()->json(['status' => 'add']);
        }
    }
}
