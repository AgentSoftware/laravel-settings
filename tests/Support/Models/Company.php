<?php

declare(strict_types=1);

namespace AgentSoftware\Settings\Tests\Support\Models;

use AgentSoftware\Settings\Models\HasSettings;
use AgentSoftware\Settings\Tests\Support\database\factories\CompanyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Company extends Model
{
    use HasFactory;
    use HasSettings;

    protected static bool $flushSettingsOnDelete = false;

    protected static function newFactory(): CompanyFactory
    {
        return new CompanyFactory;
    }
}
