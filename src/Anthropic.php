<?php

namespace Lanos\Anthropic;

use GuzzleHttp\Client as GuzzleClient;
use Lanos\Anthropic\Resources\Messages;
use Lanos\Anthropic\Resources\Models;
use Lanos\Anthropic\Resources\MessageBatches;

class Anthropic
{
    private GuzzleClient $client;
    private string $apiKey;
    
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = new GuzzleClient([
            'base_uri' => 'https://api.anthropic.com/v1/',
            'headers' => [
                'x-api-key' => $this->apiKey,
                'anthropic-version' => '2023-06-01',
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function messages(): Messages
    {
        return new Messages($this->client);
    }

    public function models(): Models
    {
        return new Models($this->client);
    }

    public function messageBatches(): MessageBatches
    {
        return new MessageBatches($this->client);
    }
}
