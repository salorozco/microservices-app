<?php

namespace App\Profile\Application\Dtos;

use DateTimeImmutable;

class NotificationDTO
{
    private int $id;
    private int $recipientId;
    private int $actorId;
    private int $entityId;
    private string $entityType;
    private string $message;
    private string $type;
    private string $status;
    private DateTimeImmutable $createdAt;

    /**
     * @param int $id
     * @param int $recipientId
     * @param int $actorId
     * @param int $entityId
     * @param string $entityType
     * @param string $message
     * @param string $type
     * @param string $status
     * @param DateTimeImmutable $createdAt
     */
    public function __construct(int $id, int $recipientId, int $actorId, int $entityId, string $entityType, string $message, string $type, string $status, DateTimeImmutable $createdAt)
    {
        $this->id = $id;
        $this->recipientId = $recipientId;
        $this->actorId = $actorId;
        $this->entityId = $entityId;
        $this->entityType = $entityType;
        $this->message = $message;
        $this->type = $type;
        $this->status = $status;
        $this->createdAt = $createdAt;
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
    public function getRecipientId(): int
    {
        return $this->recipientId;
    }

    /**
     * @return int
     */
    public function getActorId(): int
    {
        return $this->actorId;
    }

    /**
     * @return int
     */
    public function getEntityId(): int
    {
        return $this->entityId;
    }

    /**
     * @return string
     */
    public function getEntityType(): string
    {
        return $this->entityType;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'recipientId' => $this->recipientId,
            'actorId' => $this->actorId,
            'entityId' => $this->entityId,
            'entityType' => $this->entityType,
            'message' => $this->message,
            'type' => $this->type,
            'status' => $this->status,
            'createdAt' => $this->createdAt,
        ];
    }

}