<?php

namespace App\Profile\Application\Dtos;

use DateTimeImmutable;
class MessageDTO
{
    private int $id;
    private string $content;
    private int $senderId;
    private int $conversationId;
    private DateTimeImmutable $sentAt;

    /**
     * @param int $id
     * @param string $content
     * @param int $senderId
     * @param int $conversationId
     * @param DateTimeImmutable $sentAt
     */
    public function __construct(
        int $id,
        string $content,
        int $senderId,
        int $conversationId,
        DateTimeImmutable $sentAt
    ){
        $this->id = $id;
        $this->content = $content;
        $this->senderId = $senderId;
        $this->conversationId = $conversationId;
        $this->sentAt = $sentAt;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return int
     */
    public function getSenderId(): int
    {
        return $this->senderId;
    }

    /**
     * @return int
     */
    public function getConversationId(): int
    {
        return $this->conversationId;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getSentAt(): DateTimeImmutable
    {
        return $this->sentAt;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'senderId' => $this->senderId,
            'conversationId' => $this->conversationId,
            'sentAt' => $this->sentAt,
        ];
    }

}