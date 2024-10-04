<?php

namespace App\Profile\Application\Dtos;

class AggregatedProfileDTO
{
    private UserDTO $user;
    private array $posts = [];
    private array $conversations = [];

    public function __construct(UserDTO $user)
    {
        $this->user = $user;
    }

    public function addPost(PostDTO $post): void
    {
        $this->posts[] = $post;
    }

    public function addConversation(ConversationDTO $conversation): void
    {
        $this->conversations[] = $conversation;
    }

    public function getUser(): UserDTO
    {
        return $this->user;
    }

    public function getPosts(): array
    {
        return $this->posts;
    }

    public function getConversations(): array
    {
        return $this->conversations;
    }

    /**
     * Converts the aggregated profile to an associative array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'user' => $this->user->toArray(),
            'posts' => array_map(fn(PostDTO $post) => $post->toArray(), $this->posts),
            'conversations' => array_map(fn(ConversationDTO $conversation) => $conversation->toArray(), $this->conversations),
        ];
    }
}