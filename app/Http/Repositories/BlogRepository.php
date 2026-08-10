<?php

namespace App\Http\Repositories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Builder;


class BlogRepository
{
    public function getBlogs()
    {
        return Blog::select('id', 'title', 'slug', 'content')
        ->where('is_published',true)
        ->paginate(10);
    }

    
}
