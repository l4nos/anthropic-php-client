<?php

namespace Lanos\Anthropic\Resources;

use GuzzleHttp\Client;

class Messages
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function create(array $data): array
    {
        $response = $this->client->post('messages', [
            'json' => $data
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function countTokens(array $data): array
    {
        $response = $this->client->post('messages/count_tokens', [
            'json' => $data
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function stream(array $data): \Generator
    {
        $response = $this->client->post('messages', [
            'json' => array_merge($data, ['stream' => true]),
            'stream' => true
        ]);

        foreach ($response->getBody() as $chunk) {
            yield json_decode($chunk, true);
        }
    }
}
