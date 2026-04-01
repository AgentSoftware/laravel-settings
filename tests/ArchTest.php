<?php

declare(strict_types=1);

use AgentSoftware\Settings\Contracts\ContextSerializer;
use AgentSoftware\Settings\Contracts\Driver;
use AgentSoftware\Settings\Contracts\KeyGenerator;
use AgentSoftware\Settings\Contracts\ValueSerializer;
use AgentSoftware\Settings\Drivers\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Facade;

it('will not use debugging functions')
    ->expect(['dd', 'dump', 'ray', 'var_dump', 'ddd'])
    ->each->not->toBeUsed();

test('strict types are used')
    ->expect('AgentSoftware\Settings')
    ->toUseStrictTypes();

test('only interfaces are placed in the contracts directory')
    ->expect('AgentSoftware\Settings\Contracts')
    ->toBeInterfaces();

test('each driver implements the Driver contract')
    ->expect('AgentSoftware\Settings\Drivers')
    ->classes()
    ->toImplement(Driver::class)->ignoring(Factory::class)
    ->toHaveSuffix('Driver')->ignoring(Factory::class);

test('only facades are used in the Facades directory')
    ->expect('AgentSoftware\Settings\Facades')
    ->toExtend(Facade::class)
    ->classes()
    ->not->toHaveSuffix('Facade');

test('models are configured correctly and are extendable')
    ->expect('AgentSoftware\Settings\Models')
    ->classes()
    ->toExtend(Model::class)
    ->not->toBeFinal();

test('context serializers are configured correctly')
    ->expect('AgentSoftware\Settings\Support\ContextSerializers')
    ->toBeClasses()
    ->classes()
    ->toImplement(ContextSerializer::class)
    ->toExtendNothing()
    ->toHaveSuffix('Serializer');

test('key generators are configured correctly')
    ->expect('AgentSoftware\Settings\Support\KeyGenerators')
    ->toBeClasses()
    ->classes()
    ->toImplement(KeyGenerator::class)
    ->toExtendNothing()
    ->toHaveSuffix('Generator');

test('value serializers are configured correctly')
    ->expect('AgentSoftware\Settings\Support\ValueSerializers')
    ->toBeClasses()
    ->classes()
    ->toImplement(ValueSerializer::class)
    ->toExtendNothing()
    ->toHaveSuffix('Serializer');

test('events are configured correctly')
    ->expect('AgentSoftware\Settings\Events')
    ->toBeClasses()
    ->classes()
    ->toExtendNothing()
    ->toBeFinal()
    ->toUse([
        Dispatchable::class,
        SerializesModels::class,
    ]);
