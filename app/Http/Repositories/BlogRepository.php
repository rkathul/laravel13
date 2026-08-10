<?php

namespace App\Http\Repositories;

use App\Models\Blog;
use App\Models\Tag;


class BlogRepository
{
    public function getBlogs()
    {
        return Blog::select('id', 'title', 'slug', 'content','user_id')
        ->with('user','tags')
        ->where('is_published',true)
        ->paginate(10);
    }

    public function getBlogById(int $id)
    {
        return Blog::findOrFail($id);
    }

    public function getBlogBySlug(string $slug)
    {
        return Blog::select('id', 'title', 'slug', 'content','user_id')
        ->with('user','comments.user','tags')
        ->where('slug',$slug)
        ->where('is_published',true)
        ->firstOrFail();
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

    public function updateTags( array $tags): void
    {
        Tag::whereIn('blog_id', array_column($tags, 'blog_id'))->delete();
        Tag::insert($tags);
    }

    
}
