<?php

namespace App\Http\Controllers;

use App\Models\CateActicleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

session_start();
class ActicleControll extends Controller
{

    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            Redirect::to('admin.dashboard');
        } else {
            return Redirect::to('admincp')->send();
        }
    }
    public function add_cate_post()
    {
        return view('admin.articles.cate_acticle');
    }
    public function save_cate_post(Request $request)
    {
        $cate_post = new CateActicleModel();
        $cate_post->tenloaibaiviet = $request->cate_post_name;
        $cate_post->status_post = $request->cate_post_status;
        $cate_post->save();
        return Redirect::to('list-cate-post');
    }


    public function list_cate_post()
    {

        $cate_post = CateActicleModel::get();
        return view('admin.articles.list_cate_post')
            ->with('cate_posts', $cate_post);
    }

    public function inactive_cate_post($id_cate_post)
    {

        $cate_post = CateActicleModel::find($id_cate_post);
        $cate_post->status_post = 2;
        $cate_post->save();

        return Redirect::to('list-cate-post');
    }
    public function active_cate_post($id_cate_post)
    {
        $cate_post = CateActicleModel::find($id_cate_post);
        $cate_post->status_post = 0;
        $cate_post->save();
        return Redirect::to('list-cate-post');
    }
}
