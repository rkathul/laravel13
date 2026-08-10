<?php

namespace App\Http\Repositories;

use App\Models\Blog;


class BlogRepository
{
    public function getBlogs()
    {
        return Blog::select('id', 'title', 'slug', 'content','user_id')
        ->with('user')
        ->where('is_published',true)
        ->paginate(10);
    }

    public function createBlog(array $data):Blog
    {
        return Blog::create($data);
    }

    public function updateblog(array $data,int $id): Blog
    {
        $blog = Blog::findOrFail($id);
        $blog->update($data);
        return $blog;
    }

    public function deleteBlog($id): void
    {
        Blog::findOrFail($id)->delete();
    }


    
}
