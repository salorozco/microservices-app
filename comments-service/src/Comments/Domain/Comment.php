<?php

declare(strict_types=1);

namespace App\Comments\Domain;

use DateTimeImmutable;

class Comment
{
    private int $id;
    private int $postId;
    private string $content;
    private DateTimeImmutable $createdAt;
    private DateTimeImmutable $updatedAt;

    public function __construct(
        int $id,
        int $postId,
        string $content,
        DateTimeImmutable $createdAt,
        DateTimeImmutable $updatedAt
    ){
        $this->id = $id;
        $this->postId = $postId;
        $this->content = $content;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
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

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTimeImmutable
    {
        return $this->updatedAt;
    }
}
