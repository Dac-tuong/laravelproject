<?php

namespace App\Http\Controllers;

use App\Models\Coupons;
use App\Models\OrderDetail;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\Session;


class OrderController extends Controller
{
    // ADMIN

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
        $summary_product = 0;
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
        $order_ship = OrderProduct::with([
            'shippingAddress.province',
            'shippingAddress.districts',
            'shippingAddress.wards'
        ])->where('order_code', $order_code)->first();
        $order_ship->order_status;

        if ($order_ship->order_status == 1) {
            $status = 'Đơn hàng đang xữ lý';
        } elseif ($order_ship->order_status == 2) {
            $status = 'Đơn hàng đã xữ lý';
        } else {
            $status = 'Đơn hàng đã hủy';
        }
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
            ->with('orderStatus', $status)
            ->with('discountAmount', $discount_amount)
            ->with('summaryProduct', $summary_product)
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

        $order_ship = OrderProduct::with([
            'shippingAddress.province',
            'shippingAddress.districts',
            'shippingAddress.wards'

        ])
            ->where('order_code', $order_code)->first();

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

        if ($order_ship->order_status == 0) {
            $order_status = 'Đã hủy';
        } elseif ($order_ship->order_status == 2) {
            $order_status = 'Đã xác nhận';
        } else {
            $order_status = 'Đơn hàng mới';
        }

        return view('admin.order.order_detail')
            ->with('detailOrder', $data_detailOrder)
            ->with('orderShip', $order_ship)
            ->with('orderCount', $order_count_quantity)
            ->with('orderStatus', $order_status)
            ->with('discountAmount', $discount_amount);
    }


    public function update_status_order(Request $request)
    {
        $data = $request->all();
        $orderCode = $data['ordercode'];
        $orderReason = $data['orderreason'];
        $orderStatus = $data['orderstatus'];

        $order_update = OrderProduct::where('order_code', $orderCode)->first();
        $order_update->order_status = $orderStatus;
        $order_update->order_cancellation_reason = $orderReason;
        $order_update->save();
        $orderStatusText = '';

        if ($order_update->order_status == 0) {
            $orderStatusText = 'Đã hủy';
        } elseif ($order_update->order_status == 2) {
            $orderStatusText = 'Đã xác nhận';
        } else {
            $orderStatusText = 'Đơn hàng mới';
        }


        // Trả về phản hồi JSON mà không lưu vào CSDL
        return response()->json([
            'message' => 'Đơn hàng đã được cập nhật.',
            'orderStatusText' => $orderStatusText // Trả về tên trạng thái

        ]);
    }


    // USER


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

    public function view_history($order_code)
    {
        $brand = Brand::get();
        $category = Category::get();
        $order_update = OrderProduct::where('order_code', $order_code)->first();
        $order_count_quantity = 0;
        $data_detailOrder = OrderDetail::where('order_code', $order_code)->get();

        foreach ($data_detailOrder as $detailOrder) {
            $order_count_quantity += $detailOrder['product_sale_quantity'];
        }

        $order_ship = OrderProduct::with([
            'shippingAddress.province',
            'shippingAddress.districts',
            'shippingAddress.wards'

        ])
            ->where('order_code', $order_code)->first();

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

        if ($order_ship->order_status == 0) {
            $order_status = 'Đã hủy';
        } elseif ($order_ship->order_status == 2) {
            $order_status = 'Đã xác nhận';
        } else {
            $order_status = 'Đơn hàng mới';
        }

        // return view('admin.order.order_detail')
        //     ->with('detailOrder', $data_detailOrder)
        //     ->with('orderShip', $order_ship)
        //     ->with('orderCount', $order_count_quantity)
        //     ->with('orderStatus', $order_status)
        //     ->with('discountAmount', $discount_amount);
        return view('user.shopping.view_history_order')
            ->with('brands', $brand)
            ->with("categorys", $category)
        ;
    }
}