<?php

declare(strict_types=1);

use AgentSoftware\Settings\Support\Context;
use AgentSoftware\Settings\Support\ContextSerializers\ContextSerializer;

it('accepts a context argument', function () {
    $context = (new Context)->set('a', 'a');

    $serializer = new ContextSerializer;

    $result = $serializer->serialize($context);

    expect($result)->toContain('Rawilk\Settings\Support\Context')
        ->and($result)->not->toContain('AgentSoftware\Settings\Support\Context');
});

it('serializes null values', function () {
    $serializer = new ContextSerializer;

    expect($serializer->serialize(null))->toBe(serialize(null));
});

it('produces output compatible with the old Rawilk namespace for backward compatibility', function () {
    $context = (new Context)->set('model', 'App\Models\Website')->set('id', '123');

    $serializer = new ContextSerializer;
    $serialized = $serializer->serialize($context);

    expect($serialized)->toContain('O:31:"Rawilk\Settings\Support\Context"');
});

it('produces output that can be unserialized back to a valid Context', function () {
    $context = (new Context)->set('model', 'App\Models\Website')->set('id', '123');

    $serializer = new ContextSerializer;
    $serialized = $serializer->serialize($context);

    $unserialized = unserialize($serialized);

    expect($unserialized)->toBeInstanceOf(Context::class)
        ->and($unserialized->toArray())->toBe($context->toArray());
});
