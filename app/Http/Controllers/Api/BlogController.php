<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BlogService;
use App\Http\Requests\Blog\CreateBlogRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;
use Illuminate\Http\JsonResponse;



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

    public function createBlog(CreateBlogRequest $request):JsonResponse
    {
        try {
            $blog = $this->blogService->createBlog($request->validated());

            return response()->json([
                'success' => true,
                'message' => 'Blog created successfully',
                'data' => ['id' => $blog->id, 'title' => $blog->title, 'content' => $blog->content, 'slug' => $blog->slug],
            ], 201);

        } catch(\Throwable $e) {
             return response()->json([
                'message' => 'Something went wrong, Please try again',
            ], 500);
        }
    }

    public function updateBlog(UpdateBlogRequest $request,int $id): JsonResponse
    {
        try {
            $blog = $this->blogService->updateBlog($request->validated(), $id);
            return response()->json([
                    'success' => true,
                    'message' => 'Blog updated successfully',
                    'data' => ['id' => $blog->id, 'title' => $blog->title, 'content' => $blog->content, 'slug' => $blog->slug],
            ], 200);
        } catch(\Throwable $e) {
             return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function deleteBlog(int $id): JsonResponse
    {
        try {
            $blog = $this->blogService->deleteBlog($id);
            return response()->json([
                    'success' => true,
                    'message' => 'Blog deleted successfully',
            ], 200);
        } catch(\Throwable $e) {
             return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }  
    }



}
