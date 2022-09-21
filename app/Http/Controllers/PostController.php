<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'ASC')->paginate(10);
        return Inertia::render('Post', ['posts' => $posts]);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('PostCreate');
    }

    public function edit(Post $post)
    {
        return Inertia::render('PostEdit', [
            'post' => [
                'id' => $post->id,
                'title' => $post->title,
                'description' => $post->description,
                'name' => $post->name
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        Post::create($request->all());
        return Redirect::route('posts.index');
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->fill($request->all());
        if ($post->save()) {
            return Redirect::route('posts.index');
        }
        return response()->json(['message' => 'Something went wrong'], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        
        return Redirect::route('posts.index');
    }
}
