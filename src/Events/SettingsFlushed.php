<?php

declare(strict_types=1);

namespace AgentSoftware\Settings\Events;

use AgentSoftware\Settings\Support\Context;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

final class SettingsFlushed
{
    use Dispatchable;
    use SerializesModels;

    public function __construct(
        public bool|Collection|string $keys,
        public mixed $modelId,
        public mixed $modelType,
        public bool|Context|null $context,
    ) {}
}
