<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::when(request('search'), function($query, $search) {
            $query->where('title', 'like', "%$search%");
        })
        ->latest('id')
        ->paginate(10)
        ->withQueryString();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(PostRequest $request)
    {
        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $dir = public_path('/upload/images');
        $file->move($dir, $fileName);
        $imageUrl = Storage::url("/images/$fileName");

        //mass assignment
        $post = auth()->user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $imageUrl
        ]);

        $post->categories()->attach($request->categories);

        // foreach($request->categories as $key => $category) {
        //     DB::table('category_post')->insert([
        //         'post_id' => $post->id,
        //         'category_id' => $category
        //     ]);
        // }

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
        $post->categories()->sync($request->categories);

        // DB::table('category_post')
        // ->where('post_id', $post->id)
        // ->delete();

        // foreach($request->categories as $category) {
        //     DB::table('category_post')->insert([
        //         'post_id' => $post->id,
        //         'category_id' => $category
        //     ]);
        // }

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
