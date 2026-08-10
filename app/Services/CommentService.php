<?php

namespace App\Services;

use App\Http\Repositories\CommentRepository;
use Auth;

class CommentService
{
    public function __construct(private CommentRepository $commentRepository)
    {
    }

    public function createComment(array $data)
    {
        $data['user_id'] = Auth::user()->id;
        return $this->commentRepository->createComment($data);
    }

    public function updateComment(array $data, int $id)
    {
        $data['user_id'] = Auth::user()->id;
        $comment = $this->commentRepository->getCommentById($id);
        if ($comment->user_id !== Auth::user()->id) {
            throw new \Exception('You are not authorized to update this comment.');
        }
        return $this->commentRepository->updateComment($data, $id);
    }

    public function deleteComment(int $id) 
    {
        return $this->commentRepository->deleteComment($id);
    }
}
