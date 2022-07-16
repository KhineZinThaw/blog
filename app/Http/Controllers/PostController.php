<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\PostImage;
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

        //mass assignment
        $post = auth()->user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body,
            // 'image' => $imageUrl
        ]);

        // upload multiple image
        foreach($request->file('images') as $file) {
        $filename = time() . '_' . $file->getClientOriginalName();
        $dir = '/upload/images';
        $path = $file->storeAs($dir, $filename);

            // PostImage::create([
            //     'post_id' => $post->id,
            //     'path' => $path
            // ]);

            $post->images()->create([
                'path' => $path,
            ]);
        }

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

        // delete old image
        foreach($post->images as $image) {
            // unlink(public_path($image->path));
            Storage::delete($image->path);
            // PostImage::where('post_id', $post->id)->delete();
        }

        // upload a image
        foreach($request->images as $file) {
            $filename = time() . '_' . $file->getClientOriginalName();
            $dir = '/upload/images';
            $path = $file->storeAs($dir, $filename);

            // PostImage::create([
            //     'post_id' => $post->id,
            //     'path' => $path
            // ]);

            $post->images()->create([
                'path' => $path,
            ]);
        }

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
