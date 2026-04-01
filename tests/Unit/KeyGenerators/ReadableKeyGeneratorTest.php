<?php

declare(strict_types=1);

use AgentSoftware\Settings\Support\Context;
use AgentSoftware\Settings\Support\ContextSerializers\ContextSerializer;
use AgentSoftware\Settings\Support\ContextSerializers\DotNotationContextSerializer;
use AgentSoftware\Settings\Support\KeyGenerators\ReadableKeyGenerator;
use AgentSoftware\Settings\Tests\Support\Models\User;

beforeEach(function () {
    $this->keyGenerator = (new ReadableKeyGenerator)
        ->setContextSerializer(new DotNotationContextSerializer);
});

it('generates a key without context', function (string $key, string $expectedKey) {
    expect($this->keyGenerator->generate($key))->toBe($expectedKey);
})->with([
    ['my-key', 'my-key'],
    ['my key', 'my-key'],
    ['MY key', 'my-key'],
    ['my.key', 'my.key'],
]);

it('generates a key with context', function () {
    $context = new Context([
        'id' => 123,
        'model' => User::class,
    ]);

    expect($this->keyGenerator->generate('app.timezone', $context))->toBe('app.timezone:c:::id:123::model:user');
});

it('works with other context serializers', function () {
    $this->keyGenerator->setContextSerializer(new ContextSerializer);

    $context = new Context([
        'id' => 123,
    ]);

    expect($this->keyGenerator->generate('my-key', $context))->toBe('my-key:c:::' . serialize($context));
});
