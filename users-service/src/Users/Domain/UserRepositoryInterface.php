<?php

declare(strict_types=1);

namespace App\Users\Domain;

interface UserRepositoryInterface
{
    public function findUserById(int $id): ?User;
}
