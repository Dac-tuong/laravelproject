<?php

namespace App\Http\Controllers;

use App\Models\Coupons;
use App\Models\OrderDetail;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\SalesProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PHPUnit\Framework\Constraint\Count;
use Illuminate\Support\Facades\App;

use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{

    public function print_order($order_code)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($order_code));
        return $pdf->stream();
    }

    public function print_order_convert($order_code)
    {

        // Khởi tạo biến đếm số lượng sản phẩm
        $order_count_quantity = 0;

        $summary_order = 0;
        // Lấy thông tin chi tiết đơn hàng
        $data_detailOrder = OrderDetail::where('order_code', $order_code)->get();

        foreach ($data_detailOrder as $detailOrder) {
            $order_count_quantity += $detailOrder['product_sale_quantity'];
            $order_price_product =  $detailOrder['product_price'];
            $order_quantity_sale = $detailOrder['product_sale_quantity'];
            $summary_product = $order_price_product * $order_quantity_sale;
            $summary_order += $summary_product;
        }

        // Lấy thông tin vận chuyển của đơn hàng
        $order_ship = OrderProduct::with(['shippingAddress'])->where('order_code', $order_code)->first();


        // Kiểm tra xem đơn hàng có tồn tại không
        if (!$order_ship) {
            return "Đơn hàng không tồn tại.";
        }

        // Lấy coupon giảm giá nếu có
        $find_coupon = $order_ship->discount_coupon_id;
        $discount_amount = 0; // Mặc định không có giảm giá

        if ($find_coupon) {
            $check_coupon = Coupons::where('id_coupon', $find_coupon)->first();

            if ($check_coupon) {
                if ($check_coupon->coupon_type == 'fixed') {
                    // Giảm giá theo số tiền cố định
                    $discount_amount = number_format($check_coupon->discount, 0, ',', '.') . ' VNĐ';
                } else {
                    // Giảm giá theo phần trăm
                    $discount_amount = $check_coupon->discount . ' %';
                }
            }
        }


        return view('admin.order.view_pdf')
            ->with('detailOrder', $data_detailOrder)
            ->with('orderShip', $order_ship)
            ->with('orderCount', $order_count_quantity)
            ->with('discountAmount', $discount_amount)
            ->with('summaryOrder', $summary_order);
    }
    public function order_view()
    {
        $ls_dataOrder = OrderProduct::with(['shippingAddress'])->get();

        return view('admin.order.order_view')->with('lsOrder', $ls_dataOrder);
    }
    public function view_detail($order_code)
    {

        $order_count_quantity = 0;
        $data_detailOrder = OrderDetail::where('order_code', $order_code)->get();

        foreach ($data_detailOrder as $detailOrder) {
            $order_count_quantity += $detailOrder['product_sale_quantity'];
        }

        $order_ship = OrderProduct::with(['shippingAddress'])->where('order_code', $order_code)->first();

        $find_coupon =  $order_ship->discount_coupon_id;

        $check_coupon = Coupons::where('id_coupon', $find_coupon)->first();

        if ($check_coupon) {
            if ($check_coupon->coupon_type == 'fixed') {
                // Giảm giá theo số tiền cố định
                $discount_amount =
                    number_format($check_coupon->discount, 0, ',', '.') . ' VNĐ';
            } else {
                // Giảm giá theo phần trăm
                $discount_amount = $check_coupon->discount . ' %';
            }
        }
        // Nếu không tìm thấy coupon
        $discount_amount = 0 . ' VNĐ'; // Không có giảm giá

        return view('admin.order.order_detail')->with('detailOrder', $data_detailOrder)->with('orderShip', $order_ship)->with('orderCount', $order_count_quantity)->with('discountAmount', $discount_amount);
    }
}
