<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function add_comment(Request $request)
    {

        $data = $request->all();
    }
}