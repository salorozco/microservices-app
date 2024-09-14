<?php

declare(strict_types=1);

namespace App\Posts\Application;

use App\Posts\Domain\PostRepositoryInterface;

class PostService
{
    private PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getPost(int $id)
    {
        return $this->postRepository->findPostById($id);
    }

    public function getPostByUser(int $userId)
    {
        return $this->postRepository->findPostByUserId($userId);
    }
}
