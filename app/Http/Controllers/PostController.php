<?php

namespace App\Http\Controllers;

use App\Post;
use App\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = DB::table('posts')->get();
        //$posts = DB::select('select * from posts');
        //$posts = Post::all();

        //$posts = Post::where('active', 1)
        //       ->orderBy('title', 'desc')
        //       ->take(1)
        //       ->get();

        //$posts = Post::find([1, 2, 3]);
        //$posts = Post::where('id', '>', 1)->firstOrFail();
        
        $plants = Plant::all();
        return view('post.index', ['posts' => $posts, 'plants' => $plants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->save();    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        /*
        DB::transaction(function () {
            DB::table('posts')->update('...');
        }, 5);
        */
        /*
        $post = Post::find(1);
        $post->title = 'sunny';
        $post->save();
        */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
