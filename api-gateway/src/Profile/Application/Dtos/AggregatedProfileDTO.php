<?php

namespace App\Profile\Application\Dtos;

class AggregatedProfileDTO
{
    private UserDTO $user;
    private array $posts = [];

    public function __construct(UserDTO $user)
    {
        $this->user = $user;
    }

    public function addPost(PostDTO $post): void
    {
        $this->posts[] = $post;
    }

    public function getUser(): UserDTO
    {
        return $this->user;
    }

    public function getPosts(): array
    {
        return $this->posts;
    }
}