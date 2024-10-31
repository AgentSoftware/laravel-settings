<?php

declare(strict_types=1);

namespace AgentSoftware\Settings\Tests\Support\Models;

use AgentSoftware\Settings\Models\HasSettings;
use AgentSoftware\Settings\Tests\Support\database\factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    use HasSettings;

    public function getMorphClass(): string
    {
        return 'user';
    }

    protected static function newFactory(): UserFactory
    {
        return new UserFactory;
    }
}
