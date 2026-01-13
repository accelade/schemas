<?php

declare(strict_types=1);

namespace Accelade\Schemas\Tests;

use Accelade\AcceladeServiceProvider;
use Accelade\Schemas\SchemasServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            AcceladeServiceProvider::class,
            SchemasServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('schemas.enabled', true);
        $app['config']->set('schemas.demo.enabled', true);
    }
}
