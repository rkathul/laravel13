<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BlogService;



class BlogController extends Controller
{
    public function __construct(private BlogService $blogService)
    {
    }
    
    public function listBlogs() 
    {
        $blogs = $this->blogService->getblogs();
        return response()->json($blogs);
    }

}
