<?php

declare(strict_types=1);

namespace App\Posts\Presentation;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class PostController
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function show(Request $request, array $vars): Response
    {
        $postId = $vars['id'];
        $apiResponse = $this->client->request('GET', "http://posts-service-nginx/posts/{$postId}");

        return new Response($apiResponse->getContent(), $apiResponse->getStatusCode(), ['Content-Type' => 'application/json']);
    }
}
