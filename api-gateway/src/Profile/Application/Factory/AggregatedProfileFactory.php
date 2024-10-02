<?php

namespace App\Profile\Application\Factory;

use App\Profile\Application\Dtos\AggregatedProfileDTO;
use App\Profile\Application\Dtos\PostDTO;
use App\Profile\Infrastructure\CommentRepository;
use App\Profile\Infrastructure\ConversationRepository;
use App\Profile\Infrastructure\PostRepository;
use App\Profile\Infrastructure\UserRepository;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class AggregatedProfileFactory
{
    private UserRepository $userRepository;
    private PostRepository $postRepository;
    private CommentRepository $commentRepository;
    private ConversationRepository $conversationRepository;


    public function __construct(
        UserRepository $userRepository,
        PostRepository $postRepository,
        CommentRepository $commentRepository,
        ConversationRepository $conversationRepository,
    ) {
        $this->userRepository = $userRepository;
        $this->postRepository = $postRepository;
        $this->commentRepository = $commentRepository;
        $this->conversationRepository = $conversationRepository;
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function create($userId): AggregatedProfileDTO
    {
        // Step 1: Fetch the user data
        $user = $this->userRepository->findById($userId);

        // Step 2: Fetch the posts for this user
        $posts = $this->postRepository->findPostByUserId($userId);

        // Step 3: Extract post IDs
        $postIds = array_map(function (PostDTO $post) {
            return $post->getId();
        }, $posts);

        // Step 4: Query comments for the fetched post IDs
        $commentsByPostId = $this->commentRepository->findCommentsByPostId($postIds);

       // Step 5: Attach comments to corresponding posts
        foreach ($posts as $post) {
            $postId = $post->getId();
            if (isset($commentsByPostId[$postId])) {
                $post->addComments($commentsByPostId[$postId]);
            } else {
                $post->addComments([]);
            }
        }

        // Step 6: Attach conversations to profile
        $conversations = $this->conversationRepository->findConversationByUserId($userId);


        // Step 7: Create the AggregatedProfileDTO
        $aggregatedUser = new AggregatedProfileDTO($user);

        foreach ($posts as $post) {
            $aggregatedUser->addPost($post);
        }

        // Add conversations to the aggregate
        foreach ($conversations as $conversation) {
            $aggregatedUser->addConversation($conversation);
        }

        return $aggregatedUser;
    }
}