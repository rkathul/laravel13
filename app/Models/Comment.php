<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use SoftDeletes;

    protected $fillable = ['comment', 'blog_id', 'user_id', 'is_published'];

    public function blog()
    {
        return $this->belongsTo(Blog::class)->select('id', 'title', 'slug', 'content','user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class)->select('id', 'name', 'email');
    }
}
