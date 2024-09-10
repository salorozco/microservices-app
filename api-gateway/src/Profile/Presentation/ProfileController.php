<?php

namespace App\Profile\Presentation;

use App\Profile\Application\Factory\AggregatedProfileFactory;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class ProfileController
{
    private AggregatedProfileFactory $aggregatedProfileFactory;

    public function __construct(
        AggregatedProfileFactory $aggregatedProfileFactory
    ){
        $this->aggregatedProfileFactory = $aggregatedProfileFactory;
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function show(Request $request, array $vars): JsonResponse
    {
        $userId = $vars['userId'];

        $aggregatedUser = $this->aggregatedProfileFactory->create($userId);

        $postsArray = array_map(function ($post) {
            return $post->toArray();
        }, $aggregatedUser->getPosts());

        return new JsonResponse([
            'user' => $aggregatedUser->getUser()->toArray(),
            'posts' => $postsArray,
        ]);
    }
}