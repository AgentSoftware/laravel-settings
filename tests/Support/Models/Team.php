<?php

declare(strict_types=1);

namespace AgentSoftware\Settings\Tests\Support\Models;

use AgentSoftware\Settings\Tests\Support\database\factories\TeamFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Team extends Model
{
    use HasFactory;
    use HasUuids;

    protected static function newFactory(): TeamFactory
    {
        return new TeamFactory;
    }
}
