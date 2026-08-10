<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    protected $fillable =['title','slug','user_id','is_published','content'];

    public function user()
    {
        return $this->belongsTo(User::class)->select('id', 'name', 'email');;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->select('id', 'comment', 'blog_id', 'user_id', 'is_published')->where('is_published', true);
    }
}
