<?php

declare(strict_types=1);

namespace AgentSoftware\Settings\Events;

use AgentSoftware\Settings\Support\Context;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

final class SettingWasStored
{
    use Dispatchable;
    use SerializesModels;

    public function __construct(
        public string $key,
        public string $storageKey,
        public string $cacheKey,
        public mixed $value,
        public mixed $teamId,
        public bool|Context|null $context,
    ) {}
}
