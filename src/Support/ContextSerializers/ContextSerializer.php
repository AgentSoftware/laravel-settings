<?php

declare(strict_types=1);

namespace AgentSoftware\Settings\Support\ContextSerializers;

use AgentSoftware\Settings\Contracts\ContextSerializer as ContextSerializerContract;
use AgentSoftware\Settings\Support\Context;

class ContextSerializer implements ContextSerializerContract
{
    public function serialize(?Context $context = null): string
    {
        return serialize($context);
    }
}
