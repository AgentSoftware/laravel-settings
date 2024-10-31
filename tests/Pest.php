<?php

declare(strict_types=1);

use AgentSoftware\Settings\Facades\Settings;
use AgentSoftware\Settings\Tests\TestCase;
use Illuminate\Support\Facades\DB;

uses(TestCase::class)->in(__DIR__);

// Helpers...

/**
 * The Database driver doesn't seem to be using the same Sqlite connection
 * the tests are using, so we'll force it to here. This should fix issues
 * with the settings table not existing when the driver queries it.
 */
function setDatabaseDriverConnection(): void
{
    $driver = Settings::getDriver();
    $reflection = new ReflectionClass($driver);

    $property = $reflection->getProperty('connection');
    $property->setAccessible(true);
    $property->setValue($driver, DB::connection());
}

function migrateTestTables(): void
{
    $migration = include __DIR__ . '/Support/database/migrations/create_test_tables.php';
    $migration->up();
}

function migrateMorphs(): void
{
    $migration = include __DIR__ . '/../database/migrations/add_settings_morphs_fields.php.stub';
    $migration->up();
}
