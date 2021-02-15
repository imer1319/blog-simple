<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->where('user_id', auth()->id())->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $tags = Tag::orderBy('name', 'ASC')->get();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(PostStoreRequest $request)
    {
        $post = Post::create($request->all());

        //imagen
        if ($request->file('file')) {
            $path = Storage::disk('public')->put('image', $request->file('file'));
            $post->fill(['file' => asset($path)])->save();
        }
        //tags
        $post->tags()->attach($request->get('tags'));

        return redirect()->route('posts.edit', $post->id)
            ->with('info', 'Entrada creada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return Response
     */
    public function show(Post $post)
    {
        $this->authorize('pass',$post);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|\Illuminate\Contracts\View\View|Response
     */
    public function edit(Post $post)
    {
        $this->authorize('pass',$post);
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $tags = Tag::orderBy('name', 'ASC')->get();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostUpdateRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $this->authorize('pass',$post);
        $post->fill($request->all())->save();
        //imagen
        if ($request->file('file')) {
            $path = Storage::disk('public')->put('image', $request->file('file'));
            $post->fill(['file' => asset($path)])->save();
        }
        //tags
        $post->tags()->sync($request->get('tags'));

        return redirect()->route('posts.index', $post->id)
            ->with('info', 'Entrada actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('pass',$post);
        $post->delete();
        return back()->with('info', 'Entrada eliminada correctamente');
    }
}
