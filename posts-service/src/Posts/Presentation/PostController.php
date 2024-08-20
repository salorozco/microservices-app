<?php

declare(strict_types=1);

namespace App\Posts\Presentation;

use App\Posts\Application\PostService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PostController
{
    private PostService $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function show(Request $request, array $vars): Response
    {
        $postId = (int)$vars['id'];
        $post = $this->postService->getPost($postId);

        if ($post === null) {
            return new Response('Post not found', 404);
        }

        $responseContent = json_encode([
            'id' => $post->getId(),
            'title' => $post->getTitle(),
            'content' => $post->getContent(),
            'userId' => $post->getUserId(),
            'createdAt' => $post->getCreatedAt(),
            'updatedAt' => $post->getUpdatedAt(),
        ]);

        return new Response($responseContent, 200, ['Content-Type' => 'application/json']);
    }
}
