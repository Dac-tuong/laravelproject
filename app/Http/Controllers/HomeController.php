<?php

namespace App\Http\Controllers;

use App\Models\BannerModel;
use App\Models\ReviewModel;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\Brand;
use App\Models\Category;
use App\Models\FavoriteModel;

use App\Models\Product;



session_start();

use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $brand = Brand::get();
        $category = Category::get();
        $list_product =  Product::with(['category', 'brand'])
            ->where('product_status', 1);

        $banners = BannerModel::all();
        // Lọc theo giá
        if ($request->has('sort_by')) {
            if ($request->get('sort_by') == 'giam_dan') {
                $list_product->orderBy('sale_price', 'desc');
            } elseif ($request->get('sort_by') == 'tang_dan') {
                $list_product->orderBy('sale_price', 'asc');
            }
        }

        // Lọc theo RAM
        if ($request->has('filter_mobile_ram')) {
            // Chuyển giá trị thành mảng
            $ramFilters = explode(',', $request->get('filter_mobile_ram'));

            // Áp dụng các điều kiện lọc
            $list_product->where(function ($query) use ($ramFilters) {
                foreach ($ramFilters as $ramFilter) {
                    switch ($ramFilter) {
                        case '<4':
                            $query->orWhere('ram', '<', 4);
                            break;
                        case '4gb_8gb':
                            $query->orWhereBetween('ram', [4, 8]);
                            break;
                        case '8gb_12gb':
                            $query->orWhereBetween('ram', [8, 12]);
                            break;
                        case '>12gb':
                            $query->orWhere('ram', '>', 12);
                            break;
                    }
                }
            });
        }


        // Lấy danh sách sản phẩm sau khi lọc
        $products = $list_product->paginate(10);

        return view('user.home')
            ->with('products', $products)
            ->with('banners', $banners)
            ->with('brands', $brand)
            ->with('categorys', $category);
    }

    public function detail_product($product_id)
    {
        $brand = Brand::get();
        $category = Category::get();
        $banners = BannerModel::all();
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
            ->with('reviews', $get_review)
            ->with('banners', $banners);
    }

    public function search(Request $request)
    {
        $brand = Brand::get();
        $category = Category::get();
        $banners = BannerModel::all();
        $keyword = $request->keywords_search;

        $search_product = Product::with(['category', 'brand'])->where('product_name', 'like', '%' . $keyword . '%')
            ->where('product_status', 1)
            ->get();

        return view('user.product.search')
            ->with('search_product', $search_product)
            ->with('brands', $brand)
            ->with('categorys', $category)
            ->with('banners', $banners)
        ;
    }
    public function review_product($product_id)
    {
        $brand = Brand::get();
        $category = Category::get();
        $banners = BannerModel::all();
        $get_product = Product::with(['category', 'brand', 'galleries'])
            ->where('tbl_phones.product_id', $product_id)->first();

        return view('user.product.review_product')
            ->with('product_infor', $get_product)
            ->with('brands', $brand)
            ->with('categorys', $category)
            ->with('banners', $banners)
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
    public function get_review_cmt_min($product_id)
    {
        $review_cmt = ReviewModel::with(['name_customer'])
            ->where('id_phone_review', $product_id)
            ->orderBy('id_review', 'desc')
            ->limit(5)->get();
        return response()->json($review_cmt);
    }
    public function get_review_cmt_all($product_id)
    {
        $review_cmt = ReviewModel::with(['name_customer'])
            ->where('id_phone_review', $product_id)
            ->orderBy('id_review', 'desc')
            ->get();
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

        // Lấy dữ liệu thực tế từ cơ sở dữ liệu
        $ratings_count = ReviewModel::where('id_phone_review', $product_id)
            ->groupBy('rating')
            ->selectRaw('rating, COUNT(*) as count')
            ->orderBy('rating', 'desc')
            ->get()
            ->keyBy('rating'); // Sử dụng keyBy để dễ dàng kiểm tra các mức đánh giá

        // Đảm bảo tất cả các mức đánh giá từ 1 đến 5 đều có
        $ratings_array = [];
        for ($i = 1; $i <= 5; $i++) {
            if (isset($ratings_count[$i])) {
                // Nếu mức đánh giá tồn tại, sử dụng giá trị từ database
                $count = $ratings_count[$i]->count;
            } else {
                // Nếu không tồn tại, gán count = 0
                $count = 0;
            }

            // Tính phần trăm
            $percentage = $reviews_total > 0 ? round(($count / $reviews_total) * 100, 2) : 0;

            $ratings_array[] = [
                'rating' => $i,
                'count' => $count,
                'percentage' => $percentage,
            ];
        }

        return response()->json([
            'total_reviews' => $reviews_total,
            'ratings_count' => $ratings_array
        ]);
    }

    public function filter_reviews_min(Request $request)
    {
        $dataFilterReview = $request->all();
        $id_filter = $dataFilterReview['id_product'];
        $star_filter = $dataFilterReview['filter_start'];

        if ($star_filter == 0) {
            $review_cmt = ReviewModel::with(['name_customer'])
                ->where('id_phone_review', $id_filter)
                ->orderBy('id_review', 'desc')
                ->limit(5)->get();
            return response()->json($review_cmt);
        } else {
            $review_cmt = ReviewModel::with(['name_customer'])
                ->where('id_phone_review', $id_filter)->where('rating', $star_filter)
                ->orderBy('id_review', 'desc')
                ->limit(5)->get();
            return response()->json($review_cmt);
        }
    }


    public function filter_reviews(Request $request)
    {
        $dataFilterReview = $request->all();
        $id_filter = $dataFilterReview['id_product'];
        $star_filter = $dataFilterReview['filter_start'];

        if ($star_filter == 0) {
            $review_cmt = ReviewModel::with(['name_customer'])
                ->where('id_phone_review', $id_filter)
                ->orderBy('id_review', 'desc')
                ->limit(5)->get();
            return response()->json($review_cmt);
        } else {
            $review_cmt = ReviewModel::with(['name_customer'])
                ->where('id_phone_review', $id_filter)->where('rating', $star_filter)
                ->orderBy('id_review', 'desc')
                ->get();
            return response()->json($review_cmt);
        }
    }
    public function delete_favorite(Request $request)
    {
        $product_favorite = $request->all();
        $id_user = Session::get('id_customer');
        $product_favorite_id = $product_favorite['product_id'];

        // Bỏ ghi chú và xử lý thêm đánh giá
        $favorite = FavoriteModel::where("favorite_phone_id", $product_favorite_id)
            ->where("favorite_user_id", $id_user)->first();
        $favorite->delete();
    }
}
