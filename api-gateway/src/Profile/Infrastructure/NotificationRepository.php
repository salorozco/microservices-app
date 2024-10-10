<?php

namespace App\Profile\Infrastructure;

use App\Profile\Application\Dtos\NotificationDTO;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use DateTimeImmutable;

class NotificationRepository
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
    public function findNotificationsByUserId(int $userId): array
    {
        $apiResponse = $this->client->request('GET', "http://subscriptions-and-notifications-service:8080/notifications/byuser/{$userId}");
        $data = json_decode($apiResponse->getContent(), true);

        $notifications = [];
        foreach ($data as $notification) {
            $notifications[] = new NotificationDTO(
                (int)$notification['id'],
                (int)$notification['recipientId'],
                (int)$notification['actorId'],
                (int)$notification['entityId'],
                $notification['entityType'],
                $notification['message'],
                $notification['type'],
                $notification['status'],
                new DateTimeImmutable($notification['createdAt']),
            );
        }

        return $notifications;
    }
}