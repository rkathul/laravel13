<?php

namespace App\Http\Repositories;

use App\Models\Comment;


class CommentRepository
{
    
    public function createComment(array $data):Comment
    {
        return Comment::create($data);
    }

    public function updateComment(array $data,int $id): Comment
    {
        $comment = Comment::findOrFail($id);
        $comment->update($data);
        return $comment;
    }

    public function deleteComment($id): void
    {
        Comment::findOrFail($id)->delete();
    }


    
}
