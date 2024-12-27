<?php

namespace Lanos\Anthropic\Resources;

use GuzzleHttp\Client;

class MessageBatches
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function create(array $data): array
    {
        $response = $this->client->post('message_batches', [
            'json' => $data
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function get(string $batchId): array
    {
        $response = $this->client->get("message_batches/{$batchId}");

        return json_decode($response->getBody()->getContents(), true);
    }

    public function list(): array
    {
        $response = $this->client->get('message_batches');

        return json_decode($response->getBody()->getContents(), true);
    }

    public function getResults(string $batchId): array
    {
        $response = $this->client->get("message_batches/{$batchId}/results");

        return json_decode($response->getBody()->getContents(), true);
    }

    public function cancel(string $batchId): array
    {
        $response = $this->client->post("message_batches/{$batchId}/cancel");

        return json_decode($response->getBody()->getContents(), true);
    }
}
