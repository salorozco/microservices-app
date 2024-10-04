<?php

namespace App\Profile\Application\Dtos;

use DateTimeImmutable;

class ConversationDTO
{
    private int $id;
    private string $title;
    private array $messages;
    private array $participants;
    private DateTimeImmutable $updatedAt;
    private DateTimeImmutable $createdAt;

    /**
     * @param int $id
     * @param string $title
     * @param array $messages
     * @param array $participants
     * @param DateTimeImmutable $updatedAt
     * @param DateTimeImmutable $createdAt
     */
    public function __construct(
        int $id,
        string $title,
        array $messages,
        array $participants,
        DateTimeImmutable $updatedAt,
        DateTimeImmutable $createdAt
    ){
        $this->id = $id;
        $this->title = $title;
        $this->messages = $messages;
        $this->participants = $participants;
        $this->updatedAt = $updatedAt;
        $this->createdAt = $createdAt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getMessages(): array
    {
        return $this->messages;
    }

    public function getParticipants(): array
    {
        return $this->participants;
    }

    public function getUpdatedAt(): DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'messages' => array_map(function (MessageDTO $message) {
                return $message->toArray();
            }, $this->messages),
            'participants' => $this->participants,
            'updatedAt' => $this->updatedAt,
            'createdAt' => $this->createdAt,
        ];
    }
}