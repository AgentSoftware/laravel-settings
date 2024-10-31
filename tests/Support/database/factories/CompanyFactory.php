<?php

declare(strict_types=1);

namespace AgentSoftware\Settings\Tests\Support\database\factories;

use AgentSoftware\Settings\Tests\Support\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\AgentSoftware\Settings\Tests\Support\Models\Company>
 */
final class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition(): array
    {
        return [
            'name' => fake()->company(),
        ];
    }
}
