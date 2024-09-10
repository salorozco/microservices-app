<?php

namespace App\Profile\Infrastructure;

use App\Profile\Application\Dtos\PostDTO;
use DateTimeImmutable;
use Symfony\Component\HttpClient\Exception\ClientException;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class PostRepository
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function findPostByUserId($userId): array
    {
        try {
            $apiResponse = $this->client->request('GET', "http://posts-service-nginx/users/{$userId}/posts");
            $data = json_decode($apiResponse->getContent(), true);

            $posts = [];

            foreach ($data as $postData) {
                $posts[] = new PostDTO(
                    $postData['id'],
                    $postData['userId'],
                    $postData['content'],
                    new DateTimeImmutable($postData['createdAt']),
                    new DateTimeImmutable($postData['updatedAt']),
                    []
                );
            }

            return $posts;

        } catch (ClientException $e) {
            if ($e->getCode() === 404) {
                throw new \Exception("Posts not found for user", 404);
            }
            throw $e;
        }
    }
}