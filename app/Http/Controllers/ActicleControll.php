<?php

namespace App\Http\Controllers;

use App\Models\ActicleModel;
use App\Models\CateActicleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use App\Models\Brand;

use App\Models\Category;

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
        return view('admin.cate-articles.cate_acticle');
    }
    public function save_cate_post(Request $request)
    {
        $cate_post = new CateActicleModel();
        $cate_post->tenloaibaiviet = $request->cate_post_name;
        $cate_post->status_cate_post = $request->cate_post_status;
        $cate_post->save();
        return Redirect::to('list-cate-post');
    }


    public function list_cate_post()
    {

        $cate_post = CateActicleModel::get();
        return view('admin.cate-articles.list_cate_post')
            ->with('cate_posts', $cate_post);
    }

    public function inactive_cate_post($id_cate_post)
    {

        $cate_post = CateActicleModel::find($id_cate_post);
        $cate_post->status_cate_post = 2;
        $cate_post->save();

        return Redirect::to('list-cate-post');
    }
    public function active_cate_post($id_cate_post)
    {
        $cate_post = CateActicleModel::find($id_cate_post);
        $cate_post->status_cate_post = 1;
        $cate_post->save();
        return Redirect::to('list-cate-post');
    }

    public function add_post()
    {
        $cate_post = CateActicleModel::get();
        return view('admin.post.add_post')->with('cate_posts', $cate_post);
    }

    public function save_post(Request $request)
    {
        $new_post = new ActicleModel();
        // $data = $request->all();
        $new_post->name_article = $request->post_name;
        $new_post->group_cate_acticle = $request->id_cate_acticle;
        $new_post->content_article = $request->content_post;
        $new_post->status_article = 1;

        $get_image = $request->file('post_image');

        // xữ lý phần up hình ảnh lên mysql
        if ($get_image) {
            $new_image = time() . '_' . $get_image->getClientOriginalName();
            $get_image->move('uploads/post', $new_image);
            $new_post->image_acticle = $new_image;
        } else {
            $new_post->image_acticle = '';
        }
        // echo $new_image;
        $new_post->save();
        return Redirect::to('all-post');
    }


    public function all_post()
    {
        $posts = ActicleModel::all();
        return view('admin.post.all_post')->with('all_post', $posts);
    }


    // USER

    public function list_post($id_cate_acticle)
    {
        $brand = Brand::get();
        $category = Category::get();
        $post_cate = CateActicleModel::where('status_cate_post', 1)->get();
        $posts = ActicleModel::where('group_cate_acticle', $id_cate_acticle)->where('status_article', 1)->get();
        return view('user.view_post.view_list_post')
            ->with('brands', $brand)
            ->with('categorys', $category)
            ->with('cate_acticles', $post_cate)
            ->with('posts', $posts)
        ;
    }
}
