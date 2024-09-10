<?php

declare(strict_types=1);

namespace App\Comments\Application;

use App\Comments\Domain\CommentRepositoryInterface;

class CommentService
{
    private CommentRepositoryInterface $commentRepository;

    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function getComment(int $id)
    {
        return $this->commentRepository->findCommentById($id);
    }

    public function getCommentsByPostIds(array $postIds)
    {
        return $this->commentRepository->findCommentsByPostIds($postIds);
    }
}
