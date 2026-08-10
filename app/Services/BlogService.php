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
        return $this->blogRepository->createBlog($data);
    }

    public function updateBlog(array $data, int $id)
    {
        $data['user_id'] = Auth::user()->id;
        $blog = $this->blogRepository->getBlogById($id);
        if ($blog->user_id !== Auth::user()->id) {
            throw new \Exception('You are not authorized to update this blog.');
        }
        return $this->blogRepository->updateBlog($data, $id);
    }

    public function deleteBlog(int $id) 
    {
        return $this->blogRepository->deleteBlog($id);
    }

   

   
}
