<?php

declare(strict_types=1);

namespace App\Users\Application;

use App\Users\Domain\UserRepositoryInterface;

class UserService
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUser(int $id)
    {
        return $this->userRepository->findUserById($id);
    }
}
