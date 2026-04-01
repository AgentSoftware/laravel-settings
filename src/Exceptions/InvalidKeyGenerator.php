<?php

declare(strict_types=1);

namespace AgentSoftware\Settings\Exceptions;

use AgentSoftware\Settings\Support\KeyGenerators\ReadableKeyGenerator;
use Exception;

final class InvalidKeyGenerator extends Exception
{
    public static function forPartialLookup(string $class): self
    {
        return new self(
            "The `{$class}` key generator cannot be used for partial context setting lookups. We recommend using the " . ReadableKeyGenerator::class . ' key generator instead. You can change the `key_generator` configuration key to this value in your `config/settings.php` file.',
        );
    }
}
