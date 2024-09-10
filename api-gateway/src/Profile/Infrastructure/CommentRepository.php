<?php

namespace App\Profile\Infrastructure;

use App\Profile\Application\Dtos\CommentDTO;
use DateTimeImmutable;
use Symfony\Component\HttpClient\Exception\ClientException;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class CommentRepository
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }
    public function findCommentsByPostId($postIds): array
    {
        try {
            $queryParams = http_build_query(['postIds' => $postIds], '', '&');

            $apiResponse = $this->client->request('GET', "http://comments-service-nginx/comments/by-posts?" . $queryParams );
            $data = json_decode($apiResponse->getContent(), true);

            $comments = [];

            foreach ($data as $commentData) {
                $comments[$commentData['post_id']][] = new CommentDTO(
                    $commentData['id'],
                    $commentData['post_id'],
                    $commentData['content'],
                    new DateTimeImmutable($commentData['createdAt']),
                    new DateTimeImmutable($commentData['updatedAt'])
                );
            }

            return $comments;

        } catch (ClientException $e) {
            if ($e->getCode() === 404) {
                throw new \Exception("Posts not found for user", 404);
            }
            throw $e;
        }
    }
}