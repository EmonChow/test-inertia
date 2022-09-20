<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;
use Inertia\Inertia;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return Inertia::render('Post', ['posts' => $posts]);
      
        
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
    
        $post = new Post();
        $post->fill($request->all());
        if ($post->save()) {
            return response()->json(['message' => 'Post Created Successfully']);
        }
        return response()->json(['message' => 'Something went wrong'], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Post::findOrFail($id));
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->fill($request->all());
        if ($post->save()) {
            return response()->json(['message' => 'Post Updated Successfully']);
        }
        return response()->json(['message' => 'Something went wrong'], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Post::destroy($id)) {
            return response()->json(['message' => 'Post has been deleted successfully']);
        }
        return response()->json(['message' => 'Something went wrong'], 400);
    }
}
