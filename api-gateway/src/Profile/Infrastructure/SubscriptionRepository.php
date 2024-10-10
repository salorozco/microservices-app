<?php

namespace App\Profile\Infrastructure;

use App\Profile\Application\Dtos\SubscriptionDto;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use DateTimeImmutable;

class SubscriptionRepository
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @throws \DateMalformedStringException
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function findSubscriptionsByUserId(int $userId): array
    {
        $apiResponse = $this->client->request('GET', "http://subscriptions-and-notifications-service:8080/subscriptions/byuser/{$userId}");
        $data = json_decode($apiResponse->getContent(), true);

        $subscriptions = [];

        foreach ($data as $subscription) {
            $subscriptions[] = new SubscriptionDto(
                (int)$subscription['id'],
                (int)$subscription['userId'],
                (int)$subscription['targetId'],
                $subscription['targetType'],
                new DateTimeImmutable($subscription['createdAt']),
                new DateTimeImmutable($subscription['updatedAt']),
            );
        }

        return $subscriptions;

    }
}