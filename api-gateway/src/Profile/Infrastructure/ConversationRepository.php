<?php

namespace App\Profile\Infrastructure;

use App\Profile\Application\Dtos\ConversationDTO;
use App\Profile\Application\Dtos\MessageDTO;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use DateTimeImmutable;

class ConversationRepository
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
     * @throws ClientExceptionInterface|\DateMalformedStringException
     */
    public function findConversationByUserId(int $userId): array
    {
        $apiResponse = $this->client->request('GET', "http://conversations-service:5000/users/{$userId}/conversations");
        $data = json_decode($apiResponse->getContent(), true);

        $conversations = [];

        foreach ($data as $conversationData) {

            // Map Messages
            $messages = [];
            if (isset($conversationData['messages']) && is_array($conversationData['messages'])) {
                foreach ($conversationData['messages'] as $messageData) {
                    $messages[] = new MessageDTO(
                        (int)$messageData['id'],
                        $messageData['content'],
                        (int)$messageData['sender_id'],
                        (int)$messageData['conversation_id'],
                        new DateTimeImmutable($messageData['sent_at'])
                    );
                }
            }

            $conversations[] = new ConversationDTO(
                (int)$conversationData['id'],
                $conversationData['title'],
                $messages,
                $conversationData['participants'],
                new DateTimeImmutable($conversationData['updated_at']),
                new DateTimeImmutable($conversationData['created_at']),

            );
        }

        return $conversations;
    }
}