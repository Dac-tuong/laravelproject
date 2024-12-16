<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\FavoriteModel;

use App\Models\OrderProduct;
use App\Models\BannerModel;
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
        $banners = BannerModel::all();

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
            ->with('banners', $banners)
        ;
    }


    public function wishlist()
    {
        $brand = Brand::get();
        $category = Category::get();
        $banners = BannerModel::all();
        $id_user_session = Session::get('id_customer');
        $favorite = FavoriteModel::with(['user_favorite', 'product_favorite'])->where("favorite_user_id", $id_user_session)->get();
        return view('user.product.wishlist')
            ->with('brands', $brand)
            ->with("categorys", $category)
            ->with('favorites', $favorite)
            ->with('banners', $banners)
        ;
    }

    public function data_wishlist()
    {
        $id_user_session = Session::get('id_customer');
        $products = FavoriteModel::with(['user_favorite', 'product_favorite'])
            ->where("favorite_user_id", $id_user_session)->get();


        $output = '';
        foreach ($products as $product) {

            $productFavorite = $product->product_favorite; // Simplify access to related product

            $oldPrice = $productFavorite->old_price ?? 0;
            $salePrice = $productFavorite->sale_price;
            $brandName = $productFavorite->brand_name;
            $imagePath = asset('uploads/product/' . $productFavorite->product_image);
            $detailLink = url('/detail-product' . '/' .  $productFavorite->id);

            $percentDiscount = $oldPrice > 0 ? ceil((($oldPrice - $salePrice) / $oldPrice) * 100) : 0;
            $oldPriceText = '';
            if ($oldPrice > 0) {
                $oldPriceText .= '<span class="productinfo__price-old">' . number_format($oldPrice, 0, ',', '.') . 'đ</span>';
            }
            $pecent = '';
            if ($oldPrice > 0) {
                $pecent .= '<div class="product__price--percent">
                            <p class="product__price--percent-detail">' . $percentDiscount . '%</p>
                        </div>';
            }

            $output .= '
              <div class="col-lg-3 col-md-3 col-sm-12 col-12" style="padding-bottom: 12px;">
        <div class="product-content">
        <div class="thumbnail-product-img">
     <img class="home-product-img" src="' . $imagePath . '" alt="" />   
        </div>

  <h5 class="productinfo__name">
                        <a class="link-product"
                            href="' . $detailLink . '">' . $productFavorite->product_name . '
                        </a>
                    </h5>
                     <div class="productinfo__price">
                      <span class="productinfo__price-current">
                            ' .  number_format($salePrice, 0, ',', '.') . '
                        </span>
                          ' . $oldPriceText . '
                     </div>
                    <span> ' . $brandName . ' </span>
            <div class="action-buttons">
                      <form>
                           <input type="hidden" name="_token" value="' . csrf_token() . '">
                            <input type="hidden" value="' . $product->favorite_phone_id . '" class="product_id_' . $product->favorite_phone_id . '">
                            <input type="hidden" value="' . $productFavorite->product_name . '" class="product_name_' . $product->favorite_phone_id . '">
                            <input type="hidden" value="' . $productFavorite->product_image . '" class="product_image_' . $product->favorite_phone_id . '">
                            <input type="hidden" value="' . $salePrice . '" class="product_price_' . $product->favorite_phone_id . '">
                            <input type="hidden" value="' . $productFavorite->color . '" class="product_color_' . $product->favorite_phone_id . '">
                            <input type="hidden" value="1" class="cart_product_qty_' . $product->favorite_phone_id . '">
                            <button type="button" class="add-to-cart" data-id_product="' . $product->favorite_phone_id . '" name="add-to-cart"><i class="fa-solid fa-cart-shopping"></i></button>
                            <button type="button" class="delete-favorite" data-id_product="' . $product->favorite_phone_id . '" name="delete-favorite">X</button>
                            </form>
                    </div>
        </div>
    </div>';
        }
        if ($products->count() > 0) {
            echo $output;
        } else {
            echo '<span>Hiện không có sản phẩm yêu thích nào</span>';
        }
    }
}
