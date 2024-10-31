<?php

declare(strict_types=1);

namespace AgentSoftware\Settings\Tests;

use AgentSoftware\Settings\SettingsServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function getEnvironmentSetUp($app): void
    {
        $migrations = [
            'create_settings_table.php.stub',
        ];

        foreach ($migrations as $migrationName) {
            $migration = include __DIR__ . '/../database/migrations/' . $migrationName;
            $migration->up();
        }
    }

    protected function getPackageProviders($app): array
    {
        return [
            SettingsServiceProvider::class,
        ];
    }
}
