<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class PageController extends Controller
{
    public function blog()
    {
        $posts = Post::orderBy('id','DESC')->where('status','PUBLISHED')->paginate(3);
        return view('web.posts', compact('posts'));
    }

    public function post($slug)
    {
        $post = Post::where('slug',$slug)->firstOrFail();
        return view('web.post', compact('post'));
    }

    public function category($slug)
    {
        $category = Category::where('slug',$slug)->pluck('id')->firstOrFail();
        $posts    = Post::where('category_id',$category)->orderBy('id','DESC')
            ->where('status','PUBLISHED')->paginate(3);
        return view('web.posts', compact('posts'));
    }

    public function tag($slug)
    {
        $posts = Post::whereHas('tags', function ($query) use($slug){
            $query->where('slug',$slug);
        })
        ->orderBy('id','DESC')->where('status','PUBLISHED')->paginate(3);
        return view('web.posts', compact('posts'));

    }
}
