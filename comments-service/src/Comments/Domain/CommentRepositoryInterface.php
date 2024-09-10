<?php

declare(strict_types=1);

namespace App\Comments\Domain;

interface CommentRepositoryInterface
{
    public function findCommentById(int $id): ?Comment;
    public function findCommentsByPostIds(array $postIds): ?array;
}
