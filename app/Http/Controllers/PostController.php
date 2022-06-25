<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::select('posts.*', 'users.name as author_name')
                ->join('users', 'posts.user_id', 'users.id')
                ->paginate(5);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        // $post = new Post;
        // $post->title = $request->title;
        // $post->body = $request->body;
        // $post->created_at = now();
        // $post->updated_at = now();
        // $post->save();

        //mass assignment
        // Post::create([
        //     'title' => $request->title,
        //     'body' => $request->body
        // ]);

        // use request
        Post::create($request->only(['title', 'body'])); 

        // session()->flash('success', 'A post was created successfully.');

        return redirect('/posts')->with('success', 'A post was created successfully.');
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }

    public function show($id)
    {
        $post = Post::select('posts.*', 'users.name as author_name')
                    ->join('users', 'posts.user_id', 'users.id')
                    ->find($id);

        return view('posts.show', compact('post'));
    }

    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);
        // $post->title = $request->title;
        // $post->body = $request->body;
        // $post->updated_at = now();
        // $post->save();

        //mass assignment
        // $post->update([
        //     'title' => $request->title,
        //     'body' => $request->body
        // ]);

        // use request
        $post->update($request->only(['title', 'body']));

        // session()->flash('success', 'A post was updated successfully.');

        return redirect('/posts')->with('success', 'A post was updated successfully.');
    }

    public function destroy($id)
    {
        Post::destroy($id);

        // session()->flash('success', 'A post was deleted successfully.');

        return redirect('/posts')->with('success', 'A post was deleted successfully.');
    }
}
