<?php

namespace App\Http\Controllers;

use App\Models\ReviewModel;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\Brand;
use App\Models\Category;
use App\Models\FavoriteModel;
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
        } else {
            $new_favorite = new FavoriteModel();
            $new_favorite->favorite_phone_id = $product_favorite_id;
            $new_favorite->favorite_user_id = $id_user;
            $new_favorite->save();
        }
    }

    public function check_favorite(Request $request)
    {
        $product_favorite = $request->all();
        $id_user = Session::get('id_customer');
        $product_favorite_id = $product_favorite['product_id'];

        $isFavorite = FavoriteModel::where("favorite_phone_id", $product_favorite_id)
            ->where("favorite_user_id", $id_user)->exists();
        $output = '';
        if ($isFavorite) {
            $output .= '<i class="fa-solid fa-heart"></i>';
        } else {
            $output .= '<i class="fa-regular fa-heart"></i>';
        }
        echo $output;
    }
    public function get_review_cmt($product_id)
    {
        $review_cmt = ReviewModel::with(['name_customer'])
            ->where('id_phone_review', $product_id)
            ->orderBy('id_review', 'desc')
            ->limit(5)->get();
        return response()->json($review_cmt);
    }

    public function average_start($product_id)
    {
        $review_product = ReviewModel::where('id_phone_review', $product_id)->get();
        $average_point_product = $review_product->avg('rating');
        $count_review = $review_product->count() . ' đánh giá';


        return response()->json([
            'average' => round($average_point_product, 1),
            'total_reviews' => $count_review,
        ]);
    }

    public function send_review(Request $request)
    {
        $dataReview = $request->all();
        $id_user = Session::get('id_customer');
        // $nameorder = $dataReview['fullname'];
        $text = $dataReview['review'];
        // $phonenumber = $dataReview['phonenumber'];
        $product_review_id = $dataReview['id_product'];
        $rating = $dataReview['rating'];
        if (!$id_user) {
            return response()->json(['status' => 'error', 'message' => 'Vui lòng đăng nhập hoặc đăng ký để thêm vào yêu thích']);
        }

        // Bỏ ghi chú và xử lý thêm đánh giá
        $review = ReviewModel::where("id_phone_review", $product_review_id)
            ->where("id_user_review", $id_user)->first();

        if ($review) {
            return response()->json(['status' => 'error', 'message' => 'Bạn đã đánh giá sản phẩm này trước đó!']);
        } else {
            $add_review = new ReviewModel();
            $add_review->id_phone_review = $product_review_id;
            $add_review->id_user_review = $id_user;
            $add_review->review_text = $text;
            $add_review->rating = $rating;
            $add_review->save();

            return response()->json(['status' => 'success', 'message' => 'Đánh giá của bạn đã được gửi!']);
        }
    }


    public function count_with_star($product_id)
    {
        $reviews = ReviewModel::where('id_phone_review', $product_id)->get();
        $reviews_total = $reviews->count();
        $reviewGroupby = $reviews->groupBy('rating')->count();
        return response()->json(['total_reviews' => $reviews_total, 'reviewGroupby' => $reviewGroupby]);
    }
}
