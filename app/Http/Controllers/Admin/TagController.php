<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('id','DESC')->paginate(10);
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagStoreRequest $request)
    {
        $tag = Tag::create($request->all());
        return redirect()->route('tags.edit', $tag->id)
            ->with('info','Etiqueta creada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagUpdateRequest $request, Tag $tag)
    {
        $tag->fill($request->all())->save();
        return redirect()->route('tags.index')
            ->with('info','Etiqueta creada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return back()->with('info', 'Etiqueta eliminada correctamente');
    }
}
