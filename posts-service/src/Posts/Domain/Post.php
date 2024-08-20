<?php

declare(strict_types=1);

namespace App\Posts\Domain;

use DateTimeImmutable;

class Post
{
    private int $id;
    private string $title;
    private string $content;
    private int $userId;
    private DateTimeImmutable $createdAt;
    private DateTimeImmutable $updatedAt;

    public function __construct(
        int $id,
        string $title,
        string $content,
        int $userId,
        DateTimeImmutable $createdAt,
        DateTimeImmutable $updatedAt
    ){
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->userId = $userId;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;

    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
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
