<?php

declare(strict_types=1);

namespace AgentSoftware\Settings\Contracts;

interface ValueSerializer
{
    public function serialize($value): string;

    public function unserialize(string $serialized): mixed;
}
