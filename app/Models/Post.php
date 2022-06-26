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
}
