# Anthropic PHP Client

A PHP client for the Anthropic API.

## Installation

```bash
composer require lanos/anthropic
```

## Usage

```php
use Lanos\Anthropic\Anthropic;

$anthropic = new Anthropic('your-api-key');

// Create a message
$response = $anthropic->messages()->create([
    'model' => 'claude-3-opus-20240229',
    'messages' => [
        ['role' => 'user', 'content' => 'Hello, Claude!']
    ],
    'max_tokens' => 1024
]);

// List available models
$models = $anthropic->models()->list();

// Create a message batch
$batch = $anthropic->messageBatches()->create([
    'model' => 'claude-3-opus-20240229',
    'messages' => [
        ['role' => 'user', 'content' => 'Hello!'],
        ['role' => 'user', 'content' => 'How are you?']
    ]
]);
