<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'title',
    //     'body'
    // ];

    protected $guarded = [];

    public function isOwnPost()
    {
        return Auth::check() && $this->user_id == Auth::id();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        // $categories = Category::select(['categories.*'])
        // ->join('category_post', 'category_post.category_id', 'categories.id')
        // ->where('category_post.post_id', $this->id)
        // ->get();

        // return $categories;

        return $this->belongsToMany(Category::class);
    }

    public function images()
    {
        return $this->hasMany(PostImage::class);
    }
}
