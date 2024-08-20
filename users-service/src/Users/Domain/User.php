<?php

declare(strict_types=1);

namespace App\Users\Domain;

use DateTimeImmutable;
class User
{
    private int $id;
    private string $name;
    private string $email;
    private DateTimeImmutable $createdAt;
    private DateTimeImmutable $updatedAt;

    public function __construct(
        int $id,
        string $name,
        string $email,
        DateTimeImmutable $createdAt,
        DateTimeImmutable $updatedAt
    ){
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
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
