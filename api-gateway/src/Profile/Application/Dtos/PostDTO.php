<?php

namespace App\Profile\Application\Dtos;

use DateTimeImmutable;

class PostDTO
{
    private int $id;
    private int $userId;
    private string $content;
    private DateTimeImmutable $createdAt;
    private DateTimeImmutable $updatedAt;
    private array $comments;

    public function __construct(
        int $id,
        int $userId,
        string $content,
        DateTimeImmutable $createdAt,
        DateTimeImmutable $updatedAt,
        array $comments
    ){
        $this->id = $id;
        $this->userId = $userId;
        $this->content = $content;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->comments = $comments;
    }

    public function addComments( array $comments): void
    {
        $this->comments = $comments;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return string
     */
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

    public function getComments(): array
    {
        return $this->comments;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'user_id' => $this->getUserId(),
            'content' => $this->getContent(),
            'created_at' => $this->getCreatedAt(),
            'updated_at' => $this->getUpdatedAt(),
            'comments' => array_map(function ($comment) {
                return $comment->toArray();
            }, $this->comments),
        ];
    }


}