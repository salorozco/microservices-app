<?php

declare(strict_types=1);

namespace App\Comments\Presentation;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class CommentController
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function show(Request $request, array $vars): Response
    {
        $commentId = $vars['id'];
        $apiResponse = $this->client->request('GET', "http://comments-service-nginx/comments/{$commentId}");

        return new Response($apiResponse->getContent(), $apiResponse->getStatusCode(), ['Content-Type' => 'application/json']);
    }
}
