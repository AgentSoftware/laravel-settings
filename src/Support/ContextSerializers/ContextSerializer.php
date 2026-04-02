<?php

declare(strict_types=1);

namespace AgentSoftware\Settings\Support\ContextSerializers;

use AgentSoftware\Settings\Contracts\ContextSerializer as ContextSerializerContract;
use AgentSoftware\Settings\Support\Context;

class ContextSerializer implements ContextSerializerContract
{
    public function serialize(?Context $context = null): string
    {
        $serialized = serialize($context);

        // Maintain backward compatibility with the old Rawilk namespace
        // so that key generation produces identical keys for existing data.
        return str_replace(
            sprintf('O:%d:"%s"', strlen('AgentSoftware\\Settings\\Support\\Context'), 'AgentSoftware\\Settings\\Support\\Context'),
            sprintf('O:%d:"%s"', strlen('Rawilk\\Settings\\Support\\Context'), 'Rawilk\\Settings\\Support\\Context'),
            $serialized,
        );
    }
}
