<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Tag extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'blog_id'];

    public function blog()
    {
        return $this->belongsTo(Blog::class)->select('id', 'title', 'slug', 'content','user_id');
    }
}
