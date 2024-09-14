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
        $comment = $this->commentService->getComment((int)$vars['id']);

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

    public function showCommentsByPostIds(Request $request, array $vars): Response
    {
        $postIds = $request->query->all('postIds');
        $comments = $this->commentService->getCommentsByPostIds($postIds);

        if (empty($postIds)) {
            return new Response('Comment not found', 404);
        }

        $responseContent = [];
        foreach ($comments as $comment) {
            $responseContent[] = [
                'id' => $comment->getId(),
                'post_id' => $comment->getPostId(),
                'content' => $comment->getContent(),
                'createdAt' => $comment->getCreatedAt()->format(DATE_ATOM),
                'updatedAt' => $comment->getUpdatedAt()->format(DATE_ATOM),
            ];
        }

        return new Response(json_encode($responseContent), 200, ['Content-Type' => 'application/json']);
    }
}
