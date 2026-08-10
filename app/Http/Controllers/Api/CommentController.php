<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Comment\CreateCommentRequest;
use App\Http\Requests\Comment\UpdateCommentRequest;
use App\Services\CommentService;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
    public function __construct(private CommentService $commentService)
    {
    }

    public function createComment(CreateCommentRequest $request):JsonResponse
    {
        try{

            $comment = $this->commentService->createComment($request->validated());
            return response()->json([
                'success' => true,
                'message' => 'Comment created successfully',
                'data' => ['id' => $comment->id, 'comment' => $comment->comment, 'blog_id' => $comment->blog_id],
            ], 201);

        } catch(\Throwable $e) {
             return response()->json([
                'message' => 'Something went wrong, Please try again',
            ], 500);
        }
    }

    public function updateComment(UpdateCommentRequest $request,int $id): JsonResponse
    {
        try {
            $comment = $this->commentService->updateComment($request->validated(), $id);
            return response()->json([
                    'success' => true,
                    'message' => 'Comment updated successfully',
                    'data' => ['id' => $comment->id, 'comment' => $comment->comment, 'blog_id' => $comment->blog_id],
            ], 200);
        } catch(\Throwable $e) {
             return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function deleteComment(int $id): JsonResponse
    {
        try {
            $this->commentService->deleteComment($id);
            return response()->json([
                'success' => true,
                'message' => 'Comment deleted successfully',
            ], 200);
        } catch(\Throwable $e) {
             return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
