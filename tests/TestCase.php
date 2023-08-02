<?php

declare(strict_types=1);

namespace TTBooking\Nanoid\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use TTBooking\Nanoid\NanoidServiceProvider;

abstract class TestCase extends OrchestraTestCase
{
    protected function getPackageProviders($app): array
    {
        return [NanoidServiceProvider::class];
    }

    protected function getEnvironmentSetUp($app): void
    {
        //
    }
}
