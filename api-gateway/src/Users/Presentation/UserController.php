<?php

declare(strict_types=1);

namespace App\Users\Presentation;

use Symfony\Component\HttpClient\Exception\ClientException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class UserController
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function show(Request $request, array $vars): Response
    {
        $userId = $vars['id'];

        try {
            $apiResponse = $this->client->request('GET', "http://users-service-nginx/users/{$userId}");
            return new Response($apiResponse->getContent(), $apiResponse->getStatusCode(), ['Content-Type' => 'application/json']);
        } catch (ClientException $e) {
            if ($e->getCode() === 404) {
                return new Response('User not found', 404);
            }
            throw $e;
        }
    }

    public function showAll(Request $request): Response
    {
        try {
            $apiResponse = $this->client->request('GET', "http://users-service-nginx/users");
            return new Response($apiResponse->getContent(), $apiResponse->getStatusCode(), ['Content-Type' => 'application/json']);
        } catch (ClientException $e) {
            if ($e->getCode() === 404) {
                return new Response('Userw not found', 404);
            }
            throw $e;
        }
    }
}