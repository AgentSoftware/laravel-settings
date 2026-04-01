<?php

declare(strict_types=1);

namespace AgentSoftware\Settings\Drivers;

use AgentSoftware\Settings\Contracts\Driver;
use AgentSoftware\Settings\Contracts\Setting;
use Illuminate\Contracts\Support\Arrayable;

class EloquentDriver implements Driver
{
    public function __construct(protected Setting $model) {}

    public function forget($key, $teamId = null): void
    {
        $this->model::removeSetting($key, $teamId);
    }

    public function get(string $key, $default = null, $teamId = null)
    {
        return $this->model::getValue($key, $default, $teamId);
    }

    public function all($teamId = null, $keys = null): array|Arrayable
    {
        return $this->model::getAll($teamId, $keys);
    }

    public function has($key, $teamId = null): bool
    {
        return $this->model::has($key, $teamId);
    }

    public function set(string $key, $value = null, $teamId = null): void
    {
        $this->model::set($key, $value, $teamId);
    }

    public function flush($teamId = null, $keys = null): void
    {
        $this->model::flush($teamId, $keys);
    }
}
