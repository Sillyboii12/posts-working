<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\EventController;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = $request->filter ?? "";
        $posts = $filter == 'deleted' ? Post::whereNotNull('deleted_at')->paginate(3) : Post::whereNull('deleted_at')->paginate(3);
        return view('posts.index', ['posts' => $posts]);
    }

    public function add(Post $post)
    {
        $post->update([
            'deleted_at' => NULL,
        ]);
        return redirect(route('posts.index'))->with('status', 'Post re-added');
    }

    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => "required|min:3|string",
            'content' => "required|min:3|string",
        ]);
        $data = [
            'title' => $validated['title'],
            'content' => $validated['content']
        ];

        Post::create($data);

        return redirect(route('posts.index'))->with('status', 'Post Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {

        $validated = $request->validate([
            'title' => "required|min:3|string",
            'content' => "required|min:3|string",
        ]);
        $data = [
            'title' => $validated['title'],
            'content' => $validated['content']
        ];

        $post->update($data);

        return redirect(route('posts.index'))->with('status', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->update([
            'deleted_at' => now(),
        ]);

        return redirect(route('posts.index'))->with('status', 'Post Deleted');
    }

    public function status(Request $request ,Post $post) {
        $post->update([
            'status' => $request['status'],
        ]);
        return redirect(route('posts.show', $post))->with('status', 'Status updated succesfully');
    }

    public function duplicate(Post $post){


        $data = [
            'title' => "Copy of " . $post->title,
            'content' => $post->content,
        ];

        $postCreated = Post::create($data);

        return redirect(route('posts.show', $postCreated));
    }

    public function randomText(Request $request)
    {
        $length = $request->length ?? 10;

        $text = fake()->words($length, true);
        return view('posts.random', ['text' => $text]);
    }


}
