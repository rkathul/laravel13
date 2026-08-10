<?php

namespace App\Services;

use App\Http\Repositories\BlogRepository;

class BlogService
{
    public function __construct(private BlogRepository $blogRepository)
    {
    }

    public function getblogs()
    {
        return $this->blogRepository->getBlogs();
    }

   
}
