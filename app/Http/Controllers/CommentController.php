<?php

namespace App\Http\Controllers;

use App\Models\CommentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function add_comment(Request $request)
    {

        $data = $request->all();
        $id_product = $data['id_product'];
        $id_user = Session::get('id_customer');
        $comment = $data['comment'];
        if (!$id_user) {
            return response()->json(['status' => 'error', 'message' => 'Vui lòng đăng nhập hoặc đăng ký để thêm vào yêu thích']);
        }
        $add_comment = new CommentModel();
        $add_comment->id_phone_comment = $id_product;
        $add_comment->id_user_comment = $id_user;
        $add_comment->comment_text = $comment;
        $add_comment->save();
        return response()->json(['status' => 'success', 'message' => 'Đánh giá của bạn đã được gửi!']);
    }

    public function get_comment(Request $request)
    {
        $data = $request->all();
        $id_product = $data['id_product'];
        $data_comment = CommentModel::where("id_phone_comment ", $id_product)->get();
        $output_cmt = "";
        foreach ($data_comment as $commemt) {
            $name = $commemt->cmt_name;
        }
        echo $output_cmt;
    }
}
