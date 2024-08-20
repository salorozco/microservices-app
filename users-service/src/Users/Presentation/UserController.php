<?php

declare(strict_types=1);

namespace App\Users\Presentation;

use App\Users\Application\UserService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function show(Request $request, array $vars): Response
    {
        $userId = (int)$vars['id'];
        $user = $this->userService->getUser($userId);

        if ($user === null) {
            return new Response('User not found', 404);
        }

        $responseContent = json_encode([
            'id' => $user->getId(),
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'createdAt' => $user->getCreatedAt()->format(DATE_ATOM),
            'updatedAt' => $user->getUpdatedAt()->format(DATE_ATOM),
        ]);

        return new Response($responseContent, 200, ['Content-Type' => 'application/json']);
    }
}
