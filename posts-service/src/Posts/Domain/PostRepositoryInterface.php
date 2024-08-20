<?php

declare(strict_types=1);

namespace App\Posts\Domain;

interface PostRepositoryInterface
{
    public function findPostById(int $id): ?Post;
}
