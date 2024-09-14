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

    public function showPostsByUserId(Request $request, array $vars): Response
    {
        $userId = (int)$vars['userId'];
        $posts = $this->postService->getPostByUser($userId);

        if (empty($posts)) {
            return new Response('No post found', 404);
        }

        $responseContent = [];
        foreach ($posts as $post) {
            $responseContent[] = [
                'id' => $post->getId(),
                'title' => $post->getTitle(),
                'content' => $post->getContent(),
                'userId' => $post->getUserId(),
                'createdAt' => $post->getCreatedAt()->format(DATE_ATOM),
                'updatedAt' => $post->getUpdatedAt()->format(DATE_ATOM),
            ];
        }

        return new Response(json_encode($responseContent), 200, ['Content-Type' => 'application/json']);
    }
}
