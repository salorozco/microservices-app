<?php

declare(strict_types=1);

namespace App\Comments\Domain;

class Comment
{
    private int $id;
    private int $postId;
    private string $content;

    public function __construct(int $id, int $postId, string $content)
    {
        $this->id = $id;
        $this->postId = $postId;
        $this->content = $content;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPostId(): int
    {
        return $this->postId;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
