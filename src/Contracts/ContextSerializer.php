<?php

declare(strict_types=1);

namespace AgentSoftware\Settings\Contracts;

use AgentSoftware\Settings\Support\Context;

interface ContextSerializer
{
    public function serialize(?Context $context = null): string;
}
