<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    public function myPosts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    public function latestPost()
    {
        return $this->myPosts()->orderBy('id', 'desc')->paginate(5);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function name() : Attribute
    {
        return Attribute::make(
            get: fn ($value) => "Aye Aye",
        );
    }

    public function photo()
    {
        if($this->image) {
            return Storage::url($this->image->path);
        }

        return url('/images/avatar.jpg');
    }
}
