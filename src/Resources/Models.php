<?php

namespace Lanos\Anthropic\Resources;

use GuzzleHttp\Client;

class Models
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function list(): array
    {
        $response = $this->client->get('models');

        return json_decode($response->getBody()->getContents(), true);
    }

    public function get(string $modelId): array
    {
        $response = $this->client->get("models/{$modelId}");

        return json_decode($response->getBody()->getContents(), true);
    }
}
