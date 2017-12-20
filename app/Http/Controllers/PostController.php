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

        /*
        $posts = Post::withTrashed()
                ->where('title', 'sunny')
                ->get();

        $posts = Post::onlyTrashed()
                ->where('title', 'sunny')
                ->get();        
        
        //完全削除
        $post = Post::find(1);
        $post->forceDelete();       
        */

        // 全グローバルスコープの削除
        //Post::withoutGlobalScopes()->get();
        //Post::withoutGlobalScope(TitleScope::class)->get();
        
        /*
        $posts = Post::has('plants')->get();
        $posts = Post::whereHas('plants', function ($query) {
            $query->where('name', 'like', 'sunny%');
        })->get();

        $posts = Post::whereDoesntHave('plants', function ($query) {
            $query->where('name', 'like', 'sunny%');
        })->get();

        $posts = Post::withCount([
            'plants',
            'plants as cond_plants_count' => function ($query) {
                $query->where('name', 'like', 'sunny%');
            }
        ])->get();
        echo $posts[0]->plants_count;
        echo $posts[0]->cond_plants_count;
        */

        //Eagerロードへ
        /*
        $posts = Post::with('plants')->get();
        foreach ($posts as $post) {
            echo $post->plant->name;
        }
        $posts = Post::with('plants:name')->get();
        
        $posts = Post::with(['plants' => function ($query) {
            $query->where('name', 'like', '%sunny%')
                  ->orderBy('created_at', 'desc');
        }])->get();
        */

        $post = Post::find(1);
        foreach ($post->plants as $plant) {
            echo $plant->pivot->post_id;
        }


        $plants = Plant::all();
        return view('post.index', ['posts' => $posts, 'plants' => $plants, 'post' => $post]);
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
        /*
        $plant = new Plant(['name' => 'happy']);
        $post = Post::find(1);
        $post->plants()->save($plant);
        $post->plants()->saveMany([
            new Plant(['name' => 'rose']),
            new Plant(['name' => 'sunflower']),
        ]);
        */

        /*
        $plant = $post->plants()->create([
            'name' => 'happy',
        ]);
        
        $post->plants()->createMany([
            [
                'name' => 'rose',
            ],
            [
                'name' => 'sunflower',
            ],
        ]);
        */
        
        /*
        $post = Post::find(1);
        $post->plants()->attach($plantId);
        
        $post->plants()->detach($plantId);
        $post->plants()->sync([1, 2, 3]);
        $post->plants()->syncWithoutDetaching([1, 2, 3]);
        //関連の切り替え 
        $post->plants()->toggle([1, 2, 3]);

        $post->plants()->updateExistingPivot($plantId, $attributes);
        */

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', ['post' => $post]);
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
        

        /* 複数更新
        Post::where('title', 'sunny')
            ->update(['xxxx' => yyyy]);
        */

        /*
        $post = Post::updateOrCreate(
            ['title' => 'happy'],
            ['content' => 'Today is a happy day']
        );
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
        /*
        $post = Post::find(1);
        $post->delete();
        if ($post->trashed()) {
    
        }
        */
        
        /*
        Post::destroy(1);
        Post::destroy([1, 2, 3]);
        Post::destroy(1, 2, 3);
        */

        //$deletedRows = Post::where('title', 'sunny')->delete();
    }
}
