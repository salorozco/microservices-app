<?php

declare(strict_types=1);

namespace App\Comments\Infrastructure;

use App\Comments\Domain\Comment;
use App\Comments\Domain\CommentRepositoryInterface;

class CommentRepository implements CommentRepositoryInterface
{
    // Mock data; replace with actual database interaction
    private array $comments = [
        1 => ['id' => 1, 'postId' => 1, 'content' => 'This is a comment on the first post.'],
        2 => ['id' => 2, 'postId' => 1, 'content' => 'This is another comment on the first post.']
    ];

    public function findCommentById(int $id): ?Comment
    {
        if (isset($this->comments[$id])) {
            $data = $this->comments[$id];
            return new Comment($data['id'], $data['postId'], $data['content']);
        }

        return null;
    }
}
