<?php

declare(strict_types=1);

namespace AgentSoftware\Settings\Tests\Support\Drivers;

use AgentSoftware\Settings\Contracts\Driver;
use Illuminate\Contracts\Support\Arrayable;

final class CustomDriver implements Driver
{
    public function forget($key, $teamId = null): void
    {
        //
    }

    public function get(string $key, $default = null, $teamId = null)
    {
        return $default;
    }

    public function has($key, $teamId = null): bool
    {
        return true;
    }

    public function set(string $key, $value = null, $teamId = null): void
    {
        //
    }

    public function all($teamId = null, $keys = null): array|Arrayable
    {
        return [];
    }

    public function flush($teamId = null, $keys = null): void {}
}
