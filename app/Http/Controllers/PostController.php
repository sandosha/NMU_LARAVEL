<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use Illuminate\Pagination\Paginator;

Paginator::useBootstrap(); // إذا كنت تستخدم Bootstrap

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts = Post::/*with('user')->*/paginate(10);

        return view('post.index', compact('posts'));

        //$result = Post::all();
        // return view('post.index', data: ["posts" => $result]);
    }


    public function create()
    {
        return view("post.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $request->validate(
            [
                'title' => 'required|min:3|unique:posts,title',
                'description' => 'required|min:10',
            ]
        );
        $data = $request->all();
        /*Post::create([
            "title" => $data['title'],
            "body" => $data['body']
        ]);*/
        $post = new Post();
        $post->title = $data['title'];
        $post->body = $data['body'];
        $post->user_id = Auth::id();
        $post->save();
        return redirect()->route('posts.index')->with('success', 'Article created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('post.view', ["post" => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.edit', ["post" => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|min:3|unique:posts,title,' . $post->id,
            'description' => 'required|min:10',
        ]);

        //dd($request['title']);
        $post = Post::find($post->id);
        $post->title = $request['title'];
        $post->body = $request['body'];
        $post->save();
        return redirect("/posts");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect("/posts");
    }
}
