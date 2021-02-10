<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function blog()
    {
        $posts = Post::orderBy('id','DESC')->where('status','PUBLISHED')->paginate(3);

        return view('web.posts', compact('posts'));
    }
}
