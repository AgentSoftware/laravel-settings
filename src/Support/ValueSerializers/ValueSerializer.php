<?php

declare(strict_types=1);

namespace AgentSoftware\Settings\Support\ValueSerializers;

use AgentSoftware\Settings\Contracts\ValueSerializer as ValueSerializerContract;
use Illuminate\Support\Arr;

class ValueSerializer implements ValueSerializerContract
{
    public function serialize($value): string
    {
        return serialize($value);
    }

    public function unserialize(string $serialized): mixed
    {
        $safelistedClasses = Arr::wrap(config('settings.unserialize_safelist', []));

        return unserialize($serialized, ['allowed_classes' => $safelistedClasses]);
    }
}
