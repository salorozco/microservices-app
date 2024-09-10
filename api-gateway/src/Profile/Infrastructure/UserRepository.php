<?php

namespace App\Profile\Infrastructure;

use DateTimeImmutable;
use Exception;
use App\Profile\Application\Dtos\UserDTO;
use Symfony\Component\HttpClient\Exception\ClientException;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class UserRepository
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
     * @throws Exception
     */
    public function findById($userId): UserDTO
    {
        try {
            $apiResponse = $this->client->request('GET', "http://users-service-nginx/users/{$userId}");
            $data = json_decode($apiResponse->getContent(), true);

            return new UserDTO(
                $data['id'],
                $data['name'],
                $data['email'],
                new DateTimeImmutable($data['createdAt']),
                new DateTimeImmutable($data['updatedAt'])
            );

        } catch (ClientException $e) {
            if ($e->getCode() === 404) {
                throw new \Exception('User not found');
            }
            throw $e;
        }

    }
}