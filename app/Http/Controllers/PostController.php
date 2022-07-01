<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
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
        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => auth()->id(),
        ]);

        foreach($request->categories as $key => $category) {
            DB::table('category_post')->insert([
                'post_id' => $post->id,
                'category_id' => $category
            ]);
        }

        // use request
        // Post::create($request->only(['title', 'body'])); 

        // session()->flash('success', 'A post was created successfully.');

        return redirect('/posts')->with('success', 'A post was created successfully.');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function show($id)
    {
        // $post = Post::select('posts.*', 'users.name as author')
        //             ->join('users', 'posts.user_id', 'users.id')
        //             ->find($id);

        $post = Post::find($id);

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

        DB::table('category_post')
        ->where('post_id', $post->id)
        ->delete();

        foreach($request->categories as $category) {
            DB::table('category_post')->insert([
                'post_id' => $post->id,
                'category_id' => $category
            ]);
        }

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
