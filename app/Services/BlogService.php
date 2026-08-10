<?php

namespace App\Services;

use App\Http\Repositories\BlogRepository;
use Auth;

class BlogService
{
    public function __construct(private BlogRepository $blogRepository)
    {
    }

    public function getblogs()
    {
        return $this->blogRepository->getBlogs();
    }

    public function getBlogBySlug(string $slug)
    {

        return $this->blogRepository->getBlogBySlug($slug);
    }

    public function createBlog(array $data)
    {
        $data['user_id'] = Auth::user()->id;
        $tags = explode(',', $data['tags']);
        unset($data['tags']);
        $blog =$this->blogRepository->createBlog($data);
        $tagData = [];
        foreach ($tags as $tag) {
            $tagData[] = ['tag_name' => trim($tag), 'blog_id' => $blog->id, 'created_at' => now(), 'updated_at' => now()];
        }
        $this->blogRepository->updateTags($tagData);
        return $blog;
    }

    public function updateBlog(array $data, int $id)
    {
        $data['user_id'] = Auth::user()->id;
        $blog = $this->blogRepository->getBlogById($id);
        $tags = explode(',', $data['tags']);
        unset($data['tags']);
        if ($blog->user_id !== Auth::user()->id) {
            throw new \Exception('You are not authorized to update this blog.');
        }
        $blog = $this->blogRepository->updateBlog($data, $id);
        $tagData = [];
        foreach ($tags as $tag) {
            $tagData[] = ['tag_name' => trim($tag), 'blog_id' => $blog->id, 'created_at' => now(), 'updated_at' => now()];
        }
        $this->blogRepository->updateTags($tagData);
        return $blog;
        
    }

    public function deleteBlog(int $id) 
    {
        return $this->blogRepository->deleteBlog($id);
    }

   

   
}
