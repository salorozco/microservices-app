<?php

declare(strict_types=1);

namespace App\Comments\Presentation;

use App\Comments\Application\CommentService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CommentController
{
    private CommentService $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function show(Request $request, array $vars): Response
    {
        $commentId = (int)$vars['id'];
        $comment = $this->commentService->getComment($commentId);

        if ($comment === null) {
            return new Response('Comment not found', 404);
        }

        $responseContent = json_encode([
            'id' => $comment->getId(),
            'postId' => $comment->getPostId(),
            'content' => $comment->getContent()
        ]);

        return new Response($responseContent, 200, ['Content-Type' => 'application/json']);
    }
}
