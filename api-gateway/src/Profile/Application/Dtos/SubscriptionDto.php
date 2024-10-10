<?php

namespace App\Profile\Application\Dtos;

use DateTimeImmutable;

class SubscriptionDto
{
    private int $id;
    private int $userId;
    private int $targetId;
    private string $targetType;

    private DateTimeImmutable $createdAt;
    private DateTimeImmutable $updatedAt;

    /**
     * @param int $id
     * @param int $targetId
     * @param int $userId
     * @param string $targetType
     * @param DateTimeImmutable $createdAt
     * @param DateTimeImmutable $updatedAt
     */
    public function __construct(int $id, int $targetId, int $userId, string $targetType, DateTimeImmutable $createdAt, DateTimeImmutable $updatedAt)
    {
        $this->id = $id;
        $this->targetId = $targetId;
        $this->userId = $userId;
        $this->targetType = $targetType;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
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
     * @return int
     */
    public function getTargetId(): int
    {
        return $this->targetId;
    }

    /**
     * @return string
     */
    public function getTargetType(): string
    {
        return $this->targetType;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getUpdatedAt(): DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'userId' => $this->userId,
            'targetId' => $this->targetId,
            'targetType' => $this->targetType,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }




}