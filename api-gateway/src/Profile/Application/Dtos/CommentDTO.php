<?php

namespace App\Profile\Application\Dtos;

use DateTimeImmutable;

class CommentDTO
{
    public $id;
    public $postId;
    public $content;
    private DateTimeImmutable $createdAt;
    private DateTimeImmutable $updatedAt;

    public function __construct(
        $id,
        $postId,
        $content,
        DateTimeImmutable $createdAt,
        DateTimeImmutable $updatedAt,
    ){
        $this->id = $id;
        $this->postId = $postId;
        $this->content = $content;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * @return mixed
     */
    public function getContent()
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

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'postId' => $this->getPostId(),
            'content' => $this->getContent(),
            'createdAt' => $this->getCreatedAt(),
            'updatedAt' => $this->getUpdatedAt(),
        ];
    }


}