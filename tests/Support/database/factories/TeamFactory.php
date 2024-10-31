<?php

declare(strict_types=1);

namespace AgentSoftware\Settings\Tests\Support\database\factories;

use AgentSoftware\Settings\Tests\Support\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\AgentSoftware\Settings\Tests\Support\Models\Team>
 */
final class TeamFactory extends Factory
{
    protected $model = Team::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
        ];
    }
}
