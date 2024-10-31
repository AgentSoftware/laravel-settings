<?php

declare(strict_types=1);

namespace AgentSoftware\Settings\Tests\Support\database\factories;

use AgentSoftware\Settings\Tests\Support\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\AgentSoftware\Settings\Tests\Support\Models\User>
 */
final class UserFactory extends Factory
{
    protected $model = User::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}
